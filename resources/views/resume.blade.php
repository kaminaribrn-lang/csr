@extends('layouts.app')

<title>Resume</title>

@section('content')
<div class="w-full max-w-6xl mx-auto">
    <div class="rounded-2xl bg-gradient-to-r from-[#1E40AF] to-blue-600 px-6 py-6 text-white shadow-sm">
        <p class="text-xs font-semibold uppercase tracking-widest text-blue-100">Ringkasan Laporan</p>
        <h1 class="mt-2 text-2xl font-bold">Resume Data CSR</h1>
        <p class="mt-2 text-sm text-blue-100">Gunakan halaman ini untuk melihat ringkasan data dan mengekspor laporan ke format Excel atau PDF.</p>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-3">
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Kegiatan</p>
            <p class="mt-2 text-3xl font-bold text-slate-800">{{ $kegiatanCount ?? 0 }}</p>
            <p class="mt-2 text-sm text-slate-500">Total data kegiatan pada resume.</p>
        </div>
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Perusahaan</p>
            <p class="mt-2 text-3xl font-bold text-slate-800">{{ $perusahaanCount ?? 0 }}</p>
            <p class="mt-2 text-sm text-slate-500">Total perusahaan yang tersimpan pada sistem.</p>
        </div>
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Bidang CSR</p>
            <p class="mt-2 text-3xl font-bold text-slate-800">{{ $bidangCount ?? 0 }}</p>
            <p class="mt-2 text-sm text-slate-500">Kategori bidang CSR aktif.</p>
        </div>
    </div>

    <div class="mt-4 rounded-xl border border-blue-200 bg-blue-50 p-5 shadow-sm">
        <p class="text-xs font-semibold uppercase tracking-wide text-blue-700">Program Prioritas</p>
        <p class="mt-2 text-3xl font-bold text-blue-900">{{ $programPrioritasCount ?? 0 }} Program</p>
        <p class="mt-1 text-sm text-blue-700">Total uraian terdaftar: {{ $uraianProgramCount ?? 0 }} uraian.</p>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-4 lg:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-800">Resume Kegiatan</h2>
            <p class="mt-2 text-sm text-slate-500">Daftar kegiatan lengkap dengan perusahaan, bidang, lokasi, tahun, pagu, dan status tayang.</p>
            <div class="mt-4 flex flex-wrap gap-2">
                <a href="/resume-keg" class="rounded-lg bg-[#1E40AF] px-3 py-2 text-sm font-medium text-white">Lihat Data</a>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-800">Resume Perusahaan</h2>
            <p class="mt-2 text-sm text-slate-500">Daftar perusahaan meliputi direktur, kecamatan, website, dan nomor kontak.</p>
            <div class="mt-4 flex flex-wrap gap-2">
                <a href="/resume-per" class="rounded-lg bg-[#1E40AF] px-3 py-2 text-sm font-medium text-white">Lihat Data</a>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-800">Resume Bidang CSR</h2>
            <p class="mt-2 text-sm text-slate-500">Daftar bidang CSR dan deskripsi untuk kebutuhan dokumentasi dan pelaporan.</p>
            <div class="mt-4 flex flex-wrap gap-2">
                <a href="/resume-bid" class="rounded-lg bg-[#1E40AF] px-3 py-2 text-sm font-medium text-white">Lihat Data</a>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-800">Program Prioritas - Uraian</h2>
            <p class="mt-2 text-sm text-slate-500">Resume berbasis hirarki program prioritas bupati dan uraian, beserta aksi disetujui dan total nominal.</p>
            <div class="mt-4 flex flex-wrap gap-2">
                <a href="/resume-prioritas" class="rounded-lg bg-[#1E40AF] px-3 py-2 text-sm font-medium text-white">Lihat Data</a>
            </div>
        </div>
    </div>
</div>
@endsection