@extends('layouts.main')

@section('content')
    <div class="container mx-auto max-w-6xl bg-white min-h-screen p-8">

        <div class="block space-y-8">
            {{-- Information Card Member --}}
            @if ($userCardMember != null)
                <div class="block w-full space-y-4">
                    <h1 class="font-semibold text-xl text-black">Informasi Kartu Member</h1>
                    <div class="card max-w-72 max-h-72 shadow-md">
                        <div class="card-body">
                            <h1 class="card-title text-black">Kartu Member</h1>
                            <div class="inline-flex flex-col gap-2 w-full">
                                <label for="label" class="text-sm text-gray-500">Status Member</label>
                                <div
                                    class="badge {{ $userCardMember->status ? 'badge-success' : 'badge-error' }} text-white">
                                    {{ $userCardMember->status ? 'Aktif' : 'Tidak Aktif' }}
                                </div>
                            </div>
                            <div class="inline-flex flex-col gap-2 w-full">
                                <label for="label" class="text-sm text-gray-500">Berlaku Dari</label>
                                <h3 class="truncate w-full text-base text-gray-700">
                                    {{ $userCardMember->updatedAt == '' ? '-' : $userCardMember->updatedAt }}</h3>
                                <label for="label" class="text-sm text-gray-500">Sampai</label>
                                <h3 class="truncate w-full text-base text-gray-700">
                                    {{ $userCardMember->expiredAt == '' ? '-' : $userCardMember->expiredAt }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- List Card Member --}}
            <div class="flex flex-col gap-4">
                <h1 class="font-semibold text-xl text-black">List Kartu Member</h1>
                @if (count($listCardMember) > 0)
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ($listCardMember as $item)
                            <form action="{{ route('transaction.checkout.card_member', $item->id) }}" method="post">
                                @csrf
                                <div class="card bg-white border max-h-72 h-72 shadow-md">
                                    <div class="card-body">
                                        <label class="card-title text-xl text-black font-semibold"
                                            for="">{{ $item->title }}</label>
                                        <div class="w-full flex h-full flex-col items-center justify-center">
                                            <input type="text" name="type" value="Card Member" class="hidden">
                                            <input type="text" name="gym_id" value="{{ $item->gym_id }}" class="hidden">
                                            <input type="text" name="price" value="{{ $item->price }}" class="hidden">
                                            <span class="inline-flex items-end">
                                                <h1 class="text-3xl text-light text-gray-800">@currency($item->price) /</h1>
                                                <h2 class="text-2xl text-gray-500">{{ $item->type }}</h2>
                                            </span>
                                        </div>
                                        <div class="card-actions justify-end">
                                            <button class="btn btn-md btn-success text-white">Upgrade
                                                Sekarang</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                @else
                    <div class="flex flex-col gap-8 w-full h-full items-center justify-center place-items-center">
                        <img class="max-w-96" src="/icon/empty.png" alt="">
                        <h1 class="font-semibold text-2xl text-gray-800">Kartu Member Belum dibuat</h1>
                    </div>
                @endif
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
