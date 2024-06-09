@extends('layouts.app')

<title>Bidang CSR</title>

@section('content')
    <div class="container w-full ">
        <div class="row justify-content-center w-full mb-10">
            <div class="col-md-8">
                <div class="card">
                    <section class="container px-4 mx-auto">
                        <div class="w-full flex justify-between mt-6">
                            <div>
                                <h2 class="text-lg font-medium text-gray-800 dark:text-white flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                    </svg>

                                    <span class="mx-2 text-xl font-normal">Dasar Hukum</span>
                                </h2>
                            </div>
                            <div>
                                <span class="mx-2 text-xl font-normal">Ubah Dasar Hukum</span>
                            </div>
                        </div>

                        <div class="flex flex-col mt-3 w-full">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block w-full py-2  md:px-6 lg:px-8">
                                    <div
                                        class="overflow-hidden w-full border border-gray-300 p-3 dark:border-gray-700 md:rounded-lg">

                                        <form action="{{ route('pengaturanUpdate', 'update-dasar-hukum') }}" method="POST"
                                            enctype="multipart/form-data" class="text-base font-normal w-full ">

                                            @csrf
                                            @method('PUT')

                                            <div class="grid grid-cols-1 gap-x-6 w-full mb-8">
                                                <input class="hidden" id="id" name="id"
                                                    value="{{ $data->id }}">

                                                <div class="mb-4">
                                                    <label for="nama"
                                                        class="block mb-2 dark:text-white capitalize">nama</label>
                                                    <textarea id="nama" name="nama"
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                                        required>{{ $data->nama }}</textarea>
                                                </div>

                                                <div class="mb-4">
                                                    <div class="flex gap-2">
                                                        <label for="lampiran"
                                                            class="block mb-2 dark:text-white capitalize">lampiran</label>
                                                        <label for="text-sm">( hanya diisi jika ingin mengubah file
                                                            )</label>
                                                    </div>
                                                    <input id="lampiran" name="lampiran" type="file"
                                                        class="bg-gray-50 border border-white text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" />
                                                </div>

                                                <button type="submit"
                                                    class="text-white bg-[#00ae73] w-full hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full  px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-[#00ae73] dark:focus:ring-green-800">UBAH</button>
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

        function loadFile(event) {
            var output = document.getElementById('sampulBerita');
            output.src = URL.createObjectURL(event.target.files[0]);
            // document.write(output.src);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
                output.classList.remove('hidden');
            }
        };
    </script>
@endsection
