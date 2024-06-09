<?php
$i = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$prsBidang_1 = DB::table('kegiatan')
    ->where('idbidang', '=', '1')
    ->whereYear('created_at', '=', $_GET['tahun'])
    ->get();
$prsBidang_2 = DB::table('kegiatan')
    ->where('idbidang', '=', '2')
    ->whereYear('created_at', '=', $_GET['tahun'])
    ->get();
$prsBidang_3 = DB::table('kegiatan')
    ->where('idbidang', '=', '3')
    ->whereYear('created_at', '=', $_GET['tahun'])
    ->get();
$prsBidang_4 = DB::table('kegiatan')
    ->where('idbidang', '=', '4')
    ->whereYear('created_at', '=', $_GET['tahun'])
    ->get();
$prsBidang_5 = DB::table('kegiatan')
    ->where('idbidang', '=', '5')
    ->whereYear('created_at', '=', $_GET['tahun'])
    ->get();
$prsBidang_6 = DB::table('kegiatan')
    ->where('idbidang', '=', '6')
    ->whereYear('created_at', '=', $_GET['tahun'])
    ->get();
$prsBidang_7 = DB::table('kegiatan')
    ->where('idbidang', '=', '7')
    ->whereYear('created_at', '=', $_GET['tahun'])
    ->get();
$prsBidang_8 = DB::table('kegiatan')
    ->where('idbidang', '=', '8')
    ->whereYear('created_at', '=', $_GET['tahun'])
    ->get();

// dd($prsBidang_1->sum('nominalpagu'));

$nmBidang_1 = DB::table('bidangcsr')->where('id', '=', '1')->get();
$nmBidang_2 = DB::table('bidangcsr')->where('id', '=', '2')->get();
$nmBidang_3 = DB::table('bidangcsr')->where('id', '=', '3')->get();
$nmBidang_4 = DB::table('bidangcsr')->where('id', '=', '4')->get();
$nmBidang_5 = DB::table('bidangcsr')->where('id', '=', '5')->get();
$nmBidang_6 = DB::table('bidangcsr')->where('id', '=', '6')->get();
$nmBidang_7 = DB::table('bidangcsr')->where('id', '=', '7')->get();
$nmBidang_8 = DB::table('bidangcsr')->where('id', '=', '8')->get();

