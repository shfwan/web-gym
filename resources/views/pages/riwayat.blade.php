@extends('layouts.main')

@section('content')
    <div class="container mx-auto max-w-7xl bg-white min-h-screen p-16">
        <div class="block w-full space-y-4 place-items-center">
            @for ($i = 0; $i < 10; $i++)
                <div class="card card-side bg-base-100 shadow-xl w-full">
                    <figure>
                        <img src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp"
                            alt="Movie" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">New movie is released!</h2>
                        <p>Click the button to watch on Jetflix app.</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary">Watch</button>
                        </div>
                    </div>
                </div>
            @endfor
            <div class="join">
                <button class="join-item btn">1</button>
                <button class="join-item btn btn-active">2</button>
                <button class="join-item btn">3</button>
                <button class="join-item btn">4</button>
            </div>
        </div>
    </div>
@endsection
