@extends('layouts.main')

@section('header')
    <h1 class="text-3xl">Member</h1>
@endsection

@section('content')
    <div class="bg-white w-full min-h-screen p-8">
        <div class="flex flex-col w-full gap-8 min-h-screen">
            <div class="inline-flex justify-between items-center min-w-full">
                {{-- Search --}}
                <x-search action="{{ route('member.search') }}" name="value" placeholder="Cari Member" />

                {{-- Button Add Member --}}
                <button class="btn btn-success text-white" onclick="addMember.showModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        <path fill-rule="evenodd"
                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                    </svg>
                    New Member
                </button>

                {{-- Modal Add Member --}}
                <x-modal class="w-fit" id="addMember" title="Tambah Member">
                    <form action="{{ route('member.post') }}" method="post">
                        @csrf
                        <div class="flex flex-col w-full gap-4">
                            <div class="grid grid-cols-2 gap-4">
                                <x-input label="Nama Depan" name="firstname" type="text" placeholder="Nama depan" />
                                <x-input label="Nama Belakan" name="lastname" type="text" placeholder="Nama Belakang" />
                                <x-input label="Email" name="email" type="text" placeholder="Email" />
                                <x-input label="Nomor HP" name="phone" type="text" placeholder="Nomor HP" />
                                <x-input label="Password" name="password" type="password" placeholder="Password" />
                                <x-input label="Konfirmasi Password" name="confirm_password" type="password"
                                    placeholder="Konfirmasi Password" />
                            </div>
                            <button class="btn btn-success text-white">Tambah</button>
                        </div>
                    </form>
                </x-modal>

            </div>

            {{-- List Member --}}
            <h2 class="font-semibold text-base text-gray-800">Total Member {{ count($listMember) }}</h2>
            @if (count($listMember) < 1)
                <div class="flex flex-col gap-8 w-full h-full items-center justify-center place-items-center">
                    <img class="max-w-96" src="/icon/empty.png" alt="">
                    <h1 class="font-semibold text-2xl text-gray-800">Tidak ada Member</h1>
                </div>
            @else
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($listMember as $item)
                        @if ($item->role == 'member')
                            <x-cardmember id="{{ $item->id }}" fullname="{{ $item->firstname . ' ' . $item->lastname }}"
                                picture="{{ $item->profil ? $item->profil->picture : null }}" phone="{{ $item->phone }}"
                                email="{{ $item->email }}" description="" status="{{ $item->status }}"
                                created_at="{{ $item->member->updatedAt }}"
                                expire="{{ $item->member ? $item->member->expiredAt : null }}">

                                {{-- Button Edit Member --}}
                                <button id={{ "editMember$item->id" }}
                                    class="btn btn-sm rounded-md btn-warning text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                </button>

                                {{-- Button Delete Member --}}
                                <form action="{{ route('member.delete', $item->id) }}" method="post">
                                    @csrf
                                    <buttonbt type="button" onclick="btnDeleteMember(this)" class="btn btn-sm rounded-md btn-error text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </buttonbt>
                                </form>

                                {{-- Modal Edit Member --}}
                                <x-modal class="w-fit" id="editMember.{{ $item->id }}" title="Edit Member">
                                    <form action="{{ route('member.update', $item->id) }}" method="POST">
                                        @csrf
                                        <div class="flex flex-col w-96 gap-4">
                                            <x-input value="{{ $item->firstname }}" label="Nama Depan" name="firstname"
                                                type="text" placeholder="Nama depan" />
                                            <x-input value="{{ $item->lastname }}" label="Nama Belakang" name="lastname"
                                                type="text" placeholder="Nama Belakang" />
                                            <x-input value="{{ $item->email }}" label="Email" name="email"
                                                type="text" placeholder="Email" />
                                            <x-input value="{{ $item->phone }}" label="Nomor HP" name="phone"
                                                type="text" placeholder="Nomor HP" />
                                            <button class="btn btn-warning text-white">Update</button>
                                        </div>
                                    </form>
                                </x-modal>

                                <script type="text/javascript" class="hidden">
                                    document.getElementById('editMember{{ $item->id }}').onclick = () => {
                                        document.getElementById("editMember.{{ $item->id }}").showModal()
                                    }
                                </script>

                            </x-cardmember>
                        @endif
                    @endforeach
                </div>
                {{ $listMember->links() }}
            @endif
        </div>
    </div>
    <script type="text/javascript" hidden>
        @if (session('add'))
            Swal.fire({
                title: "Berhasil",
                text: "Berhasil menambahkan pelatih",
                icon: "success",
                confirmButtonColor: "#00a96e",
            })
        @endif

        @if (session('update'))
            Swal.fire({
                title: "Berhasil",
                text: "Berhasil mengubah pelatih",
                icon: "success",
                confirmButtonColor: "#00a96e",
            })
        @endif

        const btnDeleteMember = (btn) => {

            Swal.fire({
                title: "Apakah kamu yakin?",
                text: "Data akan benar-benar terhapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#00b5ff",
                cancelButtonColor: "#ff5861",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success",
                        confirmButtonColor: "#00a96e",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            btn.parentElement.submit()
                        }
                    });
                }
            });
        }
    </script>
@endsection
