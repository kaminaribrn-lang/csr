<?php
$i = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


$prsBidang_1 = DB::table('kegiatan')
    ->where('idbidang', '=', '1')
    ->whereYear('created_at', '=', $_GET['tahun'])
    ->get();
// dd($prsBidang_1->count());
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

$datax = DB::table('kegiatan')->join('perusahaan', 'kegiatan.idperusahaan', '=', 'perusahaan.id')
    ->join('bidangcsr', 'kegiatan.idbidang', '=', 'bidangcsr.id')
    ->select('kegiatan.*', 'perusahaan.nama as namaPerusahaan', 'bidangcsr.nama as namaBidang')
    ->get();


$nominalpagu = DB::table('kegiatan')->sum('realisasi_uang');

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Clamp text to 2 lines with ellipsis */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div id="app" class="h-full w-full px-30">
        {{-- navbar --}}
        @include('navbar')
        <div id="beranda" class="h-16 "></div>

        {{-- slider --}}
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <?php
$datas = DB::table('slider')->get();
$ucapan = DB::table('profil')->where('url', 'ucapan')->get();
$ucapan = $ucapan[0]->keterangan; 
        ?>

        <div class=" w-full row lg:mt-0 flex mx-auto items-center gap-0" style="margin-top:40px">
            <div class="col-12 col-lg-3 z-20 rounded-lg items-start flex justify-between items-center flex-col mr-3">
                <img class="w-full rounded-xl bg-cover object-cover cursor-pointer border border-2 border-blue-800"
                    style="height:416px; width:400px;" src="/assets/{{ $ucapan }}">
            </div>
            <div id="gallery" class="col-12 col-lg-9 w-full lg:mt-0" data-carousel="slide"
                data-carousel-interval="7000">
                <!-- Carousel wrapper -->
                <div class="z-20 relative overflow-hidden border border-2 border-blue-800 rounded-xl"
                    style="height:416px; ">
                    <!-- Item  -->

                    @forelse ($datas as $data)

                        <a href="#" target="_blank">
                            <div class="static hidden duration-700 ease-in-out" data-carousel-item>
                                <img class="w-full h-full object-cover cursor-pointer" src="/assets/{{ $data->slider }}" />
                                <div>
                                    <?php    if ($data->deskripsi != null) { ?>
                                    <div
                                        class=" px-4 py-5 absolute bottom-0 left-0  bg-[#009EE4] w-full  flex flex-col items-center  opacity-80">
                                        <h1 class="text-white  font-semibold text-2xl justify-left flex">
                                            {{ $data->deskripsi }}
                                        </h1>
                                    </div>
                                    <?php    } ?>
                                </div>
                            </div>
                        </a>
                    @empty
                    @endforelse

                    {{-- @forelse ($datas as $slideBerita)
                    <a href="/berita/{{ $data->slug }}" target="_blank">
                        <div class="static hidden duration-700 ease-in-out" data-carousel-item>
                            <img class="w-full h-full object-cover cursor-pointer" src="assets/{{ $data->gambar }}" />
                            <div>
                                <div
                                    class=" px-4 py-5 absolute bottom-0 left-0  bg-[#009EE4] w-full  flex flex-col items-center  opacity-80">
                                    <h1 class="text-white  font-semibold text-2xl justify-left flex">
                                        {{ $data->headline }} </h1>
                                </div>
                            </div>
                        </div>
                    </a>
                    @empty
                    @endforelse --}}

                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-20 start-105 z-20 flex items-center justify-center px-4 cursor-pointer group focus:outline-none"
                    style="height:440px;" data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-gray-700 dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-20 end-30 z-20 flex items-center justify-center px-4 cursor-pointer group focus:outline-none"
                    style="height:440px;" data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-gray-700 dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>

        {{-- bergabung --}}
        <div class="hidden p-5 mt-3 mb-10 flex rounded-3xl bg-[#1E40AF] justify-between items-center">
            <p class="text-3xl text-white  font-semibold drop-shadow">Ayo Bergabung di Program CSR Kab.
                Mahakam
                Ulu</p>
            <a href="/registrasi-perusahaan"
                class="py-3 px-5 font-black tracking-wide items-center bg-white text-sm capitalize transition-colors duration-300 transform text-[#1E40AF] rounded-xl  hover:bg-gray-900 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80 flex gap-3">
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
                    <p class="text-3xl text-[#1E40AF]  font-medium ">Tentang CSR</p>
                    <p class="text-gray-800 text-xl text-justify  mb-3 leading-loose">
                        {{ $tentang->deskripsi }}
                    </p>

                </div>
                <img src="/assets/tentang.png" class="w-1/2 rounded-3xl">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-5">
            <div class="mt-16 w-full gap-10">
                <p class="text-3xl text-[#1E40AF] mb-5 font-medium ">Dasar Hukum</p>
                <div class="row">
                    <div class="table-responsive">

                        <table id="tabelshukum" name="tabelshukum"
                            class="display table table-bordered table-striped table-hover" width="100%" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bidang</th>
                                    <th>Lihat</th>
                                </tr>
                            </thead>
                            <tbody name="getDataTabel" id="getDataTabel">
                                <?php $no = 0; ?>
                                @foreach ($dasarhukum as $item)
                                    <?php    $no += 1; ?>
                                    <tr>
                                        <td>
                                            <div class="text-center">
                                                {{$no}}
                                            </div>
                                        </td>
                                        <td>{{$item->nama}}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="mt-16 w-full gap-10">
                <p class="text-3xl text-[#1E40AF] mb-5 font-medium ">Bidang CSR</p>
                <div class="row">
                    <div class="table-responsive">

                        <table id="tabelsbidang" name="tabelsbidang"
                            class="display table table-bordered table-striped table-hover" width="100%" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bidang</th>
                                </tr>
                            </thead>
                            <tbody name="getDataTabel" id="getDataTabel">
                                <?php $no = 0; ?>
                                @foreach ($bidangCsr as $item)
                                    <?php    $no += 1; ?>
                                    <tr>
                                        <td>
                                            <div class="text-center">
                                                {{$no}}
                                            </div>
                                        </td>
                                        <td>{{$item->nama}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="hidden my-16 w-full gap-10">
                <p class="text-3xl text-[#1E40AF] mb-8 font-medium ">Bidang CSR</p>
                <div class="grid grid-cols-5 gap-3">
                    @forelse($bidangCsr as $data)
                        <div class="h-full  grid grid-rows-2">
                            <div class="p-5 flex  rounded-3xl bg-[#1E40AF] w-full justify-center items-center  ">
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
        </div>

        @include('berita')

        <div id="data" class="h-24"></div>
        
        @include('datacsr')

        <script>
            // ApexCharts options and config
            $(document).ready(function () {
                $('#tabelshukum').DataTable();
                $('#tabelsbidang').DataTable();
                $('#tabelsdata').DataTable();
            });

            $(function () {
                //AJAX get indikator
                $('#klik').on('click', function () {

                    $('#tabelsdata').DataTable();

                    alert("klik");
                });

                $('#dataTahun').on('change', function () {

                    $('#tabelsdata').DataTable().destroy();
                    $("#getDataTabel").empty();

                    opd = $('select[name="opd"]').val();

                    let dataTahun =
                        $('select[name="dataTahun"]').val()
                    $.ajax({
                        type: "GET",
                        url: "{{ url('/get-data-tahun') }}/" + dataTahun + "/" + opd,
                        dataType: 'JSON',
                        success: function (res) {
                            res.forEach(function (value, key) {
                                // console.log(value.judul);
                                var no = key + 1;


                                $("#getDataTabel").append('<tr> <td> <div class="text-center">' + no + '</div> </td> <td>' + value.judul + '</td> <td>' + value.nama + '</td> <td>' + value.instansi + '</td> <td>' + value.tahun + '</td> </tr>');

                            });

                            $('#tabelsdata').DataTable();
                            // alert("done");


                            // $('#tabelsdata').DataTable().fnClearTable();
                            // $('#tabelsdata').DataTable().draw();
                            // rows.add(dataSet).draw();
                            // alert("proses");
                        },
                        error: function () {
                            alert('error!');
                        }
                    });
                });

                $('#opd').on('change', function () {

                    $('#tabelsdata').DataTable().destroy();
                    $("#getDataTabel").empty();

                    opd = $('select[name="opd"]').val();

                    let dataTahun =
                        $('select[name="dataTahun"]').val()
                    $.ajax({
                        type: "GET",
                        url: "{{ url('/get-data-tahun') }}/" + dataTahun + "/" + opd,
                        dataType: 'JSON',
                        success: function (res) {
                            res.forEach(function (value, key) {
                                // console.log(value.judul);
                                var no = key + 1;


                                $("#getDataTabel").append('<tr> <td> <div class="text-center">' + no + '</div> </td> <td>' + value.judul + '</td> <td>' + value.nama + '</td> <td>' + value.instansi + '</td> <td>' + value.tahun + '</td> </tr>');

                            });

                            $('#tabelsdata').DataTable();
                            // alert("done");


                            // $('#tabelsdata').DataTable().fnClearTable();
                            // $('#tabelsdata').DataTable().draw();
                            // rows.add(dataSet).draw();
                            // alert("proses");
                        },
                        error: function () {
                            alert('error!');
                        }
                    });
                });


            });

        </script>

        <div id="data" class="h-24"></div>
        <div class="mb-16 w-full gap-10" id=>
            <div class="text-3xl text-[#1E40AF]  font-medium  flex justify-between">
                <p class="">INFOGRAFIS</p>
                <select name="tahun" id="tahun" class="border border-white rounded-xl px-4">
                    <option selected value="semua">Semua</option>
                    <option value="2025">2025</option>
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                </select>
            </div>
            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-2 p-5 my-10 flex rounded-3xl bg-[#1E40AF] justify-between items-center">
                    <p class="text-2xl text-white drop-shadow">Total<br>Realisasi CSR</p>
                    <p class="text-3xl text-white drop-shadow">Rp. {{ number_format($nominalpagu, 2) }}</p>
                </div>
                <div class="col-span-1 p-5 my-10 flex rounded-3xl bg-[#1E40AF] justify-between items-center">
                    <p class="text-2xl text-white drop-shadow">Total<br>Kegiatan</p>
                    <p class="text-3xl text-white drop-shadow">{{ $totalkegiatan }}</p>
                </div>
                <div class="col-span-1 p-5 my-10 flex rounded-3xl bg-[#1E40AF] justify-between items-center">
                    <p class="text-2xl text-white drop-shadow">Total<br>Perusahaan</p>
                    <p class="text-3xl text-white drop-shadow">{{ $totalperusahaan }}</p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div class="h-50% p-6 border border-[#1E40AF] rounded-3xl flex flex-col gap-4">
                    <label for="">Presentasi Realisasi Kegiatan CSR</label>
                    <div id="presentaseKegiatan" class=""></div>
                </div>
                <div class="h-50% p-6 border border-[#1E40AF] rounded-3xl flex flex-col gap-4">
                    <label for="">Presentasi Pagu Kegiatan CSR</label>
                    <div id="paguKegiatan" class=""></div>
                </div>
                <div class="h-50% p-6 col-span-2 border border-[#1E40AF] rounded-3xl flex flex-col gap-4 ">
                    <label for="">Realisasi Kegiatan CSR</label>
                    <div id="berRealisasiPagu" class=""></div>
                </div>
            </div>
        </div>
        <div class="flex grid grid-cols-4">
            <div class="col-span-3">
                <div class="text-3xl text-[#1E40AF] mx-auto font-medium items-center flex justify-center">
                    <p class="">MASUKAN DAN SARAN</p>
                </div>

                <div id="default-styled-tab-content">
                    <div class="p-4 rounded-lg bg-white dark:bg-gray-800" id="styled-profile" role="tabpanel"
                        aria-labelledby="profile-tab">
                        <form class="p-3 space-y-6 max-w-7xl w-1/2 mx-auto font-normal" action="laporan-pengaduan"
                            method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <input type="text" name="nama" placeholder="nama"
                                    class="bg-[#eaf8ff] font-thin rounded-xl p-5 placeholder:text-gray-600 text-gray-700 text-sm focus:outline-none" />
                                <input type="text" name="telp" placeholder="no hp"
                                    class="bg-[#eaf8ff] rounded-xl p-5 placeholder:text-gray-600 text-gray-700 text-sm focus:outline-none" />
                            </div>

                            <textarea name="masukan" placeholder="masukan dan saran" rows="6"
                                class="bg-[#eaf8ff] rounded-xl p-5 placeholder:text-gray-600 text-gray-700 text-sm w-full resize-y focus:outline-none"></textarea>

                            <!-- <label for="file-upload"
                            class="block w-full cursor-pointer rounded-2xl border-2 border-dashed border-cyan-600 p-5 text-center text-cyan-600 font-semibold hover:bg-cyan-50 transition">
                            Pilih File
                            <input id="file-upload" type="file" class="hidden" />
                        </label> -->

                            <button type="submit"
                                class="bg-[#1E40AF] to-95% w-full text-white text-3xl py-4 rounded-xl [text-shadow:_2px_2px_10px_#000000]">KIRIM</button>
                        </form>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-dashboard" role="tabpanel"
                        aria-labelledby="dashboard-tab">
                        <form class="p-6 space-y-6 max-w-7xl w-1/2 mx-auto font-normal" action="laporan-pengaduan"
                            method="POST" enctype="multipart/form-data">

                            @csrf

                            <input type="text" name="kode"
                                class="bg-[#eaf8ff] rounded-xl p-6 placeholder:text-gray-600 text-gray-700 text-sm w-full focus:outline-none" />

                            <button type="submit"
                                class="bg-gradient-to-br from-[#52C4F8] from-60%  to-[#CECC6D] to-95% w-full text-white text-3xl py-4 rounded-xl [text-shadow:_2px_2px_10px_#000000]">KIRIM</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <div class="text-3xl text-[#1E40AF] mx-auto font-medium items-center flex justify-center">
                    <p class="">SOSIAL MEDIA</p>
                </div>
                <div class="flex flex-col justify-around p-6 mt-10 text-white font-bold"
                    style=" background-color: #1E40AF; border-radius: 15px; height: 360px;">
                    <!--Start Single Skills One-->
                    <a href="https://www.youtube.com/@bappelitbangdamahulu3002" target="blank" class="col-12 col-lg-12 "
                        data-wow-delay="0.1s">
                        <div class="" style="border-radius : 10px;">
                            <div class="">
                                <div class="flex" style="margin : -10px; ">
                                    <div class="flex items-center justify-center"
                                        style="padding : 5px; background:white; border-radius:10px; width:100px;  height:81px">
                                        <img src="assets/logo/logo-youtube.png"
                                            style="width:60px; border-radius : 10px;">
                                    </div>
                                    <div class="pl-3 flex items-center justify-start">
                                        <h2>CSR<br>MAHULU</h2>
                                        {{-- <p>Senior Web Developer</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="https://www.instagram.com/csrmahulu/" target="_blank" class="col-12 col-lg-12 "
                        data-wow-delay="0.1s">
                        <div class="" style="border-radius : 10px;">
                            <div class="">
                                <div class="flex" style="margin : -10px; ">
                                    <div class="flex items-center justify-center"
                                        style=" padding : 5px; background:white; border-radius:10px; width:100px;  height:81px;">
                                        <img src="assets/logo/logo-ig.png" style="width:60px; border-radius : 10px;">
                                    </div>
                                    <div class="pl-3 flex items-center justify-start">
                                        <h2>CSR<br>MAHULU</h2>
                                        {{-- <p>Senior Web Developer</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="https://wa.me/6285250562443" target="_blank" class="col-12 col-lg-12 "
                        data-wow-delay="0.1s">
                        <div class="" style="border-radius : 10px;">
                            <div class="">
                                <div class="flex" style="margin : -10px; ">
                                    <div class="flex items-center justify-center"
                                        style="padding : 5px; background:white; border-radius:10px; width:100px;  height:81px;">
                                        <img src="assets/logo/logo-wa.png" style=" width:70px; border-radius : 10px;">
                                    </div>
                                    <div class="pl-3 flex items-center justify-start">
                                        <h4>Konsultasi /<br>Koordinasi</h4>
                                        {{-- <p>Senior Web Developer</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!--End Single Skills One-->
                </div>
            </div>
        </div>


    </div>
    @include('footer')
</body>

@include('javascript')

</html>