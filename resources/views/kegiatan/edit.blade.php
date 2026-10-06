@extends('layouts.app')

<title>Kegiatan</title>

@section('content')
    <div class="container w-full pb-16">
        <div class="row justify-content-center w-full mb-10">
            <div class="col-md-8">
                <div class="card">
                    <section class="container px-4 mx-auto">
                        <div class="w-full flex justify-between mt-6">
                            <div>
                                <h2 class="text-lg font-medium text-gray-800  flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.2" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                    </svg>

                                    <span class="mx-2 text-xl font-normal">Kegiatan</span>
                                </h2>
                            </div>
                            <div>
                                <span class="mx-2 text-xl font-normal">Detail Kegiatan</span>
                            </div>
                        </div>

                        <div class="flex flex-col mt-3 w-full">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block w-full py-2  md:px-6 lg:px-8">
                                    <div
                                        class="overflow-hidden w-full border border-gray-300 p-3  md:rounded-lg">

                                        <form action="{{ route('kegiatan.update', $data->id) }}" method="POST"
                                            enctype="multipart/form-data" class="text-base font-normal w-full ">

                                            @csrf
                                            @method('PUT')

                                            <div class="space-y-5 w-full">
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                    <div class="mb-4">
                                                        <label class="block mb-2  capitalize">Perusahaan</label>
                                                        <input value="{{ $data->namaPerusahaan ?? '-' }}" disabled
                                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5   " />
                                                    </div>

                                                    <div class="mb-4">
                                                        <label class="block mb-2  capitalize">Total Pagu</label>
                                                        <input id="nominalpagu" value="{{ number_format($data->nominalpagu, 2) }}" disabled
                                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 text-right   " />
                                                    </div>
                                                </div>

                                                <div class="mb-4">
                                                    <label for="nama" class="block mb-2 ">Nama Kegiatan</label>
                                                    <input id="nama" name="nama" value="{{ $data->nama }}"
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                                                        required />
                                                </div>

                                                <div class="mb-4">
                                                    <label for="deskripsi" class="block mb-2  capitalize">Uraian Kegiatan</label>
                                                    <textarea id="deskripsi" name="deskripsi" rows="5"
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                                                        required>{{ $data->deskripsi }}</textarea>
                                                </div>

                                                @if (\Auth::user()->role == 'superadmin')
                                                    <div class="mb-4">
                                                        <label for="status" class="block mb-2  capitalize">Status</label>
                                                        <select id="status" name="status"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ">
                                                            <option {{ $data->status == 'tayang' ? 'selected' : '' }} value="tayang">Tayang</option>
                                                            <option {{ $data->status == 'tidaktayang' ? 'selected' : '' }} value="tidaktayang">Tidak Tayang</option>
                                                        </select>
                                                    </div>
                                                @endif

                                                <div class="rounded-lg border border-blue-100 bg-blue-50 px-4 py-3 text-sm text-blue-900">
                                                    Gunakan daftar aksi di bawah untuk mengisi detail tindakan, target, realisasi, dan nominal kegiatan.
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="text-white bg-[#1E40AF] w-full hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full  px-5 py-2.5 text-center   ">SIMPAN</button>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </div>

              <hr class="mt-8 mb-12">

          <div class="overflow-hidden border border-gray-300 p-3  md:rounded-lg mx-4 mb-8">
                    <div class="flex justify-between items-center mb-3">
            <h3 class="text-lg font-semibold">Daftar Aksi Kegiatan</h3>
            <button onclick="openAksiModal()"
                class="bg-[#1E40AF] text-white px-4 py-2 rounded text-sm">
                + Tambah Aksi
            </button>
        </div>

        <div class="mb-4 grid grid-cols-1 gap-3 lg:grid-cols-4">
            <div>
                <label for="aksiSearch" class="mb-2 block text-sm font-medium text-gray-700">Cari Aksi</label>
                <input id="aksiSearch" type="text" placeholder="Cari nama, deskripsi, kecamatan..." class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">
            </div>
            <div>
                <label for="aksiFilterProgram" class="mb-2 block text-sm font-medium text-gray-700">Filter Program</label>
                <select id="aksiFilterProgram" class="w-full rounded-lg border border-gray-300 bg-white p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">
                    <option value="">Semua program</option>
                    @foreach ($programOptions as $program)
                        <option value="{{ $program['id'] }}">{{ $program['nama'] }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="aksiFilterUraian" class="mb-2 block text-sm font-medium text-gray-700">Filter Uraian</label>
                <select id="aksiFilterUraian" class="w-full rounded-lg border border-gray-300 bg-white p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">
                    <option value="">Semua uraian</option>
                </select>
            </div>
            <div class="flex items-end">
                <button id="resetAksiFilter" type="button" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Reset Filter
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
        <table class="w-full border text-sm" id="aksi-table">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">Program</th>
                    <th class="border p-2">Uraian</th>
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">Target</th>
                    <th class="border p-2">Realisasi</th>
                    <th class="border p-2">Kecamatan</th>
                    <th class="border p-2">Kel/Desa</th>
                    <th class="border p-2">Deskripsi</th>
                    <th class="border p-2">Evidence</th>
                    <th class="border p-2">Nominal</th>
                    <th class="border p-2">Status Verifikasi</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        </div>

        <div id="aksiModal" class="fixed inset-0 hidden z-50 px-4 py-6">
            <div class="absolute inset-0 bg-black/50" onclick="closeAksiModal()"></div>
            <div class="relative flex min-h-full items-center justify-center">
                <div class="flex max-h-[90vh] w-full max-w-3xl flex-col overflow-hidden rounded-2xl bg-white shadow-2xl">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <h3 class="text-lg font-semibold text-gray-800" id="aksiTitle">Tambah Aksi</h3>
                        <p class="mt-1 text-sm text-gray-500">Lengkapi data aksi kegiatan dengan jelas agar mudah ditinjau.</p>
                    </div>

                    <div class="overflow-y-auto px-6 py-4">
                        <input type="hidden" id="aksi_id">

                        <div class="grid grid-cols-1 gap-3 md:grid-cols-12">
                            <div class="md:col-span-12">
                                <label for="aksi_program_unggulan_bupati_id" class="mb-1.5 block text-xs font-semibold uppercase tracking-wide text-gray-600">Program Unggulan Bupati</label>
                                <select id="aksi_program_unggulan_bupati_id" class="h-10 w-full rounded-lg border border-gray-300 bg-white px-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">
                                    <option value="">Pilih program unggulan</option>
                                    @foreach ($programOptions as $program)
                                        <option value="{{ $program['id'] }}">{{ $program['nama'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="md:col-span-12">
                                <label for="aksi_uraian_program_unggulan_bupati_id" class="mb-1.5 block text-xs font-semibold uppercase tracking-wide text-gray-600">Uraian yang Dibantu</label>
                                <select id="aksi_uraian_program_unggulan_bupati_id" class="h-10 w-full rounded-lg border border-gray-300 bg-white px-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">
                                    <option value="">Pilih uraian terlebih dahulu</option>
                                </select>
                            </div>

                            <div class="md:col-span-12">
                                <label for="aksi_nama" class="mb-1.5 block text-xs font-semibold uppercase tracking-wide text-gray-600">Nama Aksi</label>
                                <input id="aksi_nama" placeholder="Masukkan nama aksi" class="h-10 w-full rounded-lg border border-gray-300 px-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">
                            </div>

                            <div class="md:col-span-3">
                                <label for="aksi_target" class="mb-1.5 block text-xs font-semibold uppercase tracking-wide text-gray-600">Target</label>
                                <input id="aksi_target" placeholder="Masukkan target aksi" class="h-10 w-full rounded-lg border border-gray-300 px-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">
                            </div>

                            <div class="md:col-span-3">
                                <label for="aksi_realisasi_fisik" class="mb-1.5 block text-xs font-semibold uppercase tracking-wide text-gray-600">Realisasi Fisik</label>
                                <input id="aksi_realisasi_fisik" placeholder="Masukkan realisasi fisik" class="h-10 w-full rounded-lg border border-gray-300 px-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">
                            </div>

                            <div class="md:col-span-6">
                                <label for="aksi_nominal" class="mb-1.5 block text-xs font-semibold uppercase tracking-wide text-gray-600">Nominal</label>
                                <input id="aksi_nominal" placeholder="Masukkan nominal" class="h-10 w-full rounded-lg border border-gray-300 px-3 text-right text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">
                            </div>

                            <div class="md:col-span-6">
                                <label for="aksi_kecamatan" class="mb-1.5 block text-xs font-semibold uppercase tracking-wide text-gray-600">Kecamatan</label>
                                <select id="aksi_kecamatan" class="h-10 w-full rounded-lg border border-gray-300 bg-white px-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">
                                    <option value="">Pilih kecamatan</option>
                                    @foreach (array_keys($wilayahOptions) as $kecamatan)
                                        <option value="{{ $kecamatan }}">{{ $kecamatan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="md:col-span-6">
                                <label for="aksi_desa" class="mb-1.5 block text-xs font-semibold uppercase tracking-wide text-gray-600">Kelurahan/Desa</label>
                                <select id="aksi_desa" class="h-10 w-full rounded-lg border border-gray-300 bg-white px-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">
                                    <option value="">Pilih kecamatan terlebih dahulu</option>
                                </select>
                            </div>

                            <div class="md:col-span-6">
                                <label for="aksi_tanggal" class="mb-1.5 block text-xs font-semibold uppercase tracking-wide text-gray-600">Waktu Pelaksanaan</label>
                                <input id="aksi_tanggal" type="date" class="h-10 w-full rounded-lg border border-gray-300 px-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">
                            </div>

                            <div class="md:col-span-12">
                                <label for="aksi_deskripsi" class="mb-1.5 block text-xs font-semibold uppercase tracking-wide text-gray-600">Deskripsi Aksi</label>
                                <textarea id="aksi_deskripsi" rows="4" placeholder="Masukkan deskripsi aksi" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"></textarea>
                            </div>

                            <div class="md:col-span-12">
                                <label for="aksi_lampiran" class="mb-1.5 block text-xs font-semibold uppercase tracking-wide text-gray-600">Evidence</label>
                                <input id="aksi_lampiran" type="file" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.xls,.xlsx" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm file:mr-4 file:rounded-md file:border-0 file:bg-blue-50 file:px-3 file:py-2 file:text-sm file:font-medium file:text-blue-700 hover:file:bg-blue-100">
                                <div id="aksiLampiranInfo" class="mt-2 text-sm text-gray-500"></div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 border-t border-gray-200 px-6 py-4">
                        <button onclick="closeAksiModal()" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700">Batal</button>
                        <button onclick="saveAksi()" class="rounded-lg bg-[#1E40AF] px-4 py-2 text-sm font-medium text-white">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>



<script>
const kegiatanId = {{ $data->id }};
const kegiatanName = @json($data->nama);
const programOptions = @json($programOptions);
const wilayahOptions = @json($wilayahOptions);
const aksiModal = document.getElementById('aksiModal');
const aksiTitle = document.getElementById('aksiTitle');
const tbody = document.querySelector('#aksi-table tbody');
const aksiProgramSelect = document.getElementById('aksi_program_unggulan_bupati_id');
const aksiUraianSelect = document.getElementById('aksi_uraian_program_unggulan_bupati_id');
const aksiKecamatanSelect = document.getElementById('aksi_kecamatan');
const aksiDesaSelect = document.getElementById('aksi_desa');
const aksiTanggalInput = document.getElementById('aksi_tanggal');
const aksiNominalInput = document.getElementById('aksi_nominal');
const aksiLampiranInput = document.getElementById('aksi_lampiran');
const aksiLampiranInfo = document.getElementById('aksiLampiranInfo');
const aksiSearchInput = document.getElementById('aksiSearch');
const aksiFilterProgram = document.getElementById('aksiFilterProgram');
const aksiFilterUraian = document.getElementById('aksiFilterUraian');
const resetAksiFilterButton = document.getElementById('resetAksiFilter');
const currentUserRole = @json(auth()->user()->role ?? '');
let allAksiData = [];

function onlyDigits(value) {
    return (value || '').replace(/\D/g, '');
}

function formatRibuan(value) {
    const digits = onlyDigits(value);

    if (!digits) {
        return '';
    }

    return digits.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}

function renderUraianOptions(selectedProgramId = '', selectedUraianId = '') {
    const selectedProgram = programOptions.find(program => String(program.id) === String(selectedProgramId));
    const uraianOptions = selectedProgram ? selectedProgram.uraians : [];

    aksiUraianSelect.innerHTML = '';

    const placeholder = document.createElement('option');
    placeholder.value = '';
    placeholder.textContent = uraianOptions.length ? 'Pilih uraian program' : 'Pilih program unggulan terlebih dahulu';
    aksiUraianSelect.appendChild(placeholder);

    uraianOptions.forEach(uraian => {
        const option = document.createElement('option');
        option.value = uraian.id;
        option.textContent = uraian.uraian;
        if (String(uraian.id) === String(selectedUraianId)) {
            option.selected = true;
        }
        aksiUraianSelect.appendChild(option);
    });
}

function renderDesaOptions(selectedKecamatan = '', selectedDesa = '') {
    const desaOptions = wilayahOptions[selectedKecamatan] ?? [];

    aksiDesaSelect.innerHTML = '';

    const placeholder = document.createElement('option');
    placeholder.value = '';
    placeholder.textContent = desaOptions.length ? 'Pilih kelurahan/desa' : 'Pilih kecamatan terlebih dahulu';
    aksiDesaSelect.appendChild(placeholder);

    desaOptions.forEach(desa => {
        const option = document.createElement('option');
        option.value = desa;
        option.textContent = desa;
        if (String(desa) === String(selectedDesa)) {
            option.selected = true;
        }
        aksiDesaSelect.appendChild(option);
    });
}

function renderFilterUraianOptions(selectedProgramId = '', selectedUraianId = '') {
    const selectedProgram = programOptions.find(program => String(program.id) === String(selectedProgramId));
    const uraianOptions = selectedProgram ? selectedProgram.uraians : [];

    aksiFilterUraian.innerHTML = '';

    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.textContent = 'Semua uraian';
    aksiFilterUraian.appendChild(defaultOption);

    uraianOptions.forEach(uraian => {
        const option = document.createElement('option');
        option.value = uraian.id;
        option.textContent = uraian.uraian;
        if (String(uraian.id) === String(selectedUraianId)) {
            option.selected = true;
        }
        aksiFilterUraian.appendChild(option);
    });
}

function renderAksiTable(rows) {
    tbody.innerHTML = '';

    if (!rows.length) {
        tbody.innerHTML = `
            <tr>
                <td colspan="12" class="border p-4 text-center text-sm text-gray-500">Belum ada data aksi yang sesuai filter.</td>
            </tr>
        `;
        return;
    }

    rows.forEach(a => {
        const status = (a.status_verifikasi || 'disetujui').toLowerCase();
        const statusBadge = status === 'disetujui'
            ? '<span class="inline-flex items-center rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">Disetujui</span>'
            : status === 'ditolak'
                ? '<span class="inline-flex items-center rounded-full bg-rose-100 px-2.5 py-1 text-xs font-semibold text-rose-700">Ditolak</span>'
                : '<span class="inline-flex items-center rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">Menunggu</span>';

        const adminVerifyAction = currentUserRole === 'superadmin'
            ? `<div class="mb-1">
                    <select id="verify_${a.id}" class="rounded border border-gray-300 px-2 py-1 text-xs">
                        <option value="menunggu" ${status === 'menunggu' ? 'selected' : ''}>Menunggu</option>
                        <option value="disetujui" ${status === 'disetujui' ? 'selected' : ''}>Disetujui</option>
                        <option value="ditolak" ${status === 'ditolak' ? 'selected' : ''}>Ditolak</option>
                    </select>
                </div>
                <button onclick="verifyAksi(${a.id})" class="text-xs text-green-700 underline">Simpan Status</button>
                <div class="my-1">|</div>`
            : '';

        tbody.innerHTML += `
            <tr>
                <td class="border p-2">${a.program_unggulan_nama ?? '-'}</td>
                <td class="border p-2">${a.uraian_program_nama ?? '-'}</td>
                <td class="border p-2">${a.nama ?? '-'}</td>
                <td class="border p-2">${a.target ?? '-'}</td>
                <td class="border p-2">${a.realisasi_fisik ?? '-'}</td>
                <td class="border p-2">${a.kecamatan ?? '-'}</td>
                <td class="border p-2">${a.desa ?? '-'}</td>
                <td class="border p-2">${a.deskripsi ?? '-'}</td>
                <td class="border p-2 text-center">${a.lampiran_url ? `<a href="${a.lampiran_url}" target="_blank" class="text-blue-600 underline">Lihat</a>` : '-'}</td>
                <td class="border p-2 text-right">${formatRibuan(String(a.nominalpagu ?? 0))}</td>
                <td class="border p-2 text-center">${statusBadge}</td>
                <td class="border p-2 text-center">
                    ${adminVerifyAction}
                    <button onclick='openAksiModal(${JSON.stringify(a)})' class="text-blue-600">Edit</button>
                    |
                    <button onclick='deleteAksi(${a.id})' class="text-red-600">Hapus</button>
                </td>
            </tr>
        `;
    });
}

function applyAksiFilters() {
    const search = aksiSearchInput.value.trim().toLowerCase();
    const selectedProgramId = aksiFilterProgram.value;
    const selectedUraianId = aksiFilterUraian.value;

    const filteredRows = allAksiData.filter(a => {
        const matchProgram = !selectedProgramId || String(a.program_unggulan_bupati_id) === String(selectedProgramId);
        const matchUraian = !selectedUraianId || String(a.uraian_program_unggulan_bupati_id) === String(selectedUraianId);
        const haystack = [
            a.program_unggulan_nama,
            a.uraian_program_nama,
            a.nama,
            a.target,
            a.realisasi_fisik,
            a.kecamatan,
            a.desa,
            a.deskripsi,
        ].join(' ').toLowerCase();
        const matchSearch = !search || haystack.includes(search);

        return matchProgram && matchUraian && matchSearch;
    });

    renderAksiTable(filteredRows);
}

function openAksiModal(data = null) {
    aksiModal.classList.remove('hidden');
    if (data) {
        aksiTitle.textContent = 'Edit Aksi';
        aksi_id.value = data.id;
        aksiProgramSelect.value = data.program_unggulan_bupati_id ?? '';
        renderUraianOptions(data.program_unggulan_bupati_id ?? '', data.uraian_program_unggulan_bupati_id ?? '');
        aksi_nama.value = data.nama;
        aksi_target.value = data.target;
        aksi_realisasi_fisik.value = data.realisasi_fisik;
        aksiNominalInput.value = formatRibuan(String(data.nominalpagu ?? ''));
        aksiKecamatanSelect.value = data.kecamatan ?? '';
        renderDesaOptions(data.kecamatan ?? '', data.desa ?? '');
        aksiTanggalInput.value = data.tanggal ?? '';
        aksi_deskripsi.value = data.deskripsi ?? '';
        aksiLampiranInput.value = '';
        aksiLampiranInfo.innerHTML = data.lampiran_url
            ? `Evidence saat ini: <a href="${data.lampiran_url}" target="_blank" class="text-blue-600 underline">${data.lampiran ?? 'Lihat file'}</a>`
            : 'Belum ada evidence yang diunggah.';
    } else {
        aksiTitle.textContent = 'Tambah Aksi';
        aksi_id.value = '';
        document.querySelectorAll('#aksiModal input').forEach(i => i.value = '');
        aksiProgramSelect.value = '';
        renderUraianOptions();
        aksiKecamatanSelect.value = '';
        renderDesaOptions();
        aksiTanggalInput.value = '';
        aksi_deskripsi.value = '{{ $data->deskripsi }}';
        aksi_nama.value = kegiatanName;
        aksiLampiranInfo.textContent = 'Unggah file bukti dukungan kegiatan jika tersedia.';
    }
}

function closeAksiModal() {
    aksiModal.classList.add('hidden');
}

function loadAksi() {
    fetch(`/kegiatan/${kegiatanId}/aksi`)
        .then(r => r.json())
        .then(res => {
            allAksiData = res.data;
            applyAksiFilters();
        })
        .catch(() => {
            alert('Gagal memuat daftar aksi. Silakan refresh halaman.');
        });
}

function saveAksi() {
    if (!aksiProgramSelect.value) {
        alert('Pilih program unggulan terlebih dahulu.');
        aksiProgramSelect.focus();
        return;
    }

    if (!aksiUraianSelect.value) {
        alert('Pilih uraian program yang ingin dibantu.');
        aksiUraianSelect.focus();
        return;
    }

    if (!aksiKecamatanSelect.value) {
        alert('Pilih kecamatan terlebih dahulu.');
        aksiKecamatanSelect.focus();
        return;
    }

    const formData = new FormData();
    formData.append('id', aksi_id.value);
    formData.append('id_kegiatan', kegiatanId);
    formData.append('program_unggulan_bupati_id', aksiProgramSelect.value);
    formData.append('uraian_program_unggulan_bupati_id', aksiUraianSelect.value);
    formData.append('nama', aksi_nama.value);
    formData.append('target', aksi_target.value);
    formData.append('realisasi_fisik', aksi_realisasi_fisik.value);
    formData.append('nominalpagu', onlyDigits(aksiNominalInput.value));
    formData.append('kecamatan', aksiKecamatanSelect.value);
    formData.append('desa', aksiDesaSelect.value);
    formData.append('tanggal', aksiTanggalInput.value);
    formData.append('deskripsi', aksi_deskripsi.value);

    if (aksiLampiranInput.files[0]) {
        formData.append('lampiran', aksiLampiranInput.files[0]);
    }

    fetch('/aksi/store', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: formData
    }).then(async (response) => {
        if (!response.ok) {
            let message = 'Gagal menyimpan aksi.';

            try {
                const err = await response.json();
                if (err?.message) {
                    message = err.message;
                }
                if (err?.errors) {
                    const firstField = Object.keys(err.errors)[0];
                    if (firstField && Array.isArray(err.errors[firstField]) && err.errors[firstField][0]) {
                        message = err.errors[firstField][0];
                    }
                }
            } catch (e) {
                if (response.status === 403) {
                    message = 'Anda tidak memiliki akses untuk menyimpan aksi ini.';
                } else if (response.status === 422) {
                    message = 'Data aksi belum lengkap atau tidak valid.';
                }
            }

            throw new Error(message);
        }

        return response.json();
    }).then(() => {
        closeAksiModal();
        loadAksi();
        updateNominalKegiatan();
        alert('Aksi berhasil disimpan.');
    }).catch((error) => {
        alert(error.message || 'Terjadi kesalahan saat menyimpan aksi.');
    });
}

function deleteAksi(id) {
    if (!confirm('Hapus aksi?')) return;
    fetch(`/aksi/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    }).then((response) => {
        if (!response.ok) {
            throw new Error('Gagal menghapus aksi.');
        }
        loadAksi();
        updateNominalKegiatan();
    }).catch((error) => {
        alert(error.message || 'Terjadi kesalahan saat menghapus aksi.');
    });
}

function verifyAksi(id) {
    const selectEl = document.getElementById(`verify_${id}`);
    if (!selectEl) {
        return;
    }

    fetch(`/aksi/${id}/verify`, {
        method: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            status_verifikasi: selectEl.value
        })
    }).then((response) => {
        if (!response.ok) {
            throw new Error('Gagal memperbarui status verifikasi.');
        }
        loadAksi();
        updateNominalKegiatan();
    }).catch((error) => {
        alert(error.message || 'Terjadi kesalahan saat memverifikasi aksi.');
    });
}

function updateNominalKegiatan() {
    fetch(`/kegiatan/${kegiatanId}/recalculate`)
        .then(r => r.json())
        .then(res => {
            document.getElementById('nominalpagu').value = res.nominal;
        });
}

aksiProgramSelect.addEventListener('change', function() {
    renderUraianOptions(this.value);
});

aksiNominalInput.addEventListener('input', function() {
    this.value = formatRibuan(this.value);
});

aksiKecamatanSelect.addEventListener('change', function() {
    renderDesaOptions(this.value);
});

aksiFilterProgram.addEventListener('change', function() {
    renderFilterUraianOptions(this.value);
    applyAksiFilters();
});

aksiFilterUraian.addEventListener('change', applyAksiFilters);
aksiSearchInput.addEventListener('input', applyAksiFilters);
resetAksiFilterButton.addEventListener('click', function() {
    aksiSearchInput.value = '';
    aksiFilterProgram.value = '';
    renderFilterUraianOptions();
    applyAksiFilters();
});

loadAksi();
renderUraianOptions();
renderDesaOptions();
renderFilterUraianOptions();
</script>

    <script type="text/javascript">
        /* Dengan Rupiah */
        var dengan_rupiah = document.getElementById('nominalpagu');
        dengan_rupiah.addEventListener('keyup', function(e) {
            dengan_rupiah.value = formatRupiah(this.value, '');
        });

        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
        }

        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
    </script>
@endsection
