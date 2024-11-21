@extends('layouts.main')

@section('content')
    <div class="bg-white min-h-screen p-[2rem_4rem]">
        <div class="block w-full space-y-8 place-items-start">
            <h1 class="font-semibold text-4xl text-black">Setting</h1>

            <div class="block space-y-4 w-full">
                <div class="inline-flex justify-between items-center w-full">

                    <h1 class="font-semibold text-xl text-black">List Member Card</h1>
                    {{-- Button Add Card Member --}}
                    <button class="btn btn-success text-white" onclick="addCard.showModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            <path fill-rule="evenodd"
                                d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                        </svg>
                        New Card Member
                    </button>

                    {{-- Modal Add Card Member --}}
                    <x-modal class="w-fit" id="addCard" title="Tambah Member Card">
                        @if ($errors->any())
                            <div class="bg-red-400 rounded-md p-4">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                        <li class="text-white">{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('setting.card.post') }}" method="post">
                            @csrf
                            <div class="flex flex-col w-full gap-4 max-w-2xl">
                                <input type="text" name="gym_id" class="hidden">
                                <x-input label="Judul" name="title" value="{{ old('title') }}" type="text"
                                    placeholder="Nama Kartu" />
                                <x-input label="Harga" name="price" value="{{ old('price') }}" type="number"
                                    placeholder="Masukan Harga" />
                                <div class="inline-flex gap-4 w-full items-center">
                                    <x-input label="Berlaku Selama" name="long" value="{{ old('long') }}"
                                        type="number" placeholder="Berlaku Selama" />
                                    <div class="flex flex-col w-full gap-2">
                                        <label class="font-normal text-sm text-gray-700" for="label">Tipe</label>
                                        <select name="type"
                                            class="select select-bordered max-w-xs bg-transparent text-black">
                                            <option disabled selected>Pilih Masa Aktif Member</option>
                                            <option>Hari</option>
                                            <option>Minggu</option>
                                            <option>Bulan</option>
                                            <option>Tahun</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="w-full">
                                    <x-textarea label="Deskripsi" name="description" placeholder="Deskripsi Member Card" />
                                </div>


                                <button type="submit" class="btn btn-success text-white">Tambah</button>
                            </div>

                        </form>
                    </x-modal>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    @foreach ($listCardMember as $item)
                        <div class="card bg-white border w-fit min-w-full h-fit shadow b">
                            <div class="card-body gap-8">
                                <label class="card-title text-xl text-black" for="">{{ $item->title }}</label>
                                <div class="w-full flex h-full flex-col items-center justify-center">

                                    <span class="inline-flex items-end">
                                        <h1 class="text-3xl text-light text-gray-800">@currency($item->price) /</h1>
                                        <h2 class="text-xl text-gray-500">{{ $item->type }}</h2>
                                    </span>
                                </div>
                                {{-- <h2 class="card-title">Card title!</h2>
                            <p>If a dog chews shoes whose shoes does he choose?</p> --}}
                                <div class="card-actions justify-end">

                                    {{-- Button Edit Member --}}
                                    <button id={{ "editbtnCard$item->id" }}
                                        class="btn btn-sm rounded-md btn-warning text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg>
                                    </button>

                                    {{-- Modal Update Card Member --}}
                                    <x-modal class="w-fit" id="editCard.{{ $item->id }}" title="Ubah Member Card">
                                        @if ($errors->any())
                                            <div class="bg-red-400 rounded-md p-4">
                                                <ul>
                                                    @foreach ($errors->all() as $item)
                                                        <li class="text-white">{{ $item }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form action="{{ route('setting.card.update', $item->id) }}" method="post">
                                            @csrf
                                            <div class="flex flex-col w-full gap-4 max-w-2xl">
                                                <input type="text" name="gym_id" class="hidden">
                                                <x-input label="Judul" name="title" value="{{ $item->title }}"
                                                    type="text" placeholder="Nama Kartu" />
                                                <x-input label="Harga" name="price" value="{{ $item->price }}"
                                                    type="number" placeholder="Masukan Harga" />
                                                <div class="inline-flex gap-4 w-full items-center">
                                                    <x-input label="Berlaku Selama" name="long"
                                                        value="{{ $item->long }}" type="number"
                                                        placeholder="Berlaku Selama" />
                                                    <div class="flex flex-col w-full gap-2">
                                                        <label class="font-normal text-sm text-gray-700"
                                                            for="label">Tipe</label>
                                                        <select name="type"
                                                            class="select select-bordered max-w-xs bg-transparent text-black">
                                                            <option disabled selected>Pilih Masa Aktif Member</option>
                                                            <option>Hari</option>
                                                            <option>Minggu</option>
                                                            <option>Bulan</option>
                                                            <option>Tahun</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="w-full">
                                                    <x-textarea label="Deskripsi" name="description"
                                                        placeholder="Deskripsi Member Card">{{ $item->description }}</x-textarea>
                                                </div>


                                                <button type="submit" class="btn btn-warning text-white">Ubah</button>
                                            </div>

                                        </form>
                                    </x-modal>

                                    <script type="text/javascript">
                                        document.getElementById("editbtnCard{{ $item->id }}").onclick = function() {
                                            document.getElementById("editCard.{{ $item->id }}").showModal();
                                        }
                                    </script>

                                    {{-- Button Delete Member --}}
                                    <form action="{{ route('setting.card.delete', $item->id) }}" method="post">
                                        @csrf
                                        <button type="button" onclick="btnDeleteCardMember(this)" class="btn btn-sm rounded-md btn-error text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" hidden>
        @if (session('add'))
            Swal.fire({
                title: "Berhasil",
                text: "Berhasil menambahkan Kartu Member",
                icon: "success",
                confirmButtonColor: "#00a96e",
            })
        @endif

        @if (session('update'))
            Swal.fire({
                title: "Berhasil",
                text: "Berhasil mengubah Kartu Member",
                icon: "success",
                confirmButtonColor: "#00a96e",
            })
        @endif

        const btnDeleteCardMember = (btn) => {

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
