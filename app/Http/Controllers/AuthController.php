<?php

namespace App\Http\Controllers;

use App\Models\Profil;
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
                return redirect()->route('dashboard')->with('success', true);
            } else if (Auth::user()->role == "member") {
                return redirect()->route('pelatih')->with('success', true);
            } else {
                return redirect('login')->withErrors('Invalid')->withInput();
            }
        } else {
            return back()->withErrors('Username or Password Incorrect')->withInput();
        }
    }

    function registerIndex()
    {
        return view('pages.register');
    }

    function register(Request $request)
    {
        $validate = $request->validate(
            [
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'password' => 'required|string|min:8',
                'confirm_password' => 'required|string|min:8',
            ],
        );

        $data = [
            'firstname' => $validate['firstname'],
            'lastname' => $validate['lastname'],
            'email' => $validate['email'],
            'phone' => $validate['phone'],
            'password' => bcrypt($validate['password'])
        ];

        $findEmailExist = User::where('email', $validate['email'])->first();
        $findPhoneExist = User::where('phone', $validate['phone'])->first();

        if($findEmailExist) {
            return redirect()->route('register')->with('existEmail', true);
        }

        if($findPhoneExist) {
            return redirect()->route('register')->with('existPhone', true);
        }

        $user = User::create($data);

        if($user) {
            Profil::create([
                'user_id' => $user->id
            ]);
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
        return redirect()->route('home')->with('updatePass', true);
    }

    function logOut()
    {
        Auth::logout();
        return redirect('/');
    }
}
