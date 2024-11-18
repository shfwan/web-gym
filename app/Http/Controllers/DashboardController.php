<?php

namespace App\Http\Controllers;

use App\Models\Pelatih;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countMember = User::all()->where('role', 'member');
        $countPelatih = Pelatih::all();

        $listTransaksi = Transaction::with('user')->where('status', 'accepted')->where('date', Carbon::now()->format('Y-m-d'))->where('type', 'Booking')->get();
        $countIncome = $listTransaksi->sum('price');

        return view('pages.dashboard', [
            "countMember" => $countMember->count(),
            "countPelatih" => $countPelatih->count(),
            "countIncome" => $countIncome,
            "listTransaksi" => $listTransaksi
        ]);
    }
}
