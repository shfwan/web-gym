<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //
    function index()
    {
        $listMember = User::all()->where('role', 'member');
        return view('pages.member', ["listMember" => $listMember]);
    }

    function searchMember(Request $request)
    {
        $listMember = User::where('role', 'member')->orWhere('firstname', 'like', '%' . $request->value . '%')->orWhere('lastname', 'like', '%' . $request->value . '%')->orWhere('email', 'like', '%' . $request->value . '%')->orWhere('phone', 'like', '%' . $request->value . '%')->get();
        return view('pages.member', ["listMember" => $listMember]);
    }

    function getDetailMember(Request $request)
    {
        $listMember = User::all()->where('role', 'member');
        return view('pages.member', ["listMember" => $listMember]);
    }

    function addMember(Request $request)
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

        return redirect()->route('member')->with('success', "Success Add New Member");
    }

    function updateMember(Request $request, $id)
    {
        $request->validate(
            [
                'firstname' => 'string',
                'lastname' => 'string',
                'email' => 'email',
                'phone' => 'string',
            ],
            [
                'firstname.required' => 'First Name is required',
                'lastname.required' => 'Last Name is required',
                'email.required' => 'Email is required',
                'phone.required' => 'Phone is required',
            ]
        );

        $user = User::where('id', $id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return redirect()->route('member')->with('success', "Success Update Member");
    }

    function deleteMember($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('member')->with('success', "Success Delete Member");
    }
}
