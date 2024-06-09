@extends('layouts.app')

<title>Kegiatan</title>

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
                                        class="overflow-hidden w-full border border-gray-300 p-3 dark:border-gray-700 md:rounded-lg">

                                        <form action="{{ route('kegiatan.update', $data->id) }}" method="POST"
                                            enctype="multipart/form-data" class="text-base font-normal w-full ">

                                            @csrf
                                            @method('PUT')

                                            <div class="grid grid-cols-2 gap-x-6 w-full">

                                                <div class="mb-4">
                                                    <label for="kelurahan"
                                                        class="block mb-2 dark:text-white capitalize">Bidang</label>
                                                    <select id="idbidang" name="idbidang"
                                                        {{ \Auth::user()->role == 'superadmin' ? 'disabled' : 'enabled' }}
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        @forelse($bidangs as $bidang)
                                                            <option {{ $data->idbidang == $bidang->id ? 'selected' : '' }}
                                                                value="{{ $bidang->id }}">{{ $bidang->nama }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>

                                                <div class="mb-4">
                                                    <label for="nama" class="block mb-2 dark:text-white">Nama
                                                        Kegiatan</label>
                                                    <input id="nama" name="nama"
                                                        {{ \Auth::user()->role == 'superadmin' ? 'disabled' : 'enabled' }}
                                                        value="{{ $data->nama }}"
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                                        required />
                                                </div>

                                                <div class="mb-4">
                                                    <label for="tahun"
                                                        class="block mb-2 dark:text-white capitalize">tahun</label>
                                                    <select id="tahun" name="tahun"
                                                        {{ \Auth::user()->role == 'superadmin' ? 'disabled' : 'enabled' }}
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option {{ $data->tahun == 2021 ? 'selected' : '' }} value="2021">
                                                            2021</option>
                                                        <option {{ $data->tahun == 2022 ? 'selected' : '' }} value="2022">
                                                            2022</option>
                                                        <option {{ $data->tahun == 2023 ? 'selected' : '' }}
                                                            value="2023">
                                                            2023</option>
                                                        <option {{ $data->tahun == 2024 ? 'selected' : '' }}
                                                            value="2024">
                                                            2024</option>
                                                    </select>
                                                </div>

                                                <div class="mb-4">
                                                    <label for="nama" class="block mb-2 dark:text-white">Nominal
                                                        Pagu</label>
                                                    <div class="relative ">
                                                        <div
                                                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                                            Rp.
                                                        </div>
                                                        <input id="nominalpagu" name="nominalpagu" type=""
                                                            {{ \Auth::user()->role == 'superadmin' ? 'disabled' : 'enabled' }}
                                                            value="{{ number_format($data->nominalpagu, 2) }}" return
                                                            hanyaAngka(event)
                                                            class="bg-gray-50 border text-right border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                                            required />

                                                    </div>
                                                </div>

                                                <div class="mb-4">
                                                    <label for="" class="block mb-2 dark:text-white capitalize">nama
                                                        perusahaan</label>
                                                    <input id="idperusahaan" name="idperusahaan"
                                                        value="{{ \Auth::user()->id }}" class="hidden" required />
                                                    <input id="" name=""
                                                        value="{{ $data->namaPerusahaan }}" disabled
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                                        required />
                                                </div>

                                                <div class="mb-4">
                                                    <label for="output"
                                                        class="block mb-2 dark:text-white capitalize">output</label>
                                                    <input id="output" name="output" value="{{ $data->output }}"
                                                        {{ \Auth::user()->role == 'superadmin' ? 'disabled' : 'enabled' }}
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                                        required />
                                                </div>

                                                <div class="mb-4">
                                                    <label for="deskripsi"
                                                        class="block mb-2 dark:text-white capitalize">deskripsi</label>
                                                    <input id="deskripsi" name="deskripsi" value="{{ $data->deskripsi }}"
                                                        {{ \Auth::user()->role == 'superadmin' ? 'disabled' : 'enabled' }}
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                                        required />
                                                </div>

                                                <div class="mb-4">
                                                    <label for="lokasi"
                                                        class="block mb-2 dark:text-white capitalize">lokasi</label>
                                                    <input id="lokasi" name="lokasi" value="{{ $data->lokasi }}"
                                                        {{ \Auth::user()->role == 'superadmin' ? 'disabled' : 'enabled' }}
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                                        required />
                                                </div>

                                                <div class="mb-4">
                                                    <label for="catatan"
                                                        class="block mb-2 dark:text-white capitalize">catatan</label>
                                                    <input id="catatan" name="catatan" value="{{ $data->catatan }}"
                                                        {{ \Auth::user()->role == 'superadmin' ? 'disabled' : 'enabled' }}
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                                        required />
                                                </div>

                                                <div class="mb-4 flex gap-4">
                                                    <div class="flex flex-col justify-between w-1/6">
                                                        <label for="lampiran"
                                                            class="block mb-2 dark:text-white capitalize">lampiran</label>
                                                        <a type="submit"
                                                            class="text-white bg-[#00ae73] cursor-pointer w-full hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full  px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-[#00ae73] dark:focus:ring-green-800">Lihat</a>
                                                    </div>
                                                    <div class="flex flex-col justify-between w-full">
                                                        <label for="lampiran"
                                                            class="block mb-2 dark:text-white capitalize">Status</label>
                                                        <select id="status" name="status"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option {{ $data->status == 'tayang' ? 'selected' : '' }}
                                                                value="tayang">Tayang
                                                            </option>
                                                            <option {{ $data->status == 'tidaktayang' ? 'selected' : '' }}
                                                                value="tidaktayang">Tidak Tayang
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                {{-- <div class="mb-4">
                                                        <label for="password"
                                                            class="block mb-2  dark:text-white">Urutan</label>
                                                        <input type="number" id="urutan" name="urutan"
                                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                                            required />
                                                    </div> --}}

                                            </div>
                                            <button type="submit"
                                                class="text-white bg-[#00ae73] w-full hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full  px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-[#00ae73] dark:focus:ring-green-800">SIMPAN</button>
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
    </script>
@endsection
