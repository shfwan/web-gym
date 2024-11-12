@extends('layouts.main')

@section('content')
    <div class="{{Auth::user()->role == 'member' ? 'container mx-auto max-w-6xl' : ''}} bg-white min-h-screen p-8">
        <div class="flex flex-col items-center justify-center h-full ">
            <div class="block space-y-4 place-items-center">
                <figure class="max-w-52 cursor-pointer hover:shadow-md rounded-full transition-all" onclick="file.click()">
                    <img class="flex-[1_0_100%]" src="{{$profil->picture}}" alt="profil">
                    <input class="hidden" type="file" name="picture" id="file">
                </figure>

                {{
                    $status = true
                }}

                <h2 class="font-semibold text-xl">{{$user->firstname}}</h2>
                <x-input disabled="{{ $status }}" value="{{$user->firstname}}" label="Nama depan" name="firstname" type="text" placeholder="Nama depan" />
                <x-input disabled="{{ $status }}" value="{{$user->lastname}}" label="Nama belakang" name="lastname" type="text" placeholder="Nama belakang" />
                <x-input disabled="{{ $status }}" value="{{$user->email}}" label="Email" name="email" type="text" placeholder="Email" />
                <x-input disabled="{{ $status }}" value="{{$user->phone}}" label="Nomor HP" name="phone" type="text" placeholder="Nomor HP" />
                <button class="btn btn-warning text-white btn-wide" onclick="alert('Edit Profil')">Edit Profil</button>
                <button class="btn btn-info text-white btn-wide" onclick="ubahPassword.showModal()">Ubah Password</button>
            </div>
            <x-modal title="Ubah Password" id="ubahPassword">
                <form action="{{route('password.post')}}" method="post">
                    @csrf
                    <div class="block w-full space-y-4">
                        <x-input label="Password" name="password" type="password" placeholder="Password" />
                        <x-input label="Konfirmasi Password" name="confirm_password" type="password" placeholder="Konfirmasi Password" />
                        <button type="submit" class="btn btn-warning w-full text-white">Ubah Password</button>
                    </div>
                </form>
            </x-modal>

        </div>
    </div>
@endsection
