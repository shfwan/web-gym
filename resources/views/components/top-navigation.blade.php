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
            <ul class="inline-flex gap-4 text-black">
                <x-navlink href="/">Home</x-navlink>
                @if (Auth::user())
                    <x-navlink href="/pelatih">Pelatih</x-navlink>
                    <x-navlink href="/booking">Booking</x-navlink>
                    <x-navlink href="/profil">Profil</x-navlink>
                    <x-navlink href="/logout">Logout</x-navlink>
                @endif
            </ul>
            <button class="btn btn-warning rounded-md text-white " onclick="route('/login')">
                <a href="/login">Login</a>
            </button>
        </nav>
    </div>
</div>
