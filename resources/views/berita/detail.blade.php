
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
<div class="max-w-4xl mx-auto px-4 py-10">

    {{-- Judul --}}
    <h1 class="text-3xl font-bold text-gray-800 mb-2">
        {{ $berita->headline }}
    </h1>

    {{-- Meta --}}
    <div class="text-sm text-gray-500 mb-6">
        <span>{{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}</span>
        •
        <span>{{ $berita->kategori }}</span>
    </div>

    {{-- Gambar --}}
    @if($berita->gambar)
        <img 
            src="{{ asset('/storage/'.$berita->gambar) }}"
            alt="{{ $berita->headline }}"
            class="w-full rounded-lg mb-6"
        >
    @endif

    {{-- Konten --}}
    <article class="prose max-w-none">
        {!! $berita->berita !!}
    </article>

    {{-- Hashtag --}}
    @if($berita->hastag)
        <div class="mt-6 text-sm text-blue-600">
            {{ str_replace(',', ' #', $berita->hastag) }}
        </div>
    @endif

</div>
        </div>
@include('footer');
        </body>