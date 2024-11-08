@extends('layouts.main')

@section('content')
    <div class="block w-full space-y-24 ">
        <section class="min-h-screen w-full bg-no-repeat object-fill" style="background-image: url('{{ asset('/gambar/1.jpg') }}') ">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">

                {{-- <h1 class="text-5xl font-bold">Welcome To Laravel</h1> --}}
            </div>
        </section>

        <section class="max-w-7xl mx-auto p-6 lg:p-8 w-full min-h-screen">
            <div class="block w-full space-y-16">
                <div class="flex items-center justify-center flex-col gap-4">
                    <h1 class="uppercase text-xl font-bold">Benefit</h1>
                    <p class="text-center max-w-2xl">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos,
                        recusandae eum! Minima, voluptates? Dolore dolorum ipsum amet doloribus at nesciunt repellat fuga
                        soluta, sed ab voluptatibus, sint recusandae! Nihil, quia!</p>
                </div>

                <div class="grid grid-cols-3 gap-4 text-black">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="block w-full space-y-4">
                            <figure class="max-w-xl">
                                <img class="flex-[1_0_100%]"
                                    src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"
                                    alt="">
                            </figure>
                            <h2 class="text-center w-full text-lg">Laravel</h2>
                            <p class="text-center max-w-96">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias similique reiciendis,
                                aliquid dolores natus debitis, optio, nesciunt nulla suscipit sit inventore temporibus
                                libero voluptas eos corrupti quas vero? Illo, incidunt!
                            </p>
                        </div>
                    @endfor
                </div>
                {{-- <h1 class="text-5xl font-bold">Welcome To Laravel</h1> --}}
            </div>
        </section>

        <section class="w-full bg-black min-h-96 relative">
            <div class="w-96 h-96 bg-yellow-400 absolute -top-16 left-24">

            </div>
        </section>

        <section class="max-w-4xl mx-auto p-6 lg:p-8 w-full min-h-screen flex flex-col items-center justify-center  gap-16">
            <div class="block space-y-4">
                <h1 class="text-4xl text-center">Welcome To Laravel</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="inline-flex gap-16">
                @for ($i = 0; $i < 2; $i++)
                    <div class="inline-flex gap-4">
                        <figure class="max-w-20 border-2 rounded-full h-fit">
                            <img class="flex-[1_0_100%] " src="https://avatar.iran.liara.run/public" alt="" />
                        </figure>
                        <div class="max-w-xl block w-full space-y-4">
                            <p class="text-base font-normal text-left">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos officia vero libero
                                doloremque? Atque voluptate animi, officiis dolor necessitatibus veritatis voluptates
                                hic
                                dolores quae sit, doloremque aliquid aperiam dolorum quam.
                            </p>
                            <h3 class="text-lg font-normal">Author</h3>
                        </div>
                    </div>
                @endfor
            </div>
        </section>

        <section class="w-full bg-black min-h-96 relative">
            <div class="w-96 h-96 bg-yellow-400 absolute -top-16 right-32">

            </div>
        </section>
    </div>
@endsection
