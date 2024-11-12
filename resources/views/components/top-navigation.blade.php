<div class="w-full p-2 bg-white sticky top-0 z-50 shadow">
    <div class="w-full inline-flex items-center justify-between">
        <div class="inline-flex">
            <figure class="max-w-16">
                <img class="flex-[1_0_100%]"
                    src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"
                    alt="">
            </figure>
            <h1 class="text-3xl font-bold text-yellow-300">GYM Alfatih</h1>
        </div>
        <nav class="inline-flex gap-4 items-center">
            <ul class="inline-flex gap-4 text-black items-center">
                <x-navlink href="/">Home</x-navlink>
                @if (Auth::user())
                    <x-navlink href="/pelatih">Pelatih</x-navlink>
                    <x-navlink href="/transaksi">Booking</x-navlink>
                    <x-navlink href="/profil">Profil</x-navlink>
                    <x-navlink class="btn btn-warning text-white" onclick="upgrade.showModal()">Upgrade Ke
                        Member</x-navlink>
                    <x-side-navlink href="/logout">Keluar</x-side-navlink>
                @else
                    <button class="btn btn-warning rounded-md text-white ">
                        <a href="/logout">Login</a>
                    </button>
                @endif
            </ul>
        </nav>
        {{-- Modal Upgrade to Member --}}
        <x-modal id="upgrade" title="Upgrade Ke Member">
            {{-- Card Member --}}
            <div class="grid grid-cols-3 gap-4">
                @for ($i = 0; $i < 3; $i++)
                    <div class="card bg-base-100 w-96 h-96 shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title">Card title!</h2>
                            <p>If a dog chews shoes whose shoes does he choose?</p>
                            <div class="card-actions justify-end">
                                <button class="btn btn-primary">Buy Now</button>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </x-modal>
    </div>
</div>
