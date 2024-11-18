@extends('layouts.main')

@section('content')
    <div class="container mx-auto max-w-6xl bg-white min-h-screen p-8">
        {{-- List Card Member --}}
        <div class="flex flex-col gap-4in">
            <h1 class="font-semibold text-xl text-black">List Kartu Member</h1>
            <div class="grid grid-cols-3 gap-4">
                @foreach ($listCardMember as $item)
                    <form action="{{ route('transaction.checkout.card_member', $item->id) }}" method="post">
                        @csrf
                        <div class="card bg-white border w-96 h-72 shadow-md">
                            <div class="card-body">
                                <label class="card-title text-xl text-black" for="">{{ $item->title }}</label>
                                <div class="w-full flex h-full flex-col items-center justify-center">
                                    <input type="text" name="type" value="Card Member" class="hidden">
                                    <input type="text" name="gym_id" value="{{ $item->gym_id }}" class="hidden">
                                    <input type="text" name="price" value="{{ $item->price }}" class="hidden">
                                    <span class="inline-flex items-end">
                                        <h1 class="text-4xl text-light text-gray-800">@currency($item->price) /</h1>
                                        <h2 class="text-2xl text-gray-500">{{ $item->type }}</h2>
                                    </span>
                                </div>
                                <div class="card-actions justify-end">

                                    <button id={{ 'pay-button' }} class="btn btn-success text-white">Upgrade
                                        Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
