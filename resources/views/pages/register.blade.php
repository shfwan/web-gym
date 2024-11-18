@extends('layouts.main')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="min-w-96 min-h-fit shadow-md bg-white rounded-md p-8">
            <div class="block w-full place-content-center space-y-10">
                <h1 class="font-bold text-xl w-full text-center text-black">Daftar Member</h1>
                @if ($errors->any())
                    <div class="bg-red-400 rounded-md p-4">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li class="text-white">{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('register.post') }}" method="post">
                    @csrf
                    <div class="grid grid-cols-2 gap-4 place-items-center">
                        <x-input label="First Name" name="first_name" value="{{ old('first_name') }}" type="text"
                            placeholder="Nama Depan" />
                        <x-input label="Last Name" name="last_name" value="{{ old('last_name') }}" type="text"
                            placeholder="Nama Belakang" />
                        <x-input label="Email" name="email" value="{{ old('email') }}" type="text"
                            placeholder="Email" />
                        <x-input label="Phone" name="phone" value="{{ old('phone') }}" type="text"
                            placeholder="Nomor Telepon" />
                        <x-input label="Password" name="password" value="{{ old('password') }}" type="password"
                            placeholder="Password" />
                        <x-input label="Confirm Password" name="confirm_password" value="{{ old('confirm_password') }}"
                            type="password" placeholder="Konfirmasi Password" />
                        <div class="col-span-2 place-self-center">
                            <button name="submit" type="submit"
                                class="btn btn-md min-w-96 text-white btn-warning">Daftar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
