@extends('layouts.app')

<title>Verifikasi Laporan</title>

@section('content')
<div class="w-full max-w-7xl mx-auto">
    <div class="mb-6 flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-slate-800">Verifikasi Laporan Perusahaan</h1>
            <p class="text-sm text-slate-600 mt-1">Admin dapat menyetujui atau menolak laporan aksi sebelum tampil di publik.</p>
        </div>
        <div class="grid grid-cols-3 gap-2 text-xs md:text-sm">
            <div class="rounded-lg border border-amber-200 bg-amber-50 px-3 py-2 text-amber-800">
                <div class="font-semibold">Menunggu</div>
                <div class="text-lg font-bold">{{ $counts['menunggu'] }}</div>
            </div>
            <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-3 py-2 text-emerald-800">
                <div class="font-semibold">Disetujui</div>
                <div class="text-lg font-bold">{{ $counts['disetujui'] }}</div>
            </div>
            <div class="rounded-lg border border-rose-200 bg-rose-50 px-3 py-2 text-rose-800">
                <div class="font-semibold">Ditolak</div>
                <div class="text-lg font-bold">{{ $counts['ditolak'] }}</div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->has('catatan_verifikasi'))
        <div class="mb-4 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800">
            {{ $errors->first('catatan_verifikasi') }}
        </div>
    @endif

    <div class="mb-4 rounded-xl border border-slate-200 bg-white p-4">
        <form method="GET" action="{{ route('aksi.verifikasi') }}" class="grid grid-cols-1 md:grid-cols-6 gap-3">
            <div class="md:col-span-2">
                <label class="mb-1 block text-sm font-medium text-slate-700">Cari laporan</label>
                <input
                    type="text"
                    name="q"
                    value="{{ $keyword }}"
                    placeholder="Nama aksi, kegiatan, perusahaan, program..."
                    class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none"
                >
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Perusahaan</label>
                <select
                    name="perusahaan_id"
                    class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none"
                >
                    <option value="">Semua perusahaan</option>
                    @foreach($perusahaanOptions as $perusahaan)
                        <option value="{{ $perusahaan->id }}" {{ (string) $perusahaanId === (string) $perusahaan->id ? 'selected' : '' }}>
                            {{ $perusahaan->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Status verifikasi</label>
                <select
                    name="status"
                    class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none"
                >
                    <option value="menunggu" {{ $status === 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="disetujui" {{ $status === 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="ditolak" {{ $status === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    <option value="semua" {{ $status === 'semua' ? 'selected' : '' }}>Semua</option>
                </select>
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Tanggal mulai</label>
                <input
                    type="date"
                    name="tanggal_mulai"
                    value="{{ $tanggalMulai }}"
                    class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none"
                >
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Tanggal selesai</label>
                <input
                    type="date"
                    name="tanggal_selesai"
                    value="{{ $tanggalSelesai }}"
                    class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none"
                >
            </div>
            <div class="md:col-span-6 flex items-end gap-2">
                <button type="submit" class="w-full rounded-lg bg-[#1E40AF] px-4 py-2 text-sm font-medium text-white hover:bg-blue-800">Terapkan</button>
                <a href="{{ route('aksi.verifikasi') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">Reset</a>
            </div>
        </form>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-100 text-slate-700">
                    <tr>
                        <th class="px-3 py-3 text-left font-semibold">Perusahaan</th>
                        <th class="px-3 py-3 text-left font-semibold">Kegiatan / Laporan</th>
                        <th class="px-3 py-3 text-left font-semibold">Program Prioritas</th>
                        <th class="px-3 py-3 text-left font-semibold">Lokasi</th>
                        <th class="px-3 py-3 text-left font-semibold">Tanggal</th>
                        <th class="px-3 py-3 text-right font-semibold">Realisasi</th>
                        <th class="px-3 py-3 text-center font-semibold">Lampiran</th>
                        <th class="px-3 py-3 text-center font-semibold">Status</th>
                        <th class="px-3 py-3 text-center font-semibold">Aksi Admin</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @forelse($laporans as $row)
                        <tr class="align-top">
                            <td class="px-3 py-3">{{ $row->nama_perusahaan ?: '-' }}</td>
                            <td class="px-3 py-3">
                                <div class="font-medium text-slate-800">{{ $row->nama_aksi ?: '-' }}</div>
                                <div class="text-xs text-slate-500 mt-1">Kegiatan: {{ $row->nama_kegiatan ?: '-' }}</div>
                                <a href="/kegiatan/{{ $row->id_kegiatan }}/edit" class="mt-1 inline-block text-xs font-medium text-blue-600 hover:underline">
                                    Lihat detail kegiatan
                                </a>
                            </td>
                            <td class="px-3 py-3">
                                <div class="font-medium">{{ $row->nama_program ?: '-' }}</div>
                                <div class="text-xs text-slate-500 mt-1">{{ $row->nama_uraian ?: '-' }}</div>
                            </td>
                            <td class="px-3 py-3">{{ trim(($row->kecamatan ?: '-') . ' / ' . ($row->desa ?: '-')) }}</td>
                            <td class="px-3 py-3">{{ $row->tanggal ?: '-' }}</td>
                            <td class="px-3 py-3 text-right font-semibold">Rp {{ number_format((float) ($row->realisasi_uang ?: 0), 0, ',', '.') }}</td>
                            <td class="px-3 py-3 text-center">
                                @if($row->lampiran && $row->lampiran !== '-')
                                    <a href="{{ asset('lampiran/' . $row->lampiran) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
                                @else
                                    <span class="text-slate-400">-</span>
                                @endif
                            </td>
                            <td class="px-3 py-3 text-center">
                                @php
                                    $statusClass = 'bg-amber-100 text-amber-800';
                                    if ($row->status_verifikasi === 'disetujui') {
                                        $statusClass = 'bg-emerald-100 text-emerald-800';
                                    } elseif ($row->status_verifikasi === 'ditolak') {
                                        $statusClass = 'bg-rose-100 text-rose-800';
                                    }
                                @endphp
                                <span class="inline-flex rounded-full px-2 py-1 text-xs font-semibold {{ $statusClass }}">
                                    {{ ucfirst($row->status_verifikasi ?: 'menunggu') }}
                                </span>
                                @if($row->status_verifikasi === 'ditolak' && !empty($row->catatan_verifikasi))
                                    <div class="mt-2 rounded-md bg-rose-50 px-2 py-1 text-left text-xs text-rose-700">
                                        Alasan: {{ $row->catatan_verifikasi }}
                                    </div>
                                @endif
                            </td>
                            <td class="px-3 py-3">
                                <div class="flex justify-center gap-2">
                                    <form method="POST" action="/aksi/{{ $row->id }}/verify">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status_verifikasi" value="disetujui">
                                        <input type="hidden" name="catatan_verifikasi" value="">
                                        <button type="submit" class="rounded-md bg-emerald-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-emerald-700">Setujui</button>
                                    </form>
                                    <form method="POST" action="/aksi/{{ $row->id }}/verify" class="flex items-start gap-2">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status_verifikasi" value="ditolak">
                                        <input
                                            type="text"
                                            name="catatan_verifikasi"
                                            value="{{ old('catatan_verifikasi') }}"
                                            placeholder="Alasan tolak"
                                            class="w-40 rounded-md border border-slate-300 px-2 py-1.5 text-xs focus:border-rose-500 focus:outline-none"
                                            required
                                        >
                                        <button type="submit" class="rounded-md bg-rose-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-rose-700">Tolak</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-4 py-8 text-center text-slate-500">Belum ada laporan pada filter ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($laporans, 'links'))
            <div class="border-t border-slate-200 px-4 py-3">
                {{ $laporans->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
