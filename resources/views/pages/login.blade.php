@extends('layouts.main')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="min-w-96 max-w-96 min-h-fit shadow-md bg-white rounded-md p-8">
            <div class="block w-full place-content-center space-y-10">
                <h1 class="font-bold text-xl w-full text-center">Login</h1>
                @if ($errors->any())
                    <div class="bg-red-400 rounded-md p-4">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li class="text-white">{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="" method="post">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <x-input label="User" name="email" value="{{ old('email') }}" type="text" placeholder="Email atau Nomor Telepon"/>
                        <x-input label="Password" name="password" value="{{ old('password') }}" type="password" placeholder="Password" />
                        <button name="submit" type="submit" class="btn btn-lg w-full text-white btn-warning">Login</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
