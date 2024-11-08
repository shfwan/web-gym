<aside class="fixed top-0 left-0 h-screen w-64 block place-items-center shadow p-4 bg-white space-y-4">
    <div class="w-full">
        <figure class="max-w-52">
            <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" alt="">
        </figure>
    </div>
    <nav class="w-full">
        <ul class="block space-y-2">
            <x-side-navlink href="/dashboard">Dashboard</x-side-navlink>
            <x-side-navlink href="/management">Management</x-side-navlink>
            <x-side-navlink href="/member">Member</x-side-navlink>
            <x-side-navlink href="/booking">Booking</x-side-navlink>
            <x-side-navlink href="/riwayat">Riwayat</x-side-navlink>
            {{-- <div class="collapse collapse-arrow place-content-start p-0">
                <input type="radio" name="my-accordion-2" />
                <div class="collapse-title text-lg font-normal text-black">Setting</div>
                <div class="collapse-content">
                </div>
            </div> --}}
            <x-side-navlink href="/profil">Profil</x-side-navlink>
            <x-side-navlink href="/logout">Keluar</x-side-navlink>
        </ul>
    </nav>
</aside>
