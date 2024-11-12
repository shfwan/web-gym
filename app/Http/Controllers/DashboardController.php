<?php

namespace App\Http\Controllers;

use App\Models\Pelatih;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countMember = User::all()->where('role', 'member');
        $countPelatih = Pelatih::all();

        $listTransaksi = Transaction::with('user')->where('status', 'accepted')->get();

        return view('pages.dashboard', [
            "countMember" => $countMember->count(),
            "countPelatih" => $countPelatih->count(),
            "listTransaksi" => $listTransaksi
        ]);
    }
}
