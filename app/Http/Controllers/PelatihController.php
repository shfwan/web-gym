<?php

namespace App\Http\Controllers;

use App\Models\Pelatih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelatihController extends Controller
{
    //
    function listPelatih()
    {
        $listPelatih = Pelatih::all();
        // $listPelatih = DB::table('pelatihs')->get();
        return view('pages.pelatih', ["listPelatih" => $listPelatih]);
    }


    function getDetailPelatih(Request $request)
    {
        return view('pages.pelatih');
    }

    function searchPelatih(Request $request) {
        $keyword = $request->cari;

        $pelatih = Pelatih::where('name', 'like', '%' . $keyword . '%')->get();

        return view('pages.pelatih', ['listPelatih' => $pelatih]);
    }

    function searchPelatihManagement(Request $request) {
        $keyword = $request->cari;

        $pelatih = Pelatih::where('name', 'like', '%' . $keyword . '%')->get();

        return view('pages.management', ['listPelatih' => $pelatih]);
    }

    function addPelatih(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'description' => 'string',
                'price' => 'required|numeric',
                'picture' => 'required|max:4096'
            ],
            [
                'name.required' => 'Name is required',
                'price.required' => 'Price is required',
                'picture.required' => 'Picture is required',
            ]
        );


        $image = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('images'), $image);


        $data = [
            'gym_id' => 1,
            'picture' => $image,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ];

        Pelatih::create($data);

        return redirect()->route('management');
    }

    function updatePelatih(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'string',
                'description' => 'string',
                'price' => 'numeric',
                'picture' => 'max:4096'
            ],
            [
                'name.required' => 'Name is required',
                'price.required' => 'Price is required',
                'picture.required' => 'Picture is required',
            ]
        );

        $image = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('images'), $image);


        $data = [
            'picture' => $image,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ];

        Pelatih::create($data);

        return redirect()->route('management')->with('success', "Data Berhasil Diperbarui");
    }

    function deletePelatih($id)
    {
        // dd($id);
        // $pelatih = Pelatih::find($id);
        Pelatih::where('id', $id)->delete();
        return redirect()->route('management');
    }
}
