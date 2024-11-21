<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\Member;
use App\Models\Pelatih;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\alert;

class PelatihController extends Controller
{
    function listPelatih(Request $request)
    {
        $listPelatih = Pelatih::paginate(10);
        $date = Carbon::parse($request->has('date') ? $request->input('date') : date('Y-m-d'));
        $cardMember = Member::where('user_id', Auth::user()->id)->first();

        $expireDate = Carbon::now();
        $expireDate->addDay(1);

        foreach ($listPelatih as $item) {
            $countProductInTransaction = Transaction::where('date', $request->has('date') ? $request->input('date') : date('Y-m-d'))->where('product_id', $item->id)->where('status', 'accepted')->get();
            $item->booking = count($countProductInTransaction);

            if ($item->booking >= $item->capacity) {
                $item->statusAvailable = false;
            } else {
                $item->statusAvailable = true;
            }

            if(in_array($date->dayOfWeek, $item->available_days )) {
                $item->statusHari = true;
            } else {
                $item->statusHari = false;
                alert("Tidak Tersedia");
            }

            if($cardMember) {
                if( $expireDate->gt($cardMember->expiredAt)) {
                    $item->memberStatus = true;
                } else {
                    $item->memberStatus = false;
                }
            } else {
                $item->memberStatus = true;
            }

        }

        return view('pages.pelatih', ["listPelatih" => $listPelatih]);
    }


    function searchPelatih(Request $request)
    {
        $keyword = $request->value;

        $listPelatih = Pelatih::where('name', 'like', '%' . $keyword . '%')->paginate(10);
        $date = Carbon::parse($request->has('date') ? $request->input('date') : date('Y-m-d'));
        $cardMember = Member::where('user_id', Auth::user()->id)->first();

        $expireDate = Carbon::now();
        $expireDate->addDay(1);

        foreach ($listPelatih as $item) {
            $countProductInTransaction = Transaction::where('date', $request->has('date') ? $request->input('date') : date('Y-m-d'))->where('product_id', $item->id)->where('status', 'accepted')->get();
            $item->booking = count($countProductInTransaction);

            if ($item->booking >= $item->capacity) {
                $item->statusAvailable = false;
            } else {
                $item->statusAvailable = true;
            }

            if(in_array($date->dayOfWeek, $item->available_days )) {
                $item->statusHari = true;
            } else {
                $item->statusHari = false;
                alert("Tidak Tersedia");
            }

            if($cardMember) {
                if( $expireDate->gt($cardMember->expiredAt)) {
                    $item->memberStatus = true;
                } else {
                    $item->memberStatus = false;
                }
            } else {
                $item->memberStatus = true;
            }

        }

        return view('pages.pelatih', ['listPelatih' => $listPelatih]);
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
                'capacity' => 'required|min:1',
                'days' => 'required|min:1'
            ],
            [
                'name.required' => 'Name is required',
                'price.required' => 'Price is required',
                'picture.required' => 'Picture is required',
                'capacity.required' => 'Capacity is required',
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
            'capacity' => $request->capacity,
            'available_days' => $request->days
        ];

        Pelatih::create($data);

        return redirect()->route('management')->with('add', true);
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
                'capacity' => 'numeric',
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
                    'capacity' => $request->capacity,
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
                    'capacity' => $request->capacity,
                    'available_days' => $request->days
                ]
            );
        }


        return redirect()->route('management')->with('update', "Data Berhasil Diperbarui");
    }

    function deletePelatih($id)
    {
        $date = Carbon::now();
        $date->addDay(1);
        $checkTransaction = Transaction::whereDate('date', '>=', $date->toDateString())->where('status', 'accepted')->where('product_id', $id)->get();

        if(count($checkTransaction) > 0) {
            return redirect()->route('management')->with('error.delete.pelatih', true);
        } else {
            Pelatih::where('id', $id)->delete();
            return redirect()->route('management')->with('success.delete.pelatih');
        }


    }
}
