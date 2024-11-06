@extends('layouts.main')

@section('content')
    <div class="bg-white w-full h-full p-8">
        <div class="block w-full space-y-32 place-content-center">

            {{-- CRUD Latihan --}}
            <div class="block w-full space-y-4">
                <h1 class="font-bold text-2xl text-black">Latihan</h1>
                <hr>
                <div class="inline-flex justify-between items-center w-full">
                    {{-- Search --}}
                    <label class="input input-bordered max-w-lg w-full flex items-center gap-2">
                        <input type="text" class="grow" placeholder="Search" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="h-4 w-4 opacity-70">
                            <path fill-rule="evenodd"
                                d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                                clip-rule="evenodd" />
                        </svg>
                    </label>

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
                        <form action="" method="post">
                            @csrf
                            <div class="flex flex-col w-full gap-4">
                                <input type="file" class="file-input w-full max-w-xs" />
                                <input type="text" placeholder="Nama Latihan" class="input input-bordered w-full max-w-full" />
                                <textarea class="textarea textarea-bordered" placeholder="Deskripsi"></textarea>
                            </div>
                        </form>
                    </x-modal>
                </div>

                {{-- List Latihan --}}
                <div class="block w-full space-y-4">
                    <h2 class="font-semibold text-base text-gray-800">Total Latihan 10</h2>
                    <div class="grid grid-cols-4 gap-4">
                        @for ($i = 0; $i < 10; $i++)
                            <div
                                class="card card-side bg-white rounded-md border hover:shadow transition-all min-w-72 max-h-32 cursor-pointer p-4">
                                <figure class="p-2 max-w-20  bg-gray-100 rounded-md">
                                    <img class="" src="/abs.png" alt="Shoes" class="rounded-md" />
                                </figure>
                                <div class="card-body items-start text-start">
                                    <h2 class="card-title text-xl font-bold text-black">ForeArms</h2>
                                    {{-- <h2 class="text-gray-800">@currency($price)</h2> --}}
                                    <div class="card-actions justify-end w-full">

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
                                        <button class="btn btn-sm rounded-md btn-error text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endfor
                        <dialog id="latihan" class="modal">
                            <div class="modal-box">
                                <form method="dialog">
                                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                </form>
                                <h3 class="font-bold text-lg">Hello!</h3>
                                <p class="py-4">Press ESC key or click on ✕ button to close</p>
                            </div>
                        </dialog>
                    </div>
                </div>
            </div>

            {{-- CRUD Pelatih --}}
            <div class="block w-full space-y-4">
                <h1 class="font-bold text-2xl text-black">Pelatih</h1>
                <hr>
                <div class="inline-flex justify-between items-center w-full">
                    {{-- Search --}}
                    <label class="input input-bordered max-w-lg w-full flex items-center gap-2">
                        <input type="text" class="grow" placeholder="Search" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="h-4 w-4 opacity-70">
                            <path fill-rule="evenodd"
                                d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                                clip-rule="evenodd" />
                        </svg>
                    </label>

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

                    <x-modal id="addPelatih" title="Tambah Pelatih">
                        @csrf
                        <form action="" method="post">
                            <div class="flex flex-col w-full gap-4 max-w-2xl">
                                {{-- <span
                                    class="min-w-52 min-h-60 rounded-full border cursor-pointer hover:shadow transition-all overflow-hidden"
                                    onclick="file.click()">
                                    <img src="" alt="">
                                </span> --}}
                                <input id="file" type="file" class=" file-input w-full max-w-xs" />

                                <input type="text" placeholder="Nama Pelatih" class="input input-bordered w-full max-w-md" />
                                <input type="number" placeholder="Maksimal Pelatihan" class="input input-bordered w-full max-w-md" />
                                <input type="number" placeholder="Price" class="input input-bordered w-full max-w-md" />
                                <textarea class="textarea textarea-bordered" placeholder="Deskripsi"></textarea>
                            </div>

                        </form>
                    </x-modal>
                </div>

                <div class="block w-full space-y-4">
                    <h2 class="font-semibold text-base text-gray-800">Total Pelatih 10</h2>
                    <div class="grid grid-cols-4 gap-4">
                        @for ($i = 0; $i < 10; $i++)
                            <x-cardpelatih
                                picture="{{ 'https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg' }}"
                                name="Budiono Siregar" description="Cita-cita Kapal Laut" price="100000">
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
                                <button class="btn btn-sm rounded-md btn-error text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                    </svg>
                                </button>
                            </x-cardpelatih>
                        @endfor
                        <dialog id="pelatih" class="modal">
                            <div class="modal-box">
                                <form method="dialog">
                                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                </form>
                                <h3 class="font-bold text-lg">Hello!</h3>
                                <p class="py-4">Press ESC key or click on ✕ button to close</p>
                            </div>
                        </dialog>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
