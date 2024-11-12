<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    function index() {

        if(Auth::user()->role == 'member') {
            $transactions = Transaction::with('user')->where('user_id', Auth::user()->id)->get();
            return view('pages.booking', ['listTransaksi' => $transactions]);
        }

        $transactions = Transaction::with('user')->where('status', 'accepted')->where('date', Carbon::now()->format('Y-m-d'))->get();
        return view('pages.booking', ['listTransaksi' => $transactions]);
    }

    function success() {
        Transaction::where('user_id', Auth::user()->id)->update(['status' => 'accepted']);
        return view('pages.booking');
    }
}
