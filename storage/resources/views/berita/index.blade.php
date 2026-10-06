@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">

    <button onclick="openModal()" class="bg-blue-600 text-white px-4 py-2 mb-4 rounded">
        + Tambah Berita
    </button>

    <table class="w-full border text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">Judul</th>
                <th class="border p-2">Kategori</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody id="beritaTable"></tbody>
    </table>

</div>

{{-- MODAL --}}
<div id="modal" class="fixed inset-0 bg-black/50 hidden items-center justify-center">
    <div class="bg-white p-6 w-2/3 rounded shadow">
        <input type="hidden" id="id">

        <input id="headline" placeholder="Judul" class="border p-2 w-full mb-2">
        <input type="date" id="tanggal" class="border p-2 w-full mb-2">
        <input id="kategori" placeholder="Kategori" class="border p-2 w-full mb-2">
        <input id="hastag" placeholder="Hashtag" class="border p-2 w-full mb-2">

        <select id="status" class="border p-2 w-full mb-2">
            <option value="draft">Draft</option>
            <option value="publish">Publish</option>
        </select>

        <input type="file" id="gambar" class="mb-2">

        <textarea id="berita"></textarea>

        <div class="mt-4 text-right space-x-2">
            <button onclick="closeModal()" class="px-4 py-2 border rounded">
                Batal
            </button>
            <button onclick="saveBerita()" class="bg-blue-600 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </div>
    </div>
</div>

{{-- TinyMCE CDN --}}
<script src="https://cdn.tiny.cloud/1/6h1pwrr2zi4ne4tchyvkcm0104lb59echyx2238r8slilvh5/tinymce/6/tinymce.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    tinymce.init({
        selector: '#berita',
        height: 300
    });

    loadBerita();
});

const modal = document.getElementById('modal');
const table = document.getElementById('beritaTable');
const el = id => document.getElementById(id);

function openModal() {
    modal.classList.remove('hidden');
    modal.classList.add('flex');

    ['id','headline','tanggal','kategori','hastag','status'].forEach(f => {
        if (el(f)) el(f).value = '';
    });

    if (tinymce.get('berita')) {
        tinymce.get('berita').setContent('');
    }
}

function closeModal() {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function loadBerita() {
    fetch('/berita/data')
        .then(r => {
            if (!r.ok) throw new Error('Server error');
            return r.json();
        })
        .then(res => {
            table.innerHTML = '';

            let data = Array.isArray(res) ? res : res.data;

            if (!data || data.length === 0) {
                table.innerHTML = `
                <tr>
                    <td colspan="4" class="text-center p-4 text-gray-500">
                        Tidak ada berita
                    </td>
                </tr>`;
                return;
            }

            data.forEach(b => {
                table.innerHTML += `
                <tr>
                    <td class="border p-2">${b.headline}</td>
                    <td class="border p-2">${b.kategori ?? '-'}</td>
                    <td class="border p-2">${b.status}</td>
                    <td class="border p-2 space-x-2">
                        <button onclick="editBerita(${b.id})" class="text-blue-600">Edit</button>
                        <button onclick="deleteBerita(${b.id})" class="text-red-600">Hapus</button>
                    </td>
                </tr>`;
            });
        })
        .catch(() => {
            table.innerHTML = `
            <tr>
                <td colspan="4" class="text-center text-red-600 p-4">
                    Gagal memuat data
                </td>
            </tr>`;
        });
}

function saveBerita() {
    let fd = new FormData();
    fd.append('_token', '{{ csrf_token() }}');
    fd.append('headline', el('headline').value);
    fd.append('tanggal', el('tanggal').value);
    fd.append('kategori', el('kategori').value);
    fd.append('hastag', el('hastag').value);
    fd.append('status', el('status').value);
    fd.append('berita', tinymce.get('berita').getContent());

    if (el('gambar').files[0]) {
        fd.append('gambar', el('gambar').files[0]);
    }

    let url = el('id').value
        ? `/berita/update/${el('id').value}`
        : '/berita/store';

    fetch(url, { method: 'POST', body: fd })
        .then(r => {
            if (!r.ok) throw new Error();
            closeModal();
            loadBerita();
        })
        .catch(() => alert('Gagal menyimpan'));
}

function editBerita(id) {
    fetch(`/berita/edit/${id}`, {
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(r => {
        if (!r.ok) throw new Error('Data tidak ditemukan');
        return r.json();
    })
    .then(b => {
        // buka modal dulu
        openModal();

        // isi field biasa
        el('id').value = b.id ?? '';
        el('headline').value = b.headline ?? '';
        el('tanggal').value = b.tanggal ?? '';
        el('kategori').value = b.kategori ?? '';
        el('hastag').value = b.hastag ?? '';
        el('status').value = b.status ?? 'draft';

        // TUNGGU TinyMCE SIAP
        let waitEditor = setInterval(() => {
            let editor = tinymce.get('berita');
            if (editor) {
                editor.setContent(b.berita ?? '');
                clearInterval(waitEditor);
            }
        }, 100);
    })
    .catch(err => {
        console.error(err);
        alert('Gagal memuat data edit');
    });
}

function deleteBerita(id) {
    if (!confirm('Hapus berita?')) return;

    fetch(`/berita/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    }).then(() => loadBerita());
}
</script>
@endsection