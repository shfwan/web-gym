@extends('layouts.main')

@section('content')
    <div class="{{ Auth::user()->role == 'member' ? 'container mx-auto max-w-6xl' : '' }} bg-white min-h-screen p-8">
        <div class="flex flex-col items-center justify-center h-full ">
            <div class="block space-y-4 place-items-center min-w-96">
                <figure
                    class="max-w-52 cursor-pointer hover:shadow-md transition-all bg-gray-400 rounded-full overflow-hidden "
                    onclick="ubahGambar.showModal()">
                    @if ($profil && $profil->picture != null)
                        <img class="flex-[1_0_100%] object-cover aspect-square"
                            src="{{ asset('storage/upload/' . $profil->picture) }}" alt="profil">
                    @else
                        <img class="flex-[1_0_100%] " src="{{ asset('/icon/account.png') }}" alt="profil">
                    @endif
                </figure>
                <x-modal id="ubahGambar" title="Ubah Foto Profil">
                    <form action="{{ route('profil.update-picture', $user->id) }}" method="post"
                        class="flex flex-col gap-4 items-center justify-center w-full" enctype="multipart/form-data">
                        @csrf
                        <figure
                            class="max-w-xl cursor-pointer hover:shadow-md hover:scale-[102%] transition-all bg-gray-400 rounded-md overflow-hidden "
                            onclick="file.click()">
                            @if ($profil && $profil->picture != null)
                                <img class="flex-[1_0_100%] " src="{{ asset('storage/upload/' . $profil->picture) }}"
                                    alt="profil">
                            @else
                                <img class="flex-[1_0_100%] " src="{{ asset('/icon/account.png') }}" alt="profil">
                            @endif
                            <input class="hidden" type="file" name="picture" id="file">
                        </figure>
                        <button id="btn-ubah" type="submit" class="hidden">Ubah</button>
                    </form>
                    <script type="text/javascript">
                        const file = document.getElementById('file')
                        const btnUbah = document.getElementById('btn-ubah')

                        file.onchange = () => {
                            if (file.files.length > 0) {
                                btnUbah.click()
                            }
                        }
                    </script>

                    <form action="{{ route('profil.delete-picture', $user->id) }}" method="POST">
                        @csrf
                        <div class="inline-flex w-full gap-4 justify-end">
                            <button class="btn btn-error text-white">Hapus</button>
                        </div>
                    </form>
                </x-modal>
                <h2 class="font-semibold text-xl">{{ $user->firstname }}</h2>

                <div class="w-full block space-y-4">
                    <form id="form" action="{{ route('profil.update', $user->id) }}" class="flex flex-col gap-4 w-full"
                        method="POST">
                        @csrf
                        <x-input disabled value="{{ $user->firstname }}" label="Nama depan" name="firstname" type="text"
                            placeholder="Nama depan" />
                        <x-input disabled value="{{ $user->lastname }}" label="Nama belakang" name="lastname"
                            type="text" placeholder="Nama belakang" />
                        <x-input disabled value="{{ $user->email }}" label="Email" name="email" type="text"
                            placeholder="Email" />
                        <x-input disabled value="{{ $user->phone }}" label="Nomor HP" name="phone" type="text"
                            placeholder="Nomor HP" />
                        <button id="btn-save" class="btn btn-success text-white w-full hidden">Save</button>
                    </form>
                    <button id="btn-edit" class="btn btn-warning text-white w-full">Edit
                        Profil</button>
                    <button class="btn btn-info text-white w-full" onclick="ubahPassword.showModal()">Ubah Password</button>
                </div>
            </div>

            <script type="text/javascript">
                document.getElementById('btn-edit').onclick = () => {
                    document.getElementById('firstname').disabled = (document.getElementById('firstname').disabled == true) ?
                        false : true
                    document.getElementById('lastname').disabled = (document.getElementById('lastname').disabled == true) ?
                        false : true
                    document.getElementById('email').disabled = (document.getElementById('email').disabled == true) ? false :
                        true
                    document.getElementById('phone').disabled = (document.getElementById('phone').disabled == true) ? false :
                        true

                    if (document.getElementById('firstname').disabled == false) {
                        document.getElementById('btn-save').classList.remove('hidden')
                        document.getElementById('btn-edit').classList.add('hidden')
                    }
                }
            </script>
            <x-modal title="Ubah Password" id="ubahPassword">
                <form action="{{ route('password.post') }}" method="post">
                    @csrf
                    <div class="block w-full space-y-4">
                        <x-input label="Password" name="password" type="password" placeholder="Password" />
                        <x-input label="Konfirmasi Password" name="confirm_password" type="password"
                            placeholder="Konfirmasi Password" />
                        <button type="submit" class="btn btn-warning w-full text-white">Ubah Password</button>
                    </div>
                </form>
            </x-modal>

        </div>
    </div>
@endsection
