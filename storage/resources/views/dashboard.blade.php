@extends('layouts.app')

<title>Dashboard</title>

@section('content')

<?php
    $kegiatan = DB::table('kegiatan')->count();
    $bidangcsr = DB::table('bidangcsr')->count();
    $perusahaan = DB::table('perusahaan')->count();
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card grid grid-cols-3 gap-4">

                <a class="flex items-center flex justify-between  px-3 py-3 text-white text-4xl transition-colors duration-300 transform rounded-lg  bg-[#1E40AF] "
                    href="#">


                    <span class="mx-2 text-2xl font-medium">KEGIATAN</span>
                    <span class="mx-2 text-2xl font-medium">{{ $kegiatan }}</span>
                </a>
                <a class="flex items-center flex justify-between  px-3 py-3 text-white text-4xl transition-colors duration-300 transform rounded-lg  bg-[#1E40AF] "
                    href="#">

                    <span class="mx-2 text-2xl font-medium">PERUSAHAAN</span>
                    <span class="mx-2 text-2xl font-medium">{{ $perusahaan }}</span>
                </a>
                <a class="flex items-center flex justify-between  px-3 py-3 text-white text-4xl transition-colors duration-300 transform rounded-lg  bg-[#1E40AF] "
                    href="#">


                    <span class="mx-2 text-2xl font-medium">BIDANG CSR</span>
                    <span class="mx-2 text-2xl font-medium">{{ $bidangcsr }}</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection