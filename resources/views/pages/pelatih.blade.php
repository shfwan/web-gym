@extends('layouts.main')

@section('content')
    <div class="container mx-auto max-w-7xl min-h-screen bg-white p-8">
        <div class="flex flex-col items-center justify-center gap-8">
            <div class="flex flex-col w-full place-items-center gap-6 min-h-screen">
                <h1 class="font-semibold text-2xl text-black">Pelatih yang Tersedia</h1>

                <div class="inline-flex gap-4 items-center justify-start min-w-full">
                    {{-- Search --}}
                    <div class="place-self-start w-full">
                        <x-search action="{{ route('pelatih.search') }}" name="value" placeholder="Cari Pelatih"
                            value="{{ old('value') }}" />
                    </div>

                    {{-- Date Filter --}}
                    <div class="inline-flex gap-4 items-center">
                        {{-- <input type="text" placeholder="Date" disabled
                            class="input input-bordered w-full max-w-xs bg-transparent" />
                        <button id="btn-date" class="btn btn-info rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                class="bi bi-calendar-week" viewBox="0 0 16 16">
                                <path
                                    d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                            </svg>
                        </button> --}}
                    </div>
                    <input class="input bg-transparent input-bordered text-white bg-warning" type="date" name="date"
                        id="date">
                    <script type="text/javascript">
                        let date = document.getElementById('date');
                        date.addEventListener('change', () => {
                            window.location.href = "/pelatih?date=" + date.value;
                        })

                        document.getElementById('btn-date').onclick = () => {
                            date.open()
                        }
                    </script>
                </div>

                @if (count($listPelatih) < 1)
                    <div class="flex flex-col gap-8 w-full h-full items-center justify-center place-items-center">
                        <img class="max-w-96" src="/icon/empty.png" alt="">
                        <h1 class="font-semibold text-2xl text-gray-800">Tidak Ada Pelatih</h1>
                    </div>
                @endif
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($listPelatih as $item)
                        <x-cardpelatih picture="{{ $item->picture }}" name="{{ $item->name }}"
                            description="{{ $item->description }}" price="{{ $item->price }}">

                            <button class="btn btn-info rounded-md text-white"
                                onclick="pelatih{{ $item->id }}.showModal()">Lihat</button>
                        </x-cardpelatih>


                        <x-modal id="pelatih{{ $item->id }}" title="Pelatih">
                            <form class="flex flex-col gap-4" action="{{ route('transaction.checkout', $item->id) }}" method="post">
                                @csrf
                                <div data class="flex flex-col items-center justify-center gap-4 min-w-96 max-w-3xl">
                                    {{-- Information --}}
                                    <figure class="max-w-96 ">
                                        <img class="flex-[1_0_100%] rounded-md object-fill max-h-96"
                                            src="{{ asset('storage/upload/' . $item->picture) }}" alt="">
                                    </figure>

                                    <div class="w-full grid grid-cols-2 gap-4">
                                        <x-text label='Nama Pelatih' value='{{ $item->name }}' />
                                        <x-text label='Alamat' value='{{ $item->address }}' />
                                        <x-text label='Email' value='{{ $item->email }}' />
                                        <x-text label='Nomor HP' value='{{ $item->phone }}' />
                                        <x-text label='Harga' type='number' value='{{ $item->price }}' />
                                        <x-text label='Terbooking' value='{{ $item->booking }}' />

                                        {{-- <p class="max-w-96">{{ $item->description }}</p> --}}
                                    </div>

                                    <input name="id" type="text" value="{{ $item->id }}" class="hidden">
                                    <input name="type" type="text" value="Booking" class="hidden">
                                    <input name="gym_id" type="text" value="{{ $item->gym_id }}" class="hidden">
                                    <input name="price" type="text" value="{{ $item->price }}" class="hidden">

                                    {{-- List Latihan --}}
                                    {{-- <div class="grid grid-cols-3 gap-4 overflow-y-scroll max-h-96 border p-4">
                                        @for ($i = 0; $i < 10; $i++)
                                                <div
                                                    class="card card-side bg-white rounded-md border hover:shadow transition-all min-w-52 max-h-32 cursor-pointer p-4"
                                                    onclick="checkbox.click()">
                                                    <figure class="p-2 max-w-20  bg-gray-100 rounded-md">
                                                        <img class="" src="/abs.png" alt="Shoes" class="rounded-md" />
                                                    </figure>
                                                    <div class="card-body items-start text-start">
                                                        <h2 class="card-title text-xl font-bold text-black">ForeArms</h2>
                                                        <div class="card-actions justify-end w-full">
                                                        </div>
                                                    </div>
                                                    <input id="checkbox" type="checkbox" class="w-full" />
                                                </div>
                                            @endfor
                                        <dialog id="latihan" class="modal">
                                            <div class="modal-box">
                                                <form method="dialog">
                                                    <button
                                                        class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                                </form>
                                                <h3 class="font-bold text-lg">Hello!</h3>
                                                <p class="py-4">Press ESC key or click on ✕ button to close</p>
                                            </div>
                                        </dialog>
                                    </div> --}}

                                </div>
                                <div class="inline-flex w-full gap-4 justify-end items-center">
                                    <label class="text-error font-semibold {{$item->statusAvailable ? 'hidden' : ''}}" for="">Tidak bisa Booking karena Sudah Penuh</label>
                                    <button type="submit" class="btn btn-success btn-md text-white {{$item->statusAvailable ? '' : 'btn-disabled'}}">
                                        Booking Sekarang
                                    </button>
                                </div>
                            </form>
                        </x-modal>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
