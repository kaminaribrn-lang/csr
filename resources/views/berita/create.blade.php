<form method="POST" action="{{ route('berita.store') }}" enctype="multipart/form-data">
@csrf

<input name="headline" placeholder="Judul" class="border p-2 w-full mb-3">
<input type="date" name="tanggal" class="border p-2 w-full mb-3">
<input name="kategori" placeholder="Kategori" class="border p-2 w-full mb-3">
<input name="hastag" placeholder="#hashtag" class="border p-2 w-full mb-3">

<select name="status" class="border p-2 w-full mb-3">
    <option value="draft">Draft</option>
    <option value="publish">Publish</option>
</select>

<input type="file" name="gambar" class="mb-3">

<textarea id="berita" name="berita"></textarea>

<button class="bg-blue-600 text-white px-4 py-2 mt-4">Simpan</button>
</form>