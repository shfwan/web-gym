@extends('layouts.main')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="min-w-96 max-w-96 min-h-fit shadow-md bg-white rounded-md p-8">
            <div class="block w-full place-content-center space-y-10">
                <h1 class="font-bold text-xl w-full text-center text-black">Login</h1>
                @if ($errors->any())
                    @if ($errors->all()[0] == 'Username or Password Incorrect')
                        <div class="bg-red-400 rounded-md p-4">
                            <ul>
                                <li class="text-white">{{ $errors->all()[0] }}</li>

                            </ul>
                        </div>
                    @endif
                @endif
                <form action="" method="post">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <x-input label="User" name="email" value="{{ old('email') }}" type="text"
                            placeholder="Email atau Nomor Telepon">
                            @error('email')
                                <label class="font-normal text-sm text-error" for="">{{ $message }}</label>
                            @enderror
                        </x-input>
                        <x-input label="Password" name="password" value="{{ old('password') }}" type="password"
                            placeholder="Password">
                            @error('password')
                                <label class="font-normal text-sm text-error" for="">{{ $message }}</label>
                            @enderror
                        </x-input>
                        <button name="submit" type="submit"
                            class="btn btn-lg w-full text-white btn-warning">Login</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" hidden>
        @if (session('success.login'))
            Swal.fire({
                title: "Berhasil",
                text: "Berhasil login",
                icon: "success",
                confirmButtonColor: "#00a96e",
            })
        @endif
    </script>
@endsection
