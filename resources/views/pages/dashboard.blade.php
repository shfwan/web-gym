@extends('layouts.main')

@section('content')
    <div class="bg-white w-full h-screen p-8 overflow-hidden">
        <div class="block w-full space-y-8 ">
            {{-- Statistic --}}
            <div class="inline-flex gap-4 max-w-screen-2xl w-full">
                <x-cardstat title="Member" count="{{ $countMember }}" icon="" />
                <x-cardstat title="Pelatih" count="{{ $countPelatih }}" icon="" />
                <x-cardstat title="Booking" count="10" icon="" />
            </div>

            {{-- List Booking --}}
            <div class="block w-full h-full space-y-4">
                <h2 class="font-semibold text-base text-gray-800">Total Booking 10</h2>
                <div class="h-[30rem] overflow-hidden border rounded-md p-4">
                    <div class="flex flex-col gap-4 w-full h-full overflow-y-scroll">
                        @for ($i = 0; $i < 13; $i++)
                            <div class="max-w-7xl w-full grid grid-cols-5 border border-gray-300 transition-all cursor-pointer hover:shadow-md  p-4 gap-4 rounded-md">
                                <h3 class="text-black truncate">Budiono Siregarar</h3>
                                <h3 class="text-black truncate">Ahmad Kasim</h3>
                                <h3 class="text-black place-self-center">Abs, Forearm</h3>
                                <h3 class="text-black place-self-center">2024-11-10</h3>
                                <h3 class="text-black place-self-center">@currency(20000)</h3>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
