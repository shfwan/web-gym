<?php

namespace App\Http\Controllers;

use App\Models\CardMember;
use App\Models\Member;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    function index(Request $request)
    {
        $filter = $request->has('filter') ? $request->filter : 'Semua';

        if (Auth::user()->role == 'member') {
            if($filter == 'Semua') {

                $transactions = Transaction::with('user')->orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->paginate(10);
                return view('pages.booking', ['listTransaksi' => $transactions]);
            }
            $transactions = Transaction::with('user')->orderBy('id', 'DESC')->where('type', $filter)->where('user_id', Auth::user()->id)->paginate(10);
            return view('pages.booking', ['listTransaksi' => $transactions]);
        }

        $transactions = Transaction::with('user')->orderBy('id', 'DESC')->where('type', $filter)->where('status', 'accepted')->where('date', Carbon::now()->format('Y-m-d'))->paginate(10);

        return view('pages.booking', ['listTransaksi' => $transactions]);
    }

    function success($id)
    {
        $updateOrder = Transaction::where('id', $id)->update(['status' => 'accepted']);
        if($updateOrder) {

            $findTransaction = Transaction::where('id', $id)->first();

            if ($findTransaction->type != 'Booking' && $findTransaction->status == 'accepted') {
                $findCardMember = CardMember::where('id', $findTransaction->product_id)->first();
                $date = Carbon::now();

                switch ($findCardMember->type) {
                    case 'Hari':
                        $expiredAt = $date->addDays(1 * $findCardMember->long);
                        break;

                    case 'Minggu':
                        $expiredAt = $date->addDays(7 * $findCardMember->long);
                        break;

                    case 'Bulan':
                        $expiredAt = $date->addDays(30 * $findCardMember->long);
                        break;

                    case 'Tahun':
                        $expiredAt = $date->addDays(365 * $findCardMember->long);
                        break;
                    default:
                }

                if ($findCardMember) {
                    Member::create([
                        'user_id' => auth()->user()->id,
                        'expiredAt' => $expiredAt->toDateString(),

                    ]);
                }
            }
        }
        return view('pages.success');

    }
}
