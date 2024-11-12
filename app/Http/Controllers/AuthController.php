<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function index()
    {
        return view('pages.login');
    }

    function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email is required',
                'password.required' => 'Password is required',
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
                return redirect('login')->withErrors('Invalid')->withInput();
            }
        } else {
            return redirect('login')->withErrors('Username or Password Incorrect')->withInput();
        }
    }

    function registerIndex()
    {
        return view('pages.register');
    }

    function register($request)
    {
        $request->validate(
            [
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'password' => 'required|string',
                'confirm_password' => 'required|string',
            ],
            [
                'firstname.required' => 'First Name is required',
                'lastname.required' => 'Last Name is required',
                'email.required' => 'Email is required',
                'phone.required' => 'Phone is required',
                'password.required' => 'Password is required',
                'confirm_password.required' => 'Confirm Password is required',
            ]
        );


        $data = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password)
        ];

        User::create($data);

        if(Auth::user()->role == 'admin') {
            return redirect()->route('member')->with('success', "Success Register");
        }
        return redirect()->route('login')->with('success', "Success Register");
    }

    function changePassword(Request $request) {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required',
        ]);


        if ($request->password != $request->confirm_password) {
            return redirect()->route('profil')->with('error', "Password not same");
        }

        $data = [
            'password' => bcrypt($request->password)
        ];

        User::where('id', Auth::user()->id)->update($data);

        Auth::logout();
        return redirect('/');
    }

    function logOut()
    {
        Auth::logout();
        return redirect('/');
    }
}
