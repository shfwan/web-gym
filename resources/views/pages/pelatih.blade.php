@extends('layouts.main')

@section('content')
    <div class="container mx-auto max-w-7xl min-h-screen bg-white p-8">
        <div class="flex flex-col items-center justify-center gap-8">
            <div class="block w-full place-items-center space-y-6 min-h-screen">
                <h1 class="font-semibold text-2xl text-black">Pelatih yang Tersedia</h1>

                {{-- Search --}}
                <div class="place-self-start w-full">
                    <x-search action="{{ route('pelatih.search') }}" name="value" placeholder="Cari Pelatih"
                        value="{{ old('value') }}" />
                </div>

                @if (count($listPelatih) < 1)
                    <div class="flex flex-col gap-8 w-full h-full items-center justify-center place-items-center">
                        <img class="max-w-96" src="/icon/empty.png" alt="">
                        <h1 class="font-semibold text-2xl text-gray-800">Tidak Ada Pelatih</h1>
                    </div>
                @endif
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($listPelatih as $item)
                        <x-cardpelatih
                            picture="{{ 'https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg' }}"
                            name="{{ $item->name }}" description="{{ $item->description }}" price="{{ $item->price }}"
                            onclick="pelatih{{ $item->id }}.showModal()" />

                        <x-modal id="pelatih{{ $item->id }}" title="Pelatih">
                            <form action="{{ route('transaction.checkout') }}" method="post">
                                @csrf
                                <div data class="flex flex-col gap-4 min-w-96 max-w-3xl">
                                    {{-- Information --}}
                                    <div class="inline-flex gap-4 w-full">
                                        <figure class="max-w-20">
                                            <img class="flex-[1_0_100%]" src="" alt="">
                                        </figure>
                                        <div class="w-full block space-y-4">
                                            <h1 class="text-xl font-semibold">{{ $item->name }}</h1>
                                            <h2 class="text-lg font-semibold">@currency($item->price)</h2>
                                            <p class="max-w-96">{{ $item->description }}</p>
                                        </div>
                                    </div>
                                    <input name="id" type="text" value="{{ $item->id }}" class="hidden">
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

                                    <div class="inline-flex w-full gap-4 justify-end">
                                        <button type="submit" class="btn btn-success btn-md text-white">
                                            Checkout
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </x-modal>
                    @endforeach
                </div>
            </div>

            @if (count($listPelatih) > 0)
                <div class="join">
                    <button class="join-item btn">1</button>
                    <button class="join-item btn btn-active">2</button>
                    <button class="join-item btn">3</button>
                    <button class="join-item btn">4</button>
                </div>
            @endif
        </div>
    </div>
@endsection
