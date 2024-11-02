@extends('layouts.main')

@section('header')
    <h1 class="text-3xl">Member</h1>
@endsection

@section('content')
    <div class="bg-white w-full h-full p-8">
        <div class="block w-full space-y-8 place-items-center">
            <div class="inline-flex justify-between items-center w-full">

                {{-- Search --}}
                <label class="input input-bordered max-w-lg w-full flex items-center gap-2">
                    <input type="text" class="grow" placeholder="Search" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                        <path fill-rule="evenodd"
                            d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </label>

                {{-- Button Add Member --}}
                <button class="btn btn-success text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        <path fill-rule="evenodd"
                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                    </svg>
                    New Member asd
                </button>

            </div>

            {{-- List Member --}}
            <h2 class="font-semibold text-base text-gray-800">Total Member 10</h2>
            <div class="grid grid-cols-4 gap-4">
                @for ($i = 0; $i < 10; $i++)
                    <div class="card card-compact bg-white shadow-md rounded-md">
                        <div class="w-full bg-yellow-100  h-32 rounded-t-md inline-flex p-4 gap-4 items-center">
                            <figure class="max-w-24 border-white border-2 rounded-full">
                                <img class="flex-[1_0_100%]" src="https://avatar.iran.liara.run/public" alt="profil">
                            </figure>
                            <div class="block w-full">
                                <h3 class="card-title text-gray-800">Budiono Siregar</h3>
                            </div>
                        </div>
                        <div class="card-body items-start text-start gap-6">
                            <div class="block space-y-2 w-full">
                                <div class="inline-flex flex-col gap-2 w-full">
                                    <label for="label" class="text-sm text-gray-500">Phone</label>
                                    <h2 class="text-base text-gray-700">081234567890</h2>
                                </div>
                                <div class="inline-flex flex-col gap-2 w-full">
                                    <label for="label" class="text-sm text-gray-500">Email</label>
                                    <h2 class="text-base text-gray-700">siregar@gmail.com</h2>
                                </div>
                                <div class="inline-flex flex-col gap-2 w-full">
                                    <label for="label" class="text-sm text-gray-500">Description</label>
                                    <p class="truncate w-full text-base text-gray-700">If a dog chews shoes whose shoes does he choose?</p>
                                </div>
                            </div>

                            <div class="card-actions ">
                                {{-- Button Perpanjang Member --}}
                                <button class="btn btn-sm rounded-md btn-info text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-calendar2-week" viewBox="0 0 16 16">
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                                        <path
                                            d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5zM11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                    </svg>
                                </button>

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
            </div>

            {{-- Pagination --}}
            <div class="flex justify-center">
                <div class="join ">
                    <button class="join-item btn btn-active">1</button>
                    <button class="join-item btn">2</button>
                    <button class="join-item btn">3</button>
                    <button class="join-item btn">4</button>
                </div>
            </div>
        </div>
    </div>
@endsection
