@extends('layouts.main')

@section('content')
    <div class="bg-white w-full h-screen p-8 overflow-hidden">
        <div class="block w-full space-y-8 ">
            {{-- Statistic --}}
            <div class="inline-flex gap-4 max-w-screen-2xl w-full">
                <x-cardstat title="Member" count="{{ $countMember }}" icon="" />
                <x-cardstat title="Pelatih" count="{{ $countPelatih }}" icon="" />
                <x-cardstat title="Booking" count="{{ count($listTransaksi) }}" icon="" />
                <x-cardstat type="currency" title="Pendapatan" count="{{ $countIncome }}" icon="" />
            </div>

            {{-- List Booking --}}
            <div class="block w-full h-full space-y-4">
                <h2 class="font-semibold text-base text-gray-800">Total Booking Hari ini {{ count($listTransaksi) }}</h2>
                <div class="h-full overflow-hidden border rounded-md p-4">
                    <div class="flex flex-col gap-4 w-full max-w-full">
                        <div class="w-full grid grid-cols-7 border border-gray-300 p-4 gap-4 rounded-md place-items-center">
                            <h3 class="text-black font-semibold place-self-start">Nama Member</h3>
                            <h3 class="text-black font-semibold">Harga</h3>
                            <h3 class="text-black font-semibold place-self-start">Status Member</h3>
                            <h3 class="text-black font-semibold place-self-start">Tipe Pembayaran</h3>
                            <h3 class="text-black font-semibold">Status Pembayaran</h3>
                            <h3 class="text-black font-semibold">Tanggal</h3>
                            <h3 class="text-black font-semibold">Aksi</h3>
                        </div>
                        @foreach ($listTransaksi as $item)
                            <div
                                class="w-full grid grid-cols-7 border border-gray-300 transition-all p-4 gap-4 rounded-md place-items-center">
                                <div class="place-self-start flex items-center justify-center h-full">
                                    <h3 class="text-black truncate ">
                                        {{ $item->user->firstname . ' ' . $item->user->lastname }}</h3>
                                </div>
                                <h3 class="text-black ">@currency($item->total_price)</h3>
                                {{-- Status Member --}}
                                @if ($item->type == 'Booking')
                                    @if ($item->status_member)
                                        <div class="badge badge-success text-white p-4">
                                            {{ 'Member' }}
                                        </div>
                                    @else
                                        <div class="badge badge-error text-white p-4">
                                            {{ 'Non Member' }}
                                        </div>
                                    @endif
                                @else
                                    <div class="badge bg-ghost text-white p-4">
                                        -
                                    </div>
                                @endif
                                <div class="place-self-start  h-full flex items-center justify-center">
                                    <h3 class="text-black truncate">{{ $item->type }}</h3>
                                </div>
                                @if ($item->status == 'accepted')
                                    <div class="badge badge-success text-white p-4">
                                        {{ $item->status }}
                                    </div>
                                @else
                                    <div class="badge badge-error text-white p-4">
                                        {{ $item->status }}
                                    </div>
                                @endif
                                <h3 class="text-black place-self-center truncate text-ellipsis">{{ $item->created_at }}
                                </h3>
                                <div class="place-self-center inline-flex gap-4">
                                    <button id="transaction-detail" class="btn btn-success btn-sm w-fit text-white rounded"
                                        onclick="detailTransaksi{{ $item->id }}.showModal()">Lihat
                                        Transaksi</button>
                                </div>
                            </div>
                            <x-modal class="w-fit" id="detailTransaksi{{ $item->id }}" title="Detail Transaksi">
                                @php
                                    $fullname = $item->user->firstname . ' ' . $item->user->lastname;
                                @endphp
                                <div class="flex flex-col gap-4  min-w-96 cursor-default">
                                    <x-label type="text" title="Transaksi ID" value="{{ $item->id }}" />
                                    {{-- <h1>{{ $item->user->firstname ." ". $item->user->lastname }}</h1> --}}
                                    <x-label type="text" title="Nama Member" value="{{ $fullname }}" />
                                    <x-label type="status" title="Status Member">
                                        {{-- Status Member --}}
                                        @if ($item->type == 'Booking')
                                            @if ($item->status_member)
                                                <div class="badge badge-success text-white p-4">
                                                    {{ 'Member' }}
                                                </div>
                                            @else
                                                <div class="badge badge-error text-white p-4">
                                                    {{ 'Non Member' }}
                                                </div>
                                            @endif
                                        @else
                                            <div class="badge bg-ghost text-white p-4">
                                                -
                                            </div>
                                        @endif
                                    </x-label>
                                    <x-label type="text" title="Tipe Pembayaran" value="{{ $item->type }}" />
                                    <x-label type="text" title="Tanggal" value="{{ $item->date }}" />
                                    <x-label type="status" title="Status Pembayaran">
                                        <div class="badge badge-success text-white p-4">
                                            {{ $item->status }}
                                        </div>
                                    </x-label>
                                    <x-label type="number" title="Total Harga" value="{{ $item->total_price }}" />
                                    <x-label type="text" title="Tanggal Transaksi" value="{{ $item->created_at }}" />
                                </div>
                                <script id="" type="text/javascript" hidden>
                                    document.getElementById('transaction-detail').onclick = () => {
                                        document.getElementById('detailTransaksi{{ $item->id }}').showModal()
                                    }
                                </script>
                            </x-modal>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
