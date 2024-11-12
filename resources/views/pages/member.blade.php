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
                <x-modal id="addMember" title="Tambah Member">
                    <form action="{{ route('member.post') }}" method="post">
                        @csrf
                        <div class="flex flex-col w-full gap-4">
                            <div class="grid grid-cols-2 gap-4">
                                <x-input label="Nama Depan" name="firstname" type="text" placeholder="Nama depan" />
                                <x-input label="Nama Belakan" name="lastname" type="text" placeholder="Nama Belakang" />
                                <x-input label="Email" name="email" type="text" placeholder="Email" />
                                <x-input label="Nomor HP" name="phone" type="text" placeholder="Nomor HP" />
                                <x-input label="Password" name="password" type="text" placeholder="Password" />
                                <x-input label="Konfirmasi Password" name="confirm_password" type="text"
                                    placeholder="Konfirmasi Password" />
                                <select class="select select-bordered w-full max-w-xs">
                                    <option disabled selected>Pilih Masa Aktif Member</option>
                                    <option>1 Minggu</option>
                                    <option>1 Bulan</option>
                                    <option>3 Bulan</option>
                                </select>
                            </div>
                            <button class="btn btn-success text-white">Tambah</button>
                        </div>
                    </form>
                </x-modal>

            </div>

            {{-- List Member --}}
            <h2 class="font-semibold text-base text-gray-800">Total Member {{ count($listMember) }}</h2>
            <div class="grid grid-cols-4 gap-4">
                @foreach ($listMember as $item)
                    <x-cardmember fullname="{{ $item->firstname . ' ' . $item->lastname }}" picture="{{ $item->picture }}"
                        phone="{{ $item->phone }}" email="{{ $item->email }}" description="">

                        {{-- Button Perpanjang Member --}}
                        <button class="btn btn-sm rounded-md btn-info text-white"
                            onclick="perpanjangMember{{ $item->id }}.showModal()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-calendar2-week" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5zM11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </button>

                        {{-- Button Edit Member --}}
                        <button class="btn btn-sm rounded-md btn-warning text-white"
                            onclick="editMember{{ $item->id }}.showModal()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                            </svg>
                        </button>

                        {{-- Button Delete Member --}}
                        <form action="{{ route('member.delete', $item->id) }}" method="post">
                            @csrf
                            <button class="btn btn-sm rounded-md btn-error text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                </svg>
                            </button>
                        </form>

                        {{-- Modal Edit Member --}}
                        <x-modal id="editMember{{ $item->id }}" title="Edit Member">
                            <form action="{{ route('member.update', $item->id) }}" method="POST">
                                @csrf
                                <div class="flex flex-col w-96 gap-4">
                                    <x-input value="{{ $item->firstname }}" label="Nama Depan" name="firstname"
                                        type="text" placeholder="Nama depan" />
                                    <x-input value="{{ $item->lastname }}" label="Nama Belakang" name="lastname"
                                        type="text" placeholder="Nama Belakang" />
                                    <x-input value="{{ $item->email }}" label="Email" name="email" type="text"
                                        placeholder="Email" />
                                    <x-input value="{{ $item->phone }}" label="Nomor HP" name="phone" type="text"
                                        placeholder="Nomor HP" />
                                    <button class="btn btn-warning text-white">Update</button>
                                </div>
                            </form>
                        </x-modal>

                        {{-- Modal Perpanjang Member --}}
                        <x-modal id="perpanjangMember{{ $item->id }}" title="Perpanjang Member">
                            {{-- Card Member --}}
                            <div class="grid grid-cols-3 gap-4">
                                @for ($i = 0; $i < 3; $i++)
                                    <div class="card bg-base-100 w-96 h-96 shadow-xl">
                                        <div class="card-body">
                                            <h2 class="card-title">Card title!</h2>
                                            <p>If a dog chews shoes whose shoes does he choose?</p>
                                            <div class="card-actions justify-end">
                                                <button class="btn btn-primary">Buy Now</button>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </x-modal>

                    </x-cardmember>
                @endforeach
            </div>

            {{-- Pagination --}}

            <div class="join mt-auto">
                <button class="join-item btn btn-outline btn-active">1</button>
                <button class="join-item btn btn-outline">2</button>
                <button class="join-item btn btn-outline">3</button>
                <button class="join-item btn btn-outline">4</button>
            </div>
        </div>
    </div>
@endsection
