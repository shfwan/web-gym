@extends('layouts.main')

@section('content')
    <div class="bg-white w-full h-full p-8">
        <div class="block w-full space-y-32 place-content-center">

            {{-- CRUD Pelatih --}}
            <div class="block w-full space-y-4">
                <h1 class="font-bold text-2xl text-black">Pelatih</h1>
                <hr>
                <div class="inline-flex justify-between items-center w-full">
                    {{-- Search --}}
                    <x-search action="{{ route('pelatih.management') }}" name="cari" placeholder="Cari Pelatih"
                        value="{{ old('cari') }}" />

                    {{-- Button Add Pelatih --}}
                    <button class="btn btn-success text-white" onclick="addPelatih.showModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            <path fill-rule="evenodd"
                                d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                        </svg>
                        New Pelatih
                    </button>

                    {{-- Modal Add Pelatih --}}
                    <x-modal id="addPelatih" title="Tambah Pelatih">
                        @if ($errors->any())
                            <div class="bg-red-400 rounded-md p-4">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                        <li class="text-white">{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('pelatih.post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="flex flex-col w-full gap-4 max-w-2xl">
                                {{-- <span
                                    class="min-w-52 min-h-60 rounded-full border cursor-pointer hover:shadow transition-all overflow-hidden"
                                    onclick="file.click()">
                                    <img src="" alt="">
                                </span> --}}
                                <input id="file" name="picture" type="file" class=" file-input w-full max-w-xs " />
                                <x-input label="Nama" name="name" value="{{ old('name') }}" type="text"
                                    placeholder="Nama Pelatih" />
                                <x-input label="Harga" name="price" value="{{ old('price') }}" type="number"
                                    placeholder="Masukan Harga" />
                                <x-textarea label="Deskripsi" name="description" placeholder="Deskripsi Pelatih" />

                                <button type="submit" class="btn btn-success text-white">Tambah</button>
                            </div>

                        </form>
                    </x-modal>
                </div>

                <div class="block w-full space-y-4">
                    <h2 class="font-semibold text-base text-gray-800">Total Pelatih {{ count($listPelatih) }}</h2>
                    <div class="grid grid-cols-4 gap-4 min-h-[20rem] max-h-[40rem] border rounded-md p-4 overflow-y-scroll">
                        @foreach ($listPelatih as $item)
                            <x-cardpelatih picture="{{ asset($item->picture) }}" name="{{ $item->name }}"
                                description="{{ $item->description }}" price="{{ $item->price }}">
                                {{-- Button Edit Member --}}
                                <button class="btn btn-sm rounded-md btn-warning text-white"
                                    onclick="editPelatih{{ $item->id }}.showModal()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                </button>

                                {{-- Button Delete Member --}}
                                <form action="{{ route('pelatih.delete', $item->id) }}" method="post">
                                    @csrf
                                    <button class="btn btn-sm rounded-md btn-error text-white" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </button>
                                </form>
                                <x-modal id="editPelatih{{ $item->id }}" title="Edit Pelatih">
                                    @if ($errors->any())
                                        <div class="bg-red-400 rounded-md p-4">
                                            <ul>
                                                @foreach ($errors->all() as $item)
                                                    <li class="text-white">{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('pelatih.update', $item->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="flex flex-col w-full gap-4 max-w-2xl">
                                            <input id="file" name="picture" type="file"
                                                class=" file-input w-full max-w-xs" />
                                            <x-input label="Nama" name="name" value="{{ $item->name }}"
                                                type="text" placeholder="Nama Pelatih" />
                                            <x-input label="Harga" name="price" value="{{ $item->price }}"
                                                type="number" placeholder="Masukan Harga" />
                                            <textarea name="description" class="textarea textarea-bordered"  placeholder="Deskripsi">{{ $item->description }}</textarea>

                                            <button type="submit" class="btn btn-warning text-white">Ubah</button>
                                        </div>

                                    </form>
                                </x-modal>
                            </x-cardpelatih>
                        @endforeach
                    </div>
                </div>
            </div>


            {{-- CRUD Latihan --}}
            <div class="block w-full space-y-4">
                <h1 class="font-bold text-2xl text-black">Latihan</h1>
                <hr>
                <div class="inline-flex justify-between items-center w-full">
                    {{-- Search --}}
                    <x-search name="cari_latihan" placeholder="Cari Latihan" />


                    {{-- Button Add Latihan --}}
                    <button class="btn btn-success text-white" onclick="addLatihan.showModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            <path fill-rule="evenodd"
                                d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                        </svg>
                        New Latihan
                    </button>

                    <x-modal id="addLatihan" title="Tambah Latihan">
                        <form action="{{ route('latihan.post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="flex flex-col w-full gap-4">
                                <input type="file" name="picture" class="file-input w-full max-w-xs" />
                                <x-input label="Nama Latihan" name="title" type="text"
                                    placeholder="Nama Latihan" />
                                <x-textarea label="Deskripsi" name="description" placeholder="Deskripsi"></x-textarea>
                                <button type="submit" class="btn btn-success text-white">Tambah</button>

                            </div>
                        </form>
                    </x-modal>
                </div>

                {{-- List Latihan --}}
                <div class="block w-full space-y-4">
                    <h2 class="font-semibold text-base text-gray-800">Total Latihan {{ count($listLatihan) }}</h2>
                    <div
                        class="grid grid-cols-4 gap-4 min-h-[20rem] max-h-[40rem] border rounded-md p-4 overflow-y-scroll">
                        @foreach ($listLatihan as $item)
                            <x-cardlatihan title="{{ $item->title }}" description="{{ $item->description }}"
                                image="{{ $item->image }}">
                                {{-- Button Edit Member --}}
                                <button class="btn btn-sm rounded-md btn-warning text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                </button>

                                {{-- Button Delete Member --}}
                                <form action="{{ route('latihan.delete', $item->id) }}" method="post">
                                    @csrf
                                    <button class="btn btn-sm rounded-md btn-error text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </button>
                                </form>
                            </x-cardlatihan>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
