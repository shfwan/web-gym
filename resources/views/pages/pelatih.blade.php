@extends('layouts.main')

@section('content')
    <div class="container mx-auto max-w-7xl min-h-screen bg-white p-8">
        <div class="flex flex-col items-center justify-center gap-8">
            <div class="block place-items-center space-y-6">
                <h1 class="font-semibold text-2xl text-black">Pelatih yang Tersedia</h1>
                <div class="grid grid-cols-4 gap-4">
                    @for ($i = 0; $i < 10; $i++)
                        <x-card-pelatih
                            picture="{{ 'https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg' }}"
                            name="Budiono Siregar"
                            description="Cita-cita Kapal Laut"
                            price="100000"
                        />
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
            <div class="join">
                <button class="join-item btn">1</button>
                <button class="join-item btn btn-active">2</button>
                <button class="join-item btn">3</button>
                <button class="join-item btn">4</button>
            </div>
        </div>
    </div>
@endsection
