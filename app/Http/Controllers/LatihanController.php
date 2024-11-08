<?php

namespace App\Http\Controllers;

use App\Models\Latihan;
use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function index()
    {
        return view('pages.management');
    }

    public function addLatihan(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|string',
                'description' => 'string',
                'picture' => 'required|max:4096'
            ],
            [
                'title.required' => 'Name is required',
                'picture.required' => 'Picture is required',
            ]
        );

        $image = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('images'), $image);



        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,

        ];


        Latihan::create($data);

        return redirect()->route('management');
    }

    public function updateLatihan(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'string',
                'description' => 'string',
                'picture' => 'max:4096'
            ],
            [
                'title.required' => 'Name is required',
                'picture.required' => 'Picture is required',
            ]
        );

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'picture' => $request->picture,
        ];

        Latihan::where('id', $id)->update($data);

        return redirect()->route('management');
    }

    public function deleteLatihan($id)
    {
        Latihan::where('id', $id)->delete();
        return redirect()->route('management');
    }
}
