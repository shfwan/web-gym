@extends('layouts.main')

@section('content')
    <div class="bg-white w-full h-screen p-8">
        <div class="block w-full space-y-8 ">
            {{-- Statistic --}}
            <div class="inline-flex gap-4 max-w-screen-2xl w-full">
                @for ($i = 0; $i < 4; $i++)
                    <div class="w-full min-h-36 shadow border rounded-md flex-row p-4 gap-4">
                        {{-- Icon --}}
                        <img src="" alt="">

                        {{-- Text --}}
                        <div class="block w-full space-y-2">
                            <h3 class=" text-2xl text-center text-gray-700">Member</h3>
                            <h4 class=" text-2xl text-center text-gray-700">10</h4>
                        </div>
                    </div>
                @endfor
            </div>

            {{-- List Booking --}}
            <div class="block w-full space-y-4">
                <h2 class="font-semibold text-base text-gray-800">Total Booking 10</h2>
                <div class="overflow-y-scroll">
                    <div class="flex flex-col gap-4 w-full">
                        @for ($i = 0; $i < 13; $i++)
                            <div class="max-w-7xl w-full grid grid-cols-5 border  p-4 gap-4 rounded-md">
                                <h3 class="truncate">Budiono Siregarar</h3>
                                <h3 class="truncate">Ahmad Kasim</h3>
                                <h3 class="place-self-center">Abs, Forearm</h3>
                                <h3 class="place-self-center">2024-11-10</h3>
                                <h3 class="place-self-center">@currency(20000)</h3>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
