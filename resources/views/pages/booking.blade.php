@extends('layouts.main')

@section('content')
    <div
        class="{{ Auth::user()->role == 'member' ? 'container mx-auto max-w-7xl' : '' }} bg-white min-h-screen p-[2rem_4rem]">
        <div class="block w-full space-y-8 place-items-start">
            <div class="inline-flex items-center justify-between gap-4">
                <h1 class="font-semibold text-4xl text-black">Transaksi</h1>
                <select id="filter" class="select select-bordered ml-auto w-full max-w-xs bg-white text-black">
                    <option disabled selected>Filter Pembayaran</option>
                    <option>Semua</option>
                    <option>Booking</option>
                    <option>Card Member</option>
                </select>
            </div>

            <script type="text/javascript" hidden>
                let filter = document.getElementById('filter')
                filter.addEventListener('change', () => {
                    window.location.href = '/transaksi?filter=' + filter.value
                })
            </script>
            <div class="flex flex-col gap-4 w-full max-w-7xl">
                <div class="w-full grid grid-cols-6 border border-gray-300 p-4 gap-4 rounded-md place-items-center">
                    <h3 class="text-black font-semibold place-self-start truncate">
                        {{ Auth::user()->role == 'member' ? 'Nama Pelatih / Kartu Member' : 'Nama Member' }}
                    </h3>
                    <h3 class="text-black font-semibold">Harga</h3>
                    <h3 class="text-black font-semibold place-self-start">Tipe Pembayaran</h3>
                    <h3 class="text-black font-semibold">Status</h3>
                    <h3 class="text-black font-semibold">Tanggal</h3>
                    <h3 class="text-black font-semibold">Aksi</h3>
                </div>

                @if (count($listTransaksi) < 1)
                    <div class="flex flex-col gap-8 w-full h-full items-center justify-center place-items-center">
                        <img class="max-w-96" src="/icon/empty.png" alt="">
                        <h1 class="font-semibold text-2xl text-gray-800">Saat ini tidak ada transaksi</h1>
                    </div>
                @else
                    @foreach ($listTransaksi as $item)
                        <div
                            class="w-full grid grid-cols-6 border border-gray-300 transition-all p-4 gap-4 rounded-md place-items-center">
                            <div class="place-self-start flex items-center justify-center h-full">
                                @if (auth()->user()->role == 'admin')
                                    <h3 class="text-black truncate ">{{ $item->user->firstname ." ". $item->user->lastname }}</h3>
                                @else
                                    @if ($item->type == 'Booking')
                                        <h3 class="text-black truncate ">{{ $item->pelatih->name }}</h3>
                                    @elseif ($item->type == 'Card Member')
                                        <h3 class="text-black truncate ">{{ $item->cardMember->title }}</h3>
                                    @endif
                                @endif
                            </div>
                            <h3 class="text-black ">@currency($item->total_price)</h3>
                            <div class="place-self-start  h-full flex items-center justify-center">
                                <h3 class="text-black truncate">{{ $item->type }}</h3>
                            </div>
                            @if ($item->status == 'accepted')
                                <div class="badge badge-success text-white p-4">
                                    {{ $item->status }}
                                </div>
                            @elseif ($item->status == 'pending')
                                <div class="badge badge-warning text-white p-4">
                                    {{ $item->status }}
                                </div>
                            @else
                                <div class="badge badge-error text-white p-4">
                                    {{ $item->status }}
                                </div>
                            @endif
                            <h3 class="text-black place-self-center truncate text-ellipsis">{{ $item->created_at }}</h3>
                            <div class="place-self-center inline-flex gap-4">
                                @if ($item->status == 'pending')
                                    <button id={{ "pay-button.$item->id" }} type="submit"
                                        class="btn btn-info btn-sm w-fit text-white rounded">Bayar</button>

                                    <script id="" type="text/javascript" hidden>
                                        document.getElementById('pay-button.{{ $item->id }}').onclick = function() {
                                            // SnapToken acquired from previous step
                                            snap.pay('{{ $item->snap_token }}', {
                                                // Optional
                                                onSuccess: function(result) {
                                                    /* You may add your own js here, this is just example */
                                                    window.location.href = '{{ route('transaction.success', $item->id) }}';
                                                },
                                                // Optional
                                                onPending: function(result) {
                                                    /* You may add your own js here, this is just example */
                                                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                                                },
                                                // Optional
                                                onError: function(result) {
                                                    /* You may add your own js here, this is just example */
                                                    window.location.href = '{{ route('transaction.fail', $item->id) }}';

                                                }
                                            });
                                        };
                                    </script>
                                @else
                                    <button id="transaction-detail{{ $item->id }}"
                                        class="btn btn-success btn-sm w-fit text-white rounded"
                                        onclick="detailTransaksi{{ $item->id }}.showModal()">Lihat Transaksi</button>
                                    <x-modal id="detailTransaksi{{ $item->id }}" title="Detail Transaksi">
                                        <div class="flex flex-col gap-4  min-w-96 cursor-default">
                                            <x-label type="text" title="Transaksi ID" value="{{ $item->id }}" />
                                            @if ($item->type == 'Booking')
                                                {{-- <h3 class="text-black truncate ">{{ $item->pelatih->name }}</h3> --}}
                                                <x-label type="text" title="Nama Pelatih / Kartu Member"
                                                    value="{{ $item->pelatih->name }}" />
                                            @elseif ($item->type == 'Card Member')
                                                {{-- <h3 class="text-black truncate ">{{ $item->cardMember->title }}</h3> --}}
                                                <x-label type="text" title="Nama Pelatih / Kartu Member"
                                                    value="{{ $item->cardMember->title }}" />
                                            @endif
                                            <x-label type="text" title="Tipe Pembayaran" value="{{ $item->type }}" />
                                            <x-label type="text" title="Tanggal Booking" value="{{ $item->date }}" />
                                            <x-label type="status" title="Status Pembayaran">
                                                @if ($item->status == 'accepted')
                                                    <div class="badge badge-success text-white p-4">
                                                        {{ $item->status }}
                                                    </div>
                                                @elseif ($item->status == 'pending')
                                                    <div class="badge badge-warning text-white p-4">
                                                        {{ $item->status }}
                                                    </div>
                                                @else
                                                    <div class="badge badge-error text-white p-4">
                                                        {{ $item->status }}
                                                    </div>
                                                @endif
                                            </x-label>
                                            <x-label type="number" title="Total Harga" value="{{ $item->total_price }}" />
                                            <x-label type="text" title="Tanggal Transaksi"
                                                value="{{ $item->created_at }}" />
                                        </div>
                                    </x-modal>

                                    <script id="" type="text/javascript" hidden>
                                        document.getElementById('transaction-detail{{ $item->id }}').onclick = () => {
                                            document.getElementById('detailTransaksi{{ $item->id }}').showModal()
                                        }
                                    </script>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    {{ $listTransaksi->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
