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

    function getDetailMember(Request $request)
    {
        $listMember = User::all()->where('role', 'member');
        return view('pages.member', ["listMember" => $listMember]);
    }

    function addMember(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',

            ],
            [
                'name.required' => 'Name is required',
            ]
        );
        return view('pages.member');
    }

    function updateMember(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',

            ],
            [
                'name.required' => 'Name is required',
            ]
        );
        return view('pages.member');
    }

    function deleteMember(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',

            ],
            [
                'name.required' => 'Name is required',
            ]
        );
        return view('pages.member');
    }
}
