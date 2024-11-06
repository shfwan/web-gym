@extends('layouts.main')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="min-w-96 min-h-fit shadow-md bg-white rounded-md p-8">
            <div class="block w-full place-content-center space-y-10">
                <h1 class="font-bold text-xl w-full text-center">Login</h1>
                @if ($errors->any())
                    <div class="bg-red-400 rounded-md">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="" method="post">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <input name="email" value="{{ old('email') }}" class="input input-bordered w-full max-w-full"
                            type="text" placeholder="Email atau Nomor Telepon" />
                        <input name="password" value="{{ old('password') }}" class="input input-bordered w-full max-w-full"
                            type="password" placeholder="Password" />
                        <button name="submit" type="submit" class="btn btn-lg w-full text-white btn-info">Login</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
