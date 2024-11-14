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
                    <x-modal id="addCard" title="Tambah Member Card">
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
                                <x-input label="Judul" name="title" value="{{ old('tile') }}" type="text"
                                    placeholder="Nama Kartu" />
                                <x-input label="Harga" name="price" value="{{ old('price') }}" type="number"
                                    placeholder="Masukan Harga" />
                                <div class="inline-flex gap-4 w-full items-center">
                                    <x-input label="Berlaku Selama" name="long" value="{{ old('long') }}"
                                        type="number" placeholder="Berlaku Selama" />
                                    <div class="flex flex-col w-full gap-2">
                                        <label class="font-normal text-sm text-gray-700" for="label">Tipe</label>
                                        <select name="type" class="select select-bordered max-w-xs bg-transparent text-black">
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

                <div class="grid grid-cols-4 gap-4">
                    @foreach ($listCardMember as $item)
                        <div class="card bg-white border w-96 h-72 shadow-xl">
                            <div class="card-body">
                                <label class="card-title text-xl text-black" for="">{{ $item->title }}</label>
                                <div class="w-full flex h-full flex-col items-center justify-center">

                                    <span class="inline-flex items-end">
                                        <h1 class="text-4xl text-light text-gray-800">@currency($item->price) /</h1>
                                        <h2 class="text-2xl text-gray-500">{{ $item->type }}</h2>
                                    </span>
                                </div>
                                {{-- <h2 class="card-title">Card title!</h2>
                            <p>If a dog chews shoes whose shoes does he choose?</p> --}}
                                <div class="card-actions justify-end">
                                    <form action="{{ route('transaction.checkoutCardMember') }}" method="post">
                                        @csrf
                                        <button id={{ 'pay-button' }} class="btn btn-success text-white">Upgrade
                                            Sekarang</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
