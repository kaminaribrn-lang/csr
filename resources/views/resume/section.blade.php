@extends('layouts.app')

<title>{{ $title }}</title>

@section('content')
<div class="w-full max-w-6xl mx-auto">
    <div class="mb-4 flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">{{ $title }}</h1>
            <p class="mt-1 text-sm text-slate-500">Ringkasan data resume yang bisa diekspor ke Excel dan PDF.</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="/resume" class="rounded-lg border border-slate-300 px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">Kembali</a>
            <a href="{{ route('resume.export.excel', ['jenis' => $jenis]) }}" class="rounded-lg bg-[#1E40AF] px-3 py-2 text-sm font-medium text-white">Export Excel</a>
            <a href="{{ route('resume.export.pdf', ['jenis' => $jenis]) }}" target="_blank" class="rounded-lg border border-slate-300 px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">Export PDF</a>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-[#1E40AF] text-white">
                    <tr>
                        @foreach($headers as $header)
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide">{{ $header }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @if($jenis === 'program-prioritas')
                        @php
                            $groupedRows = collect($rows)->groupBy(function ($row) {
                                return $row[0] ?? '-';
                            });
                        @endphp

                        @forelse($groupedRows as $programName => $programRows)
                            <tr class="bg-blue-100">
                                <td colspan="{{ count($headers) }}" class="px-4 py-3 text-sm font-semibold text-blue-900">
                                    Program: {{ $programName }}
                                </td>
                            </tr>

                            @foreach($programRows as $row)
                                <tr class="bg-slate-50">
                                    <td class="px-4 py-3 text-sm text-slate-400">-</td>
                                    <td class="px-4 py-3 text-sm text-slate-700">{{ $row[1] ?? '-' }}</td>
                                    <td class="px-4 py-3 text-sm text-slate-700 text-right font-medium">{{ number_format((float) ($row[2] ?? 0), 0, ',', '.') }}</td>
                                    <td class="px-4 py-3 text-sm text-slate-700 text-right font-medium">{{ number_format((float) ($row[3] ?? 0), 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        @empty
                            <tr>
                                <td colspan="{{ count($headers) }}" class="px-4 py-8 text-center text-sm text-slate-500">Tidak ada data tersedia.</td>
                            </tr>
                        @endforelse
                    @else
                        @forelse($rows as $row)
                            <tr>
                                @foreach($row as $index => $cell)
                                    <td class="px-4 py-3 text-sm text-slate-700 {{ is_numeric($cell) && $index > 0 ? 'text-right font-medium' : '' }}">
                                        {{ is_numeric($cell) ? number_format((float) $cell, 0, ',', '.') : $cell }}
                                    </td>
                                @endforeach
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ count($headers) }}" class="px-4 py-8 text-center text-sm text-slate-500">Tidak ada data tersedia.</td>
                            </tr>
                        @endforelse
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
