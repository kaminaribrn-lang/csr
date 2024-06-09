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
                                        stroke-width="1.2" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>

                                    <span class="mx-2 text-xl font-normal">Slider</span>
                                </h2>
                            </div>
                            <div>
                                <span class="mx-2 text-xl font-normal">Tambah Slider</span>
                            </div>
                        </div>

                        <div class="flex flex-col mt-3 w-full">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block w-full py-2  md:px-6 lg:px-8">
                                    <div
                                        class="overflow-hidden w-full border border-gray-300 p-3 dark:border-gray-700 md:rounded-lg">

                                        <form action="{{ route('pengaturanUpdate', last(request()->segments())) }}"
                                            method="POST" enctype="multipart/form-data"
                                            class="text-base font-normal w-full ">

                                            @csrf
                                            @method('PUT')

                                            <div class="grid grid-cols-2 gap-x-6 w-full mb-8">

                                                <div class="form-group flex flex-col gap-3">
                                                    <label>Sampul Berita</label>
                                                    <input type="file" accept="image/*" id="sampul" name="sampul"
                                                        onchange="loadFile(event)" required>
                                                </div>

                                                {{-- <div class="mb-4">
                                                        <label for="password"
                                                            class="block mb-2  dark:text-white">Urutan</label>
                                                        <input type="number" id="urutan" name="urutan"
                                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                                            required />
                                                    </div> --}}

                                            </div>

                                            <img name="sampulBerita"
                                                src="https://cdn1.vectorstock.com/i/1000x1000/50/20/no-photo-or-blank-image-icon-loading-images-vector-37375020.jpg"
                                                id="sampulBerita" alt="" class="w-full h-[418px] hidden mb-8">

                                            <button type="submit"
                                                class="text-white bg-[#00ae73] w-full hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full  px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-[#00ae73] dark:focus:ring-green-800">Tambah</button>
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
