<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function index() {
        return view('pages.login');
    }

    function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required '
            ],
            [
                'email.required' => 'Email Harus Diisi',
                'password.required' => 'Password Harus Diisi',
            ]
        );


        $body = [
            'email' => $request->email,
            'password' => $request->password
        ];


        if (Auth::attempt($body)) {
            if (Auth::user()->role == "admin") {
                return redirect('dashboard');
            } else if (Auth::user()->role == "member") {
                return redirect('pelatih');
            } else {
                return redirect('')->withErrors('Invalid')->withInput();
            }
        } else {
            return redirect('')->withErrors('Username or Password Incorrect')->withInput();
        }
    }

    function logOut()
    {
        Auth::logout();
        return redirect('');
    }
}
