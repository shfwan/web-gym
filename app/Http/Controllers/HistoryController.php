<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'member') {
            $transactions = Transaction::with('user')->where('user_id', Auth::user()->id)->get();
            return view('pages.booking', ['listTransaksi' => $transactions]);
        }

        $transactions = Transaction::with('user')->where('status', 'accepted')->get();
        return view('pages.riwayat', ['listTransaksi' => $transactions]);
    }
}