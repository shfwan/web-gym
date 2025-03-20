@extends('layouts.main')

@section('content')
    <div class="block w-full ">
        <section
            class="min-h-screen max-h-screen overflow-hidden w-full h-full bg-no-repeat object-center object-scale-down relative flex items-center justify-center">
            <img class="absolute aspect-video object-center flex-[1_0_100%]" src="/img/gym.jpg" alt="">
            <div class="max-w-7xl mx-auto p-6 lg:p-8 relative w-full h-fullflex-col flex items-center justify-center">
                <div class="max-w-3xl h-fit  bg-yellow-400/50 rounded-md z-10 backdrop-blur-sm p-8">
                    <div class="inline-flex gap-8 items-center">
                        <img class="flex-[1_0_100%] max-w-72" src="/icon/gym.png" alt="">
                        <div class="text-white block w-full space-y-4">
                            <h3 class="text-2xl font-bold">Mulai Perjalanan Fitnessmu Hari Ini!</h3>
                            <p class="text-lg">Dengan peralatan modern dan pelatih berpengalaman, kami siap membantu Anda
                                mencapai tujuan
                                kebugaran Anda.</p>
                            <a href="{{ route('register') }}" class="btn rounded-md btn-warning  text-white">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="max-w-7xl mx-auto p-6 lg:p-8 w-full min-h-screen">
            <div class="block w-full space-y-8 place-items-start">
                <h1 class="font-semibold text-4xl text-black">Keunggulan</h1>
                <?php
                        $keunggulan = array(
                            [
                                "title" => "Program Latihan yang Personal",
                                "description" => [
                                    "Tersesuaikan dengan tujuan: Trainer akan merancang program latihan yang spesifik untuk membantu Anda mencapai tujuan, baik itu penurunan berat badan, pembentukan otot, atau peningkatan daya tahan.",
                                    "Sesuai dengan kondisi fisik: Program latihan akan disesuaikan dengan kondisi fisik dan keterbatasan Anda, sehingga risiko cedera bisa diminimalisir."
                                ]
                            ],
                            [
                                "title" => "Teknik yang Benar",
                                "description" => [
                                    "Mencegah cedera: Trainer akan mengajarkan teknik latihan yang benar, sehingga Anda bisa menghindari cedera saat berolahraga.",
                                    "Hasil yang optimal: Dengan teknik yang benar, Anda akan mendapatkan hasil yang lebih maksimal dari setiap sesi latihan."
                                ]
                            ],
                            [
                                "title" => "Motivasi dan Akuntabilitas",
                                "description" => [
                                    "Tetap termotivasi: Seorang trainer akan menjadi motivator Anda, membantu Anda tetap termotivasi untuk mencapai tujuan.",
                                    "Akuntabilitas: Dengan adanya trainer, Anda akan merasa lebih bertanggung jawab untuk mengikuti program latihan yang telah dibuat."
                                ]
                            ],
                            [
                                "title" => "Pengetahuan Mendalam tentang Kebugaran",
                                "description" => [
                                    "Informasi terkini: Trainer memiliki pengetahuan yang luas tentang nutrisi, suplemen, dan tren kebugaran terbaru.",
                                    "Solusi yang tepat: Mereka dapat memberikan solusi yang tepat untuk mengatasi berbagai masalah yang terkait dengan kebugaran."
                                ]
                            ],
                            [
                                "title" => "Hasil yang Lebih Cepat",
                                "description" => [
                                    "Efisiensi waktu: Dengan bimbingan trainer, Anda bisa mendapatkan hasil yang lebih cepat dibandingkan jika berlatih sendiri.",
                                    "Pemantauan kemajuan: Trainer akan memantau perkembangan Anda secara berkala dan melakukan penyesuaian program jika diperlukan."
                                ]
                            ],
                        )
                    ?>
                <div class="grid grid-cols-3 gap-x-4 gap-y-4 place-content-center text-black">
                    @foreach ($keunggulan as $item)
                        <div class="block space-y-2 shadow-md rounded-md max-w-xl p-6 bg-white">
                            <h1 class="text-lg font-semibold">{{$item['title']}}</h1>
                            <ul class="list-disc p-4 block space-y-4">
                                @foreach ($item['description'] as $desc)

                                <li>
                                    <p class="text-base">{{$desc}}</p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="w-full bg-yellow-400  p-16 flex items-center justify-center h-full">
            <div class="container  max-w-4xl mx-auto w-full h-full ">
                <div class="flex  items-center justify-center flex-col gap-4 h-full">
                    <h1 class="font-semibold text-xl text-white">Tekan tombol di bawah untuk melihat lokasi</h1>
                    <a class="btn btn-success btn-md w-fit text-white rounded" target="_blank" href="https://maps.app.goo.gl/RRUzGihhGDAzaxJx7">Lihat Lokasi</a>
                </div>
            </div>
        </section>

    </div>
@endsection
