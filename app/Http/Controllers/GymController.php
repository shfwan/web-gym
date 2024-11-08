<?php

namespace App\Http\Controllers;

use App\Models\Pelatih;
use App\Models\User;
use Illuminate\Http\Request;

class GymController extends Controller
{
    //
    function index()
    {
        $countMember= User::all()->where('role', 'member');
        $countPelatih = Pelatih::all();

        return view('pages.dashboard', ["countMember" => $countMember->count(), "countPelatih" => $countPelatih->count()]);
    }

    function getDetailGym(Request $request)
    {
        return view('pages.pelatih');
    }


    function addGym(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',

            ],
            [
                'name.required' => 'Name is required',
            ]
        );
        return view('pages.booking');
    }

    function updateGym(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',

            ],
            [
                'name.required' => 'Name is required',
            ]
        );
        return view('pages.booking');
    }

    function deleteGym(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',

            ],
            [
                'name.required' => 'Name is required',
            ]
        );
        return view('pages.booking');
    }
}
