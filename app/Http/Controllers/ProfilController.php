<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    function index()
    {
        $user = Auth::user();
        $profil = Profil::where('user_id', $user->id)->first();
        return view('pages.profil', ['user' => $user, 'profil' => $profil]);
    }

    function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $data = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'email' => $request->email
        ];


        $user->update($data);
        return redirect()->route('profil')->with('update', true);
    }

    function updatePicture(Request $request, $id)
    {
        $profil = Profil::where('user_id', $id)->first();

        $image = time() . '.' . $request->picture->extension();
        $path = "upload/" . $image;

        if ($profil == null) {
            Profil::create([
                'user_id' => $id,
                'picture' => $image
            ]);

            Storage::disk('public')->put($path, file_get_contents($request->picture));
        } else {

            Storage::disk('public')->put($path, file_get_contents($request->picture));

            $profil->update([
                'picture' => $image
            ]);
        }


        return redirect()->route('profil')->with('updateImage', true);
    }

    function deletePicture($id) {
        $profil = Profil::where('user_id', $id)->first();
        Storage::disk('public')->delete('upload/' . $profil->picture);

        $profil->update([
            'picture' => ''
        ]);

        return redirect()->route('profil')->with('deleteImage', true);
    }
}
