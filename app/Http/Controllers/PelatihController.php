<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\Pelatih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    function searchPelatih(Request $request)
    {
        $keyword = $request->value;

        $pelatih = Pelatih::where('name', 'like', '%' . $keyword . '%')->get();

        return view('pages.pelatih', ['listPelatih' => $pelatih]);
    }

    function searchPelatihManagement(Request $request)
    {
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
                'email' => 'string',
                'phone' => 'numeric',
                'address' => 'string',
                'price' => 'required|numeric',
                'picture' => 'required|mimes:png,jpg,jpeg|max:4096',
                'days' => 'required|min:1'
            ],
            [
                'name.required' => 'Name is required',
                'price.required' => 'Price is required',
                'picture.required' => 'Picture is required',
                'days.required' => 'Days is required'
            ]
        );


        $image = time() . '.' . $request->picture->extension();
        move_uploaded_file($image, '/upload');
        // Storage::disk('public')->put($path, file_get_contents($image));
        $findGymId = Gym::where('user_id', auth()->user()->id)->first();

        $data = [
            'gym_id' => $findGymId->id,
            'picture' => $image,
            'name' => $request->name,
            'description' => $request->description,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'price' => $request->price,
            'available_days' => $request->days
        ];

        Pelatih::create($data);

        return redirect()->route('management');
    }

    function updatePelatih(Request $request, $id)
    {
        // $request->validate(
        //     [
        //         'name' => 'string',
        //         'description' => 'string',
        //         'email' => 'string',
        //         'phone' => 'numeric',
        //         'address' => 'string',
        //         'price' => 'numeric',
        //         'picture' => 'mimes:png,jpg,jpeg|max:4096'
        //     ],
        //     [
        //         'name.required' => 'Name is required',
        //         'price.required' => 'Price is required',
        //         'picture.required' => 'Picture is required',
        //     ]
        // );

        $image = $request->picture ? time() . '.' . $request->picture->extension() : null;
        // $path = 'upload/' . $image;
        if($image != null){
            move_uploaded_file($image, '/upload');
        }


        $data = [
            'picture' => $image,
            'name' => $request->name,
            'description' => $request->description,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'price' => $request->price,
        ];

        Pelatih::where('id', $id)->update($data);

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
