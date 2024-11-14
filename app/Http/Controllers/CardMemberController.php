<?php

namespace App\Http\Controllers;

use App\Models\CardMember;
use App\Models\Gym;
use Illuminate\Http\Request;

class CardMemberController extends Controller
{
    function index() {
        $findCardMember = CardMember::where('user_id', auth()->user()->gym_id)->get();
        $listCardMember = CardMember::all();
        return view('pages.upgrade_card', [
            'listCardMember' => $listCardMember,
            'userCardMember' => $findCardMember
        ]);
    }

    function addCardMember(Request $request)
    {


        $request->validate(
            [
                'title' => 'required|string',
                'price' => 'required|numeric',
                'description' => 'nullable|string',
                'long' => 'required',
                'type' => 'required',
            ],
            [
                'title' => 'Title is required',
                'price' => 'Price is required',
                'long' => 'Long is required',
                'type' => 'Type is required',
            ]
        );

        $findGymId = Gym::where('user_id', auth()->user()->id)->first();

        $data = [
            'gym_id' => $findGymId->id,
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'long' => $request->long,
            'type' => $request->type,
        ];

        CardMember::create($data);

        return redirect()->route('setting')->with('success', "Card Member Berhasil Ditambahkan");
    }

    function updateCardMember(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'string',
                'price' => 'numeric',
                'long' => 'numeric',
            ],
            [
                'title' => 'Title must be a string',
                'price' => 'Price must be a number',
                'long' => 'Long must be a number',
            ]
        );

        $data = [
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'long' => $request->long,
            'type' => $request->type,
        ];

        CardMember::where('id', $id)->update($data);

        return redirect()->route('setting')->with('success', "Card Member Berhasil Diubah");
    }

    function deleteCardMember($id)
    {
        CardMember::where('id', $id)->delete();
        return redirect()->route('setting')->with('success', "Card Member Berhasil Dihapus");
    }
}
