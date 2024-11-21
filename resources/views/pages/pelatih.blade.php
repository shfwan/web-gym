@extends('layouts.main')
<?php
$days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

?>
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
                    <input id="date" class="input bg-transparent input-bordered text-white bg-warning" type="date"
                        name="date"
                        value="{{ app('request')->input('date') != null ? app('request')->input('date') : date('Y-m-d') }}">

                    <script type="text/javascript">
                        let date = document.getElementById('date');
                        date.addEventListener('change', () => {
                            window.location.href = "/pelatih?date=" + date.value;
                        })
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

                            <button
                                class="btn btn-info rounded-md text-white {{ $item->memberStatus ? 'btn-disabled' : '' }}"
                                onclick="pelatih{{ $item->id }}.showModal()">Lihat</button>
                            <label class="text-error font-semibold {{ $item->memberStatus ? '' : 'hidden' }}"
                                for="">Anda belum terdaftar member / Member anda sudah kadaluarsa</label>
                        </x-cardpelatih>

                        <script type="text/javascript"></script>

                        <x-modal class="w-fit" id="pelatih{{ $item->id }}" title="Pelatih">
                            <form class="flex flex-col gap-4" action="{{ route('transaction.checkout', $item->id) }}"
                                method="post">
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
                                    <input name="date" type="date"
                                        value="{{ app('request')->input('date') != null ? app('request')->input('date') : date('Y-m-d') }}"
                                        class="hidden">

                                    <label class="font-normal text-sm text-gray-700 text-start w-full" for="label">Hari
                                        yang Tersedia</label>
                                    <div class="inline-flex gap-4">

                                        @for ($i = 0; $i < count($days); $i++)
                                            @if (in_array($i, $item->available_days))
                                                <div id="update{{ $i }}"
                                                    class="flex flex-col w-full p-4 items-center justify-center border rounded-md bg-success/80 text-white">
                                                    <input type="checkbox" name="days[]" value="{{ $i }}"
                                                        id="update{{ $days[$i] }}" checked hidden>
                                                    <h2>{{ $days[$i] }}</h2>
                                                </div>
                                            @else
                                                <div id="update{{ $i }}"
                                                    class="flex flex-col w-full p-4 items-center justify-center border rounded-md">
                                                    <input type="checkbox" name="days[]" value="{{ $i }}"
                                                        id="update{{ $days[$i] }}" hidden>
                                                    <h2>{{ $days[$i] }}</h2>
                                                </div>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <div class="inline-flex w-full gap-4 justify-end items-center">
                                    <label class="text-error font-semibold {{ $item->statusAvailable ? 'hidden' : '' }}"
                                        for="">Tidak bisa Booking karena Sudah Penuh</label>
                                    <label class="text-error font-semibold {{ $item->statusHari ? 'hidden' : '' }}"
                                        for="">Pelatih tidak tersedia untuk hari ini</label>
                                    <button type="submit"
                                        class="btn btn-success btn-md text-white {{ $item->statusAvailable && $item->statusHari ? '' : 'btn-disabled' }}">
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
    <script type="text/javascript" hidden>
        @if (session('success.checkout'))
            Swal.fire({
                title: "Berhasil",
                text: "Berhasil checkout",
                icon: "success",
                confirmButtonColor: "#00a96e",
            })
        @endif

        @if (session('error.checkout'))
            Swal.fire({
                title: "Gagal",
                text: "Gagal melakukan checkout",
                icon: "error",
                confirmButtonColor: "#ff5861",
            })
        @endif
    </script>
@endsection
