@extends('layouts.app')

<title>Dashboard</title>

@section('content')

<?php
    $kegiatan = DB::table('kegiatan')->count();
    $bidangcsr = DB::table('bidangcsr')->count();
    $perusahaan = DB::table('perusahaan')->count();
    $aksiMenunggu = DB::table('aksi')->where('status_verifikasi', 'menunggu')->count();
    $aksiDisetujui = 0;
    $aksiDitolak = 0;

    if (auth()->check() && auth()->user()->role === 'perusahaan') {
        $companyId = DB::table('perusahaan')
            ->where('email', auth()->user()->email)
            ->value('id');

        if ($companyId) {
            $aksiDisetujui = DB::table('aksi')
                ->where('idperusahaan', $companyId)
                ->where('status_verifikasi', 'disetujui')
                ->count();

            $aksiDitolak = DB::table('aksi')
                ->where('idperusahaan', $companyId)
                ->where('status_verifikasi', 'ditolak')
                ->count();

            $aksiMenunggu = DB::table('aksi')
                ->where('idperusahaan', $companyId)
                ->where('status_verifikasi', 'menunggu')
                ->count();
        }
    }
?>

<div class="w-full max-w-6xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-slate-800">Dashboard e-CSR Mahulu</h1>
        <p class="text-sm text-slate-600 mt-1">Ringkasan data utama berdasarkan konten yang sudah tersedia di sistem.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <a href="/kegiatan"
            class="rounded-xl bg-[#1E40AF] text-white p-5 shadow-sm hover:shadow-md transition-all duration-200">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-blue-100">Total Kegiatan</p>
                    <p class="text-3xl font-bold mt-2">{{ $kegiatan }}</p>
                </div>
                <span class="text-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h12M3.75 3h16.5M3.75 3v2.25m16.5-2.25v14.25A2.25 2.25 0 0 1 18 19.5H9.75M20.25 3v2.25" />
                    </svg>
                </span>
            </div>
            <p class="text-sm text-blue-100 mt-4">Kelola data kegiatan CSR</p>
        </a>

        <a href="/perusahaan"
            class="rounded-xl bg-white border border-slate-200 p-5 shadow-sm hover:shadow-md transition-all duration-200 {{ \Auth::user()->role == 'superadmin' ? '' : 'hidden' }}">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Total Perusahaan</p>
                    <p class="text-3xl font-bold mt-2 text-slate-800">{{ $perusahaan }}</p>
                </div>
                <span class="text-slate-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3.75h6a.75.75 0 0 1 .75.75v16.5h-7.5V4.5a.75.75 0 0 1 .75-.75Zm9 4.5h6a.75.75 0 0 1 .75.75V21h-7.5V9a.75.75 0 0 1 .75-.75Z" />
                    </svg>
                </span>
            </div>
            <p class="text-sm text-slate-500 mt-4">Daftar perusahaan terdaftar</p>
        </a>

        <a href="/bidang-csr"
            class="rounded-xl bg-white border border-slate-200 p-5 shadow-sm hover:shadow-md transition-all duration-200 {{ \Auth::user()->role == 'superadmin' ? '' : 'hidden' }}">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Total Bidang CSR</p>
                    <p class="text-3xl font-bold mt-2 text-slate-800">{{ $bidangcsr }}</p>
                </div>
                <span class="text-slate-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h7.5v7.5h-7.5v-7.5Zm0 10.5h7.5v3h-7.5v-3Zm9-6h7.5v9h-7.5v-9Zm0-4.5h7.5v3h-7.5v-3Z" />
                    </svg>
                </span>
            </div>
            <p class="text-sm text-slate-500 mt-4">Kategori bidang program CSR</p>
        </a>
    </div>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="rounded-xl border border-amber-200 bg-amber-50 p-5">
            <p class="text-xs font-semibold uppercase tracking-wide text-amber-700">
                {{ auth()->user()->role === 'superadmin' ? 'Aksi Menunggu Verifikasi' : 'Aksi Menunggu Persetujuan' }}
            </p>
            <p class="mt-2 text-3xl font-bold text-amber-800">{{ $aksiMenunggu }}</p>
            <p class="mt-2 text-sm text-amber-700">
                {{ auth()->user()->role === 'superadmin' ? 'Perlu ditinjau admin sebelum tampil di publik.' : 'Menunggu verifikasi admin agar tayang di publik.' }}
            </p>
        </div>

        @if(auth()->user()->role === 'perusahaan')
            <div class="rounded-xl border border-emerald-200 bg-emerald-50 p-5">
                <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700">Aksi Disetujui</p>
                <p class="mt-2 text-3xl font-bold text-emerald-800">{{ $aksiDisetujui }}</p>
                <p class="mt-2 text-sm text-emerald-700">Aksi sudah lolos verifikasi admin.</p>
            </div>

            <div class="rounded-xl border border-rose-200 bg-rose-50 p-5">
                <p class="text-xs font-semibold uppercase tracking-wide text-rose-700">Aksi Ditolak</p>
                <p class="mt-2 text-3xl font-bold text-rose-800">{{ $aksiDitolak }}</p>
                <p class="mt-2 text-sm text-rose-700">Perlu perbaikan lalu kirim ulang aksi.</p>
            </div>
        @else
            <div class="rounded-xl border border-slate-200 bg-slate-50 p-5 md:col-span-2">
                <p class="text-sm text-slate-700">
                    Tinjau detail aksi dari menu Kegiatan. Setiap input aksi dari perusahaan harus diverifikasi sebelum datanya tampil pada website publik.
                </p>
            </div>
        @endif
    </div>

    <div class="mt-6 rounded-xl border border-slate-200 bg-white p-5 hidden">
        <h2 class="text-base font-semibold text-slate-800 mb-3">Akses Cepat</h2>
        <div class="flex flex-wrap gap-2">
            <a href="/kegiatan" class="px-3 py-2 rounded-lg bg-[#1E40AF] text-white text-sm font-medium hover:bg-blue-800 transition-colors">Kegiatan</a>
            <a href="/resume" class="px-3 py-2 rounded-lg bg-slate-100 text-slate-700 text-sm font-medium hover:bg-slate-200 transition-colors">Resume</a>
            <a href="/program-unggulan-bupati" class="px-3 py-2 rounded-lg bg-slate-100 text-slate-700 text-sm font-medium hover:bg-slate-200 transition-colors {{ \Auth::user()->role == 'superadmin' ? '' : 'hidden' }}">Program Unggulan</a>
            <a href="/pengaturan" class="px-3 py-2 rounded-lg bg-slate-100 text-slate-700 text-sm font-medium hover:bg-slate-200 transition-colors">Pengaturan</a>
        </div>
    </div>
</div>
@endsection