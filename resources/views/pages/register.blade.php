@extends('layouts.main')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="min-w-96 min-h-fit shadow-md bg-white rounded-md p-8">
            <div class="block w-full place-content-center space-y-10">
                <h1 class="font-bold text-xl w-full text-center text-black">Daftar Member</h1>
                <form action="{{ route('register.post') }}" method="post">
                    @csrf
                    <div class="grid grid-cols-2 gap-4 place-items-center">
                        <x-input label="First Name" name="firstname" value="{{ old('firstname') }}" type="text"
                            placeholder="Nama Depan">
                            @error('firstname')
                                <label class="font-normal text-sm text-error" for="">{{ $message }}</label>
                            @enderror
                        </x-input>
                        <x-input label="Last Name" name="lastname" value="{{ old('lastname') }}" type="text"
                            placeholder="Nama Belakang">
                            @error('firstname')
                                <label class="font-normal text-sm text-error" for="">{{ $message }}</label>
                            @enderror
                        </x-input>
                        <x-input label="Email" name="email" value="{{ old('email') }}" type="text"
                            placeholder="Email">
                            @error('email')
                                <label class="font-normal text-sm text-error" for="">{{ $message }}</label>
                            @enderror
                        </x-input>
                        <x-input label="Phone" name="phone" value="{{ old('phone') }}" type="text"
                            placeholder="Nomor Telepon">
                            @error('phone')
                                <label class="font-normal text-sm text-error" for="">{{ $message }}</label>
                            @enderror
                        </x-input>
                        <x-input label="Password" name="password" value="{{ old('password') }}" type="password"
                            placeholder="Password">
                            @error('password')
                                <label class="font-normal text-sm text-error" for="">{{ $message }}</label>
                            @enderror
                        </x-input>
                        <x-input label="Confirm Password" name="confirm_password" value="{{ old('confirm_password') }}"
                            type="password" placeholder="Konfirmasi Password">
                            @error('confirm_password')
                                <label class="font-normal text-sm text-error" for="">{{ $message }}</label>
                            @enderror
                        </x-input>
                        <div class="col-span-2 place-self-center">
                            <button name="submit" type="submit"
                                class="btn btn-md min-w-96 text-white btn-warning">Daftar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" hidden>
        @if (session('existEmail'))
            Swal.fire({
                title: "Gagal",
                text: "Email sudah terdaftar",
                icon: "error",
                confirmButtonColor: "#00a96e",
            })
        @endif

        @if (session('existPhone'))
            Swal.fire({
                title: "Gagal",
                text: "Nomor HP sudah terdaftar",
                icon: "error",
                confirmButtonColor: "#00a96e",
            })
        @endif
    </script>
@endsection
