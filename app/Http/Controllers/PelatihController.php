<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\Pelatih;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PelatihController extends Controller
{
    function listPelatih(Request $request)
    {
        $listPelatih = Pelatih::paginate(10);

        foreach ($listPelatih as $item) {
            $countProductInTransaction = Transaction::where('date', $request->has('date') ? $request->input('date') : date('Y-m-d'))->where('product_id', $item->id)->where('status', 'accepted')->get();
            $item->booking = count($countProductInTransaction);

            if ($item->booking == 1) {
                $item->statusAvailable = false;
            } else {
                $item->statusAvailable = true;
            }
        }

        return view('pages.pelatih', ["listPelatih" => $listPelatih]);
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
                // 'description' => 'string',
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
        $path = "upload/" . $image;

        Storage::disk('public')->put($path, file_get_contents($request->picture));
        $findGymId = Gym::where('user_id', auth()->user()->id)->first();


        $data = [
            'gym_id' => $findGymId->id,
            'picture' => $image,
            'name' => $request->name,
            'description' => '',
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
        $request->validate(
            [
                'name' => 'string',
                'email' => 'string',
                'phone' => 'numeric',
                'address' => 'string',
                'price' => 'numeric',
                'picture' => 'mimes:png,jpg,jpeg|max:4096',
                'days' => 'min:1'

            ],
            [
                'name.required' => 'Name is required',
                'price.required' => 'Price is required',
                'picture.required' => 'Picture is required',
                'available_days' => 'Days is required'

            ]
        );

        $image = $request->picture ? time() . '.' . $request->picture->extension() : null;
        if ($image != null) {
            $path = "upload/" . $image;
            Storage::disk('public')->put($path, file_get_contents($request->picture));
        }

        if ($request->picture) {
            Pelatih::where('id', $id)->update(
                [
                    'picture' => $image,
                    'name' => $request->name,
                    'description' => $request->description,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'price' => $request->price,
                    'available_days' => $request->days
                ]
            );
        } else {
            Pelatih::where('id', $id)->update(
                [
                    'name' => $request->name,
                    'description' => $request->description,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'price' => $request->price,
                    'available_days' => $request->days
                ]
            );
        }


        return redirect()->route('management')->with('success', "Data Berhasil Diperbarui");
    }

    function deletePelatih($id)
    {
        Pelatih::where('id', $id)->delete();
        return redirect()->route('management');
    }
}
