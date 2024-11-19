<?php

namespace App\Http\Controllers;

use App\Models\CardMember;
use App\Models\Pelatih;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->has('filter') ? $request->filter : 'Semua';

        if (Auth::user()->role == 'member') {


            if ($filter == 'Semua') {

                $transactions = Transaction::with('user')->orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->paginate(10);

                foreach ($transactions as $transaction) {
                    // find product
                    if ($transaction->type == 'Booking') {
                        $transaction->pelatih = Pelatih::where('id', $transaction->product_id)->first();
                    } else {
                        $transaction->cardMember = CardMember::where('id', $transaction->product_id)->first();
                    }
                }

                return view('pages.booking', ['listTransaksi' => $transactions]);
            }
            $transactions = Transaction::with('user')->orderBy('id', 'DESC')->where('type', $filter)->where('user_id', Auth::user()->id)->paginate(10);
            foreach ($transactions as $transaction) {
                // find product
                if ($transaction->type == 'Booking') {
                    $transaction->pelatih = Pelatih::where('id', $transaction->product_id)->first();
                } else {
                    $transaction->cardMember = CardMember::where('id', $transaction->product_id)->first();
                }
            }
            return view('pages.booking', ['listTransaksi' => $transactions]);
        }

        if($filter == 'Semua'){
            $transactions = Transaction::with('user')->orderBy('id', 'DESC')->where('status', 'accepted')->paginate(10);
            foreach ($transactions as $transaction) {
                // find product
                if ($transaction->type == 'Booking') {
                    $transaction->pelatih = Pelatih::where('id', $transaction->product_id)->first();
                } else {
                    $transaction->cardMember = CardMember::where('id', $transaction->product_id)->first();
                }
            }
            return view('pages.riwayat', ['listTransaksi' => $transactions]);
        }

        $transactions = Transaction::with('user')->orderBy('id', 'DESC')->where('type', $filter)->where('status', 'accepted')->paginate(10);
        foreach ($transactions as $transaction) {
            // find product
            if ($transaction->type == 'Booking') {
                $transaction->pelatih = Pelatih::where('id', $transaction->product_id)->first();
            } else {
                $transaction->cardMember = CardMember::where('id', $transaction->product_id)->first();
            }
        }
        return view('pages.riwayat', ['listTransaksi' => $transactions]);
    }
}