?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/logo_mahulu.png">

    <title>E-CSR MAHULU</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="///fonts.bunny.net">
    <link href="/https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body>
    <div id="app" class="h-full w-full px-10 ">
        {{-- navbar --}}
        @include('navbar')
        <div id="beranda" class="h-16 "></div>

        {{-- slider --}}
        <div id="" class="relative w-full z-40 shadow drop-shadow-[0_1px_1px_rgba(1,1,1,0.3)] rounded-3xl"
            data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative overflow-hidden rounded-3xl h-[418px]">
                <!-- Item 1 -->
                @foreach ($slider as $item)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/slider/{{ $item->slider }}"
                            class="absolute bg-cover block w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="">
                    </div>
                @endforeach
                <!-- Item 2 -->
                {{-- <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                    <img src="/slider/slider_ajakan_bergabung.jpg"
                        class="absolute bg-cover block w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div> --}}
                <!-- Item 3 -->
                {{-- <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg"
                        class="absolute bg-cover block w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div> --}}
                <!-- Item 4 -->
                {{-- <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg"
                        class="absolute bg-cover block w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div> --}}
                <!-- Item 5 -->
                {{-- <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg"
                        class="absolute bg-cover block w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div> --}}
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

        {{-- bergabung --}}
        <div class="p-5 mt-3 mb-10 flex rounded-3xl bg-[#00ae73] justify-between items-center">
            <p class="text-3xl text-white  font-semibold drop-shadow">Ayo Bergabung di Program CSR Kab.
                Mahakam
                Ulu</p>
            <a href="/registrasi-perusahaan"
                class="py-3 px-5 font-black tracking-wide items-center bg-white text-sm capitalize transition-colors duration-300 transform text-[#00ae73] rounded-xl  hover:bg-gray-900 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80 flex gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>

                DAFTAR
            </a>
        </div>

        <div id="tentang" class="py-24 flex items-center">
            <div class="flex h-fit w-full gap-10">
                <div class="w-2/3  flex gap-10 flex-col">
                    <p class="text-3xl text-[#00ae73]  font-medium ">Tentang CSR</p>
                    <p class="text-gray-800 text-xl text-justify  mb-3 leading-loose">
                        {{ $tentang->deskripsi }}</p>

                </div>
                <img src="/assets/rellation.jpg" class="w-1/2 rounded-3xl">
            </div>
        </div>

        <div class="mt-16 w-full gap-10">
            <p class="text-3xl text-[#00ae73] mb-5 font-medium ">Dasar Hukum</p>
            <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                <tbody
                    class="cursor-pointer grid grid-cols-2 bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                    @foreach ($dasarhukum as $data)
                        <tr
                            class="px-4 py-8 text-sm font-base flex items-start transition duration-300 hover:scale-[103%] hover:text-[#007048]">
                            <td class=""><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-4 h-4 mt-0.5 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                </svg>
                            </td>
                            <td>
                                <a href="#" class="flex items-center gap-4">
                                    {{ $data->nama }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>

        <div class="my-16 w-full gap-10">
            <p class="text-3xl text-[#00ae73] mb-8 font-medium ">Bidang CSR</p>
            <div class="grid grid-cols-5 gap-3">
                @forelse($bidangCsr as $data)
                    <div class="h-full  grid grid-rows-2">
                        <div class="p-5 flex  rounded-3xl bg-[#00ae73] w-full justify-center items-center  ">
                            <p class="text-xl uppercase text-white text-center font-semibold drop-shadow ">
                                {{ $data->nama }}
                            </p>
                        </div>
                        <div class="">
                            <p class="text-gray-800 px-2 mt-1 text-justify text-xs">
                                {{ $data->deskripsi }}
                            </p>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
        <div id="data" class="h-24"></div>
        <div class="mb-16 w-full gap-10" id=>
            <div class="text-3xl text-[#00ae73]  font-medium  flex justify-between">
                <p class="">Statistik</p>
                <select name="tahun" id="tahun" class="border border-white rounded-xl px-4">
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option selected value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                </select>
            </div>
            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-2 p-5 my-10 flex rounded-3xl bg-[#00ae73] justify-between items-center">
                    <p class="text-2xl text-white drop-shadow">Total<br>Realisasi CSR</p>
                    <p class="text-3xl text-white drop-shadow">Rp. {{ number_format($nominalpagu, 2) }}</p>
                </div>
                <div class="col-span-1 p-5 my-10 flex rounded-3xl bg-[#00ae73] justify-between items-center">
                    <p class="text-2xl text-white drop-shadow">Total<br>Kegiatan</p>
                    <p class="text-3xl text-white drop-shadow">{{ $totalkegiatan }}</p>
                </div>
                <div class="col-span-1 p-5 my-10 flex rounded-3xl bg-[#00ae73] justify-between items-center">
                    <p class="text-2xl text-white drop-shadow">Total<br>Perusahaan</p>
                    <p class="text-3xl text-white drop-shadow">{{ $totalperusahaan }}</p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div class="h-50% p-6 border border-[#00ae73] rounded-3xl flex flex-col gap-4">
                    <label for="">Presentasi Realisasi Kegiatan CSR</label>
                    <div id="presentaseKegiatan" class=""></div>
                </div>
                <div class="h-50% p-6 border border-[#00ae73] rounded-3xl flex flex-col gap-4">
                    <label for="">Presentasi Pagu Kegiatan CSR</label>
                    <div id="paguKegiatan" class=""></div>
                </div>
                <div class="h-50% p-6 col-span-2 border border-[#00ae73] rounded-3xl flex flex-col gap-4 ">
                    <label for="">Realisasi Kegiatan CSR</label>
                    <div id="berRealisasiPagu" class=""></div>
                </div>
            </div>
        </div>
    </div>
    <div id="" class="px-10  bg-[#00c17d] w-full   z-30 py-4">
        <div class="flex flex-col justify-center text-sm font-medium text-gray-800">
            <label for="" class=" text-center">Badan Perencanaan
                Pembangunan Daerah Kabupaten Mahakam Ulu
            </label>
            <div for="" class=" text-center flex items-center justify-center">
                © 2020 - 2024 Created by AK Kreatif
            </div>
        </div>
    </div>
</body>

<script>
    // ApexCharts options and config
    window.addEventListener("load", function() {
        const getPresentaseKegiatan = () => {
            return {
                series: [
                    {{ $prsBidang_1->count() }}, {{ $prsBidang_2->count() }},
                    {{ $prsBidang_3->count() }}, {{ $prsBidang_4->count() }},
                    {{ $prsBidang_5->count() }}, {{ $prsBidang_6->count() }},
                    {{ $prsBidang_7->count() }}, {{ $prsBidang_8->count() }}
                ],
                colors: ["#1e6653", "#16BDCA", "#e26666", "#383838"],
                chart: {
                    height: "auto",
                    width: "100%",
                    type: "pie",
                },
                stroke: {
                    colors: ["white"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        labels: {
                            show: true,
                        },
                        size: "100%",
                        dataLabels: {
                            offset: -20
                        }
                    },
                },
                labels: [
                    '{{ $nmBidang_1[0]->nama }}', '{{ $nmBidang_2[0]->nama }}',
                    '{{ $nmBidang_3[0]->nama }}', '{{ $nmBidang_4[0]->nama }}',
                    '{{ $nmBidang_5[0]->nama }}', '{{ $nmBidang_6[0]->nama }}',
                    '{{ $nmBidang_7[0]->nama }}', '{{ $nmBidang_8[0]->nama }}',
                ],
                dataLabels: {
                    enabled: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                    },
                    formatter: function(value) {
                        return value.toFixed(2) + ' %'
                    }
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                    fontSize: "10%"
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function(value) {
                            return value
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }
        if (document.getElementById("presentaseKegiatan") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("presentaseKegiatan"),
                getPresentaseKegiatan());
            chart.render();
        }

        const getPaguKegiatan = () => {
            return {
                series: [
                    {{ $prsBidang_1->sum('nominalpagu') }}, {{ $prsBidang_2->sum('nominalpagu') }},
                    {{ $prsBidang_3->sum('nominalpagu') }}, {{ $prsBidang_4->sum('nominalpagu') }},
                    {{ $prsBidang_5->sum('nominalpagu') }}, {{ $prsBidang_6->sum('nominalpagu') }},
                    {{ $prsBidang_7->sum('nominalpagu') }}, {{ $prsBidang_8->sum('nominalpagu') }}
                ],
                colors: ["#1e6653", "#16BDCA", "#e26666", "#383838"],
                chart: {
                    height: "auto",
                    width: "100%",
                    type: "pie",
                },
                stroke: {
                    colors: ["white"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        labels: {
                            show: true,
                        },
                        size: "100%",
                        dataLabels: {
                            offset: -20
                        }
                    },
                },
                labels: [
                    '{{ $nmBidang_1[0]->nama }}', '{{ $nmBidang_2[0]->nama }}',
                    '{{ $nmBidang_3[0]->nama }}', '{{ $nmBidang_4[0]->nama }}',
                    '{{ $nmBidang_5[0]->nama }}', '{{ $nmBidang_6[0]->nama }}',
                    '{{ $nmBidang_7[0]->nama }}', '{{ $nmBidang_8[0]->nama }}',
                ],
                dataLabels: {
                    enabled: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                    },
                    formatter: function(value) {
                        return value.toFixed(2) + ' %'
                    }
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                    fontSize: "10%"
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function(value) {
                            return value
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }
        if (document.getElementById("paguKegiatan") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("paguKegiatan"),
                getPaguKegiatan());
            chart.render();
        }

        const options = {
            colors: ["#1A56DB", "#FDBA8C"],
            series: [{
                name: "Organic",
                color: "#1A56DB",
                data: [{
                        x: "{{ $nmBidang_1[0]->nama }}",
                        y: "{{ $prsBidang_1->sum('nominalpagu') }}",
                    },
                    {
                        x: "{{ $nmBidang_2[0]->nama }}",
                        y: "{{ $prsBidang_2->sum('nominalpagu') }}",
                    },
                    {
                        x: "{{ $nmBidang_3[0]->nama }}",
                        y: "{{ $prsBidang_3->sum('nominalpagu') }}",
                    },
                    {
                        x: "{{ $nmBidang_4[0]->nama }}",
                        y: "{{ $prsBidang_4->sum('nominalpagu') }}",
                    },
                    {
                        x: "{{ $nmBidang_5[0]->nama }}",
                        y: "{{ $prsBidang_5->sum('nominalpagu') }}",
                    },
                    {
                        x: "{{ $nmBidang_6[0]->nama }}",
                        y: "{{ $prsBidang_6->sum('nominalpagu') }}",
                    },
                    {
                        x: "{{ $nmBidang_7[0]->nama }}",
                        y: "{{ $prsBidang_7->sum('nominalpagu') }}",
                    },
                    {
                        x: "{{ $nmBidang_8[0]->nama }}",
                        y: "{{ $prsBidang_8->sum('nominalpagu') }}",
                    },
                ],
            }, ],
            chart: {
                type: "bar",
                height: "320px",
                fontFamily: "Inter, sans-serif",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "70%",
                    borderRadiusApplication: "end",
                    borderRadius: 8,
                },
            },
            tooltip: {
                shared: true,
                intersect: false,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            states: {
                hover: {
                    filter: {
                        type: "darken",
                        value: 1,
                    },
                },
            },
            stroke: {
                show: true,
                width: 0,
                colors: ["transparent"],
            },
            grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: -14
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            xaxis: {
                floating: false,
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
            },
            fill: {
                opacity: 1,
            },
        }

        if (document.getElementById("berRealisasiPagu") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("berRealisasiPagu"), options);
            chart.render();
        }


    });
</script>

</html>
