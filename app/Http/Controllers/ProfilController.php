<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    function index(Request $request) {
        $user = Auth::user();
        $profil = Profil::where('user_id', $user->id)->first();
        return view('pages.profil', ['user' => $user, 'profil' => $profil]);
    }
}
