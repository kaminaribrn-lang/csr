@extends('layouts.app')

<title>Program Unggulan Bupati</title>

@section('content')
    <div class="container w-full ">
        <div class="row justify-content-center w-full mb-10">
            <div class="col-md-8">
                <div class="card">
                    <section class="container px-4 mx-auto">
                        <div class="w-full flex justify-between mt-6">
                            <div>
                                <h2 class="text-lg font-medium text-gray-800  flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.568 3.082c.636-1.218 2.228-1.218 2.864 0l.844 1.615a1.607 1.607 0 0 0 1.21.84l1.783.259c1.344.195 1.836 1.847.864 2.794l-1.29 1.257a1.607 1.607 0 0 0-.462 1.423l.304 1.775c.23 1.337-1.174 2.408-2.376 1.776l-1.595-.838a1.607 1.607 0 0 0-1.496 0l-1.595.838c-1.202.632-2.606-.439-2.376-1.776l.304-1.775a1.607 1.607 0 0 0-.462-1.423L4.003 8.59c-.972-.947-.48-2.6.864-2.794l1.783-.26a1.607 1.607 0 0 0 1.21-.839l.844-1.615Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75 11.25 15 15 9.75" />
                                    </svg>

                                    <span class="mx-2 text-xl font-normal">Program Unggulan Bupati</span>
                                </h2>
                            </div>
                            <div>
                                <span class="mx-2 text-xl font-normal">Tambah Program</span>
                            </div>
                        </div>

                        <div class="flex flex-col mt-3 w-full">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block w-full py-2  md:px-6 lg:px-8">
                                    <div class="overflow-hidden w-full border border-gray-300 p-3  md:rounded-lg">
                                        <form action="{{ route('program-unggulan-bupati.store') }}" method="POST" class="text-base font-normal w-full ">
                                            @csrf

                                            <div class="mb-5">
                                                <label for="nama" class="block mb-2 ">Nama Program</label>
                                                <input id="nama" name="nama" value="{{ old('nama') }}"
                                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                                    required />
                                            </div>

                                            <div class="mb-5">
                                                <div class="flex items-center justify-between mb-2">
                                                    <label class="block ">Uraian</label>
                                                    <button type="button" id="add-uraian"
                                                        class="px-3 py-2 text-sm font-semibold text-white bg-[#1E40AF] rounded-lg hover:bg-green-900">
                                                        Tambah Uraian
                                                    </button>
                                                </div>
                                                <div id="uraian-wrapper" class="space-y-3">
                                                    @php
                                                        $oldUraian = old('uraian', ['']);
                                                    @endphp
                                                    @foreach($oldUraian as $value)
                                                        <div class="flex gap-3 uraian-item">
                                                            <textarea name="uraian[]" rows="3"
                                                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                                                required>{{ $value }}</textarea>
                                                            <button type="button"
                                                                class="remove-uraian px-3 py-2 text-sm font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700">
                                                                Hapus
                                                            </button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <button type="submit"
                                                class="text-white bg-[#1E40AF] w-full hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                Simpan
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <script>
        const uraianWrapper = document.getElementById('uraian-wrapper');
        const addUraianButton = document.getElementById('add-uraian');

        function bindRemoveButtons() {
            document.querySelectorAll('.remove-uraian').forEach((button) => {
                button.onclick = function() {
                    if (document.querySelectorAll('.uraian-item').length === 1) {
                        return;
                    }

                    this.closest('.uraian-item').remove();
                };
            });
        }

        addUraianButton.addEventListener('click', function() {
            const item = document.createElement('div');
            item.className = 'flex gap-3 uraian-item';
            item.innerHTML = `
                <textarea name="uraian[]" rows="3"
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                    required></textarea>
                <button type="button"
                    class="remove-uraian px-3 py-2 text-sm font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700">
                    Hapus
                </button>
            `;

            uraianWrapper.appendChild(item);
            bindRemoveButtons();
        });

        bindRemoveButtons();
    </script>
@endsection