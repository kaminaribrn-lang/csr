<?php
$i = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
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
</head>

<body>
    <div id="app" class="h-full w-full px-10 ">
        {{-- navbar --}}
        @include('navbar');
        <div id="beranda" class="h-10 "></div>
        <div class="h-screen">
            <p class="text-2xl text-[#1E40AF] mb-2 font-medium ">Daftar Perusahaan</p>
            <form action="{{ route('registrasi-perusahaan.store') }}" method="POST" enctype="multipart/form-data"
                class="text-base font-normal w-full ">

                @csrf

                <div class="grid grid-cols-2 gap-x-6 w-full">

                    <div class="mb-2">
                        <label for="nama" class="block mb-2 ">Nama
                            Perusahaan</label>
                        <input id="nama" name="nama"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                            required />
                    </div>

                    <div class="mb-2">
                        <label for="nama" class="block mb-2 ">Nama
                            Direktur</label>
                        <input id="direktur" name="direktur"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                            required />
                    </div>

                    <div class="mb-2">
                        <label for="kecamatan" class="block mb-2  capitalize">kecamatan</label>
                        <input id="kecamatan" name="kecamatan"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                            required />
                    </div>

                    <div class="mb-2">
                        <label for="kelurahan" class="block mb-2  capitalize">kelurahan</label>
                        <input id="kelurahan" name="kelurahan"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                            required />
                    </div>

                    <div class="mb-2">
                        <label for="alamat" class="block mb-2  capitalize">alamat</label>
                        <input id="alamat" name="alamat"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                            required />
                    </div>

                    <div class="mb-2">
                        <label for="kodepos" class="block mb-2  capitalize">kode
                            pos</label>
                        <input id="kodepos" name="kodepos"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                            required />
                    </div>

                    <div class="mb-2">
                        <label for="website" class="block mb-2  capitalize">website</label>
                        <input id="website" name="website"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                            required />
                    </div>

                    <div class="mb-2">
                        <label for="nomorhp" class="block mb-2  capitalize">no
                            hp</label>
                        <input id="nomorhp" name="nomorhp"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                            required />
                    </div>

                    <div class="mb-2">
                        <label for="email" class="block mb-2  capitalize">email</label>
                        <input id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                            required />
                    </div>

                    <div class="mb-2">
                        <label for="password" class="block mb-2  capitalize">password</label>
                        <input id="password" name="password"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                            required />
                    </div>
                    {{-- <div class="mb-2">
                                                        <label for="password"
                                                            class="block mb-2  ">Urutan</label>
                                                        <input type="number" id="urutan" name="urutan"
                                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                                                            required />
                                                    </div> --}}

                </div>
                <button type="submit"
                    class="text-white bg-[#1E40AF] w-full hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xl w-full  px-5 py-2.5 text-center   ">DAFTAR</button>
            </form>

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

</html>
