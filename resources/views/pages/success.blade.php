@extends('layouts.main')

@section('content')
    <div class="container mx-auto max-w-7xl  flex items-center justify-center min-h-screen">
        <div class="card bg-white shadow border text-neutral-content w-96">
            <div class="card-body items-center text-center gap-4 space-y-4">
                <h2 class="card-title">Success Payment</h2>
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#00a96e"
                    class="bi bi-check-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                        d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                </svg>
                <div class="card-actions justify-end">
                    <button class="btn btn-success text-white" onclick="window.location.href='{{ route('transaction') }}'">Lihat Transaksi</button>
                </div>
            </div>
        </div>
    </div>
@endsection
