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
                                            d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                                    </svg>

                                    <span class="mx-2 text-xl font-normal">Registrasi Perusahaan</span>
                                </h2>
                            </div>
                        </div>

                        <div class="flex flex-col mt-3 w-full">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block w-full py-2  md:px-6 lg:px-8">
                                    <div
                                        class="overflow-hidden w-full border border-gray-300 p-3 dark:border-gray-700 md:rounded-lg">

                                        <form action="{{ route('registrasi.update', $data->id) }}" method="POST"
                                            enctype="multipart/form-data" class="text-base font-normal w-full ">

                                            @csrf
                                            @method('PUT')

                                            <div class="grid grid-cols-2 gap-x-6 w-full">

                                                <div class="mb-4">
                                                    <label for="nama" class="block mb-2 dark:text-white">Nama
                                                        Perusahaan</label>
                                                    <input id="nama" name="nama" disabled
                                                        value="{{ $data->nama }}"
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                                        required />
                                                </div>

                                                <div class="mb-4">
                                                    <label for="nama" class="block mb-2 dark:text-white">Nama
                                                        Direktur</label>
                                                    <input id="direktur" name="direktur" disabled
                                                        value="{{ $data->direktur }}"
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                                        required />
                                                </div>

                                                <div class="mb-4">
                                                    <label for="kecamatan"
                                                        class="block mb-2 dark:text-white capitalize">kecamatan</label>
                                                    <input id="kecamatan" name="kecamatan" disabled
                                                        value="{{ $data->kecamatan }}"
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                                        required />
                                                </div>

                                                <div class="mb-4">
                                                    <label for="kelurahan"
                                                        class="block mb-2 dark:text-white capitalize">kelurahan</label>
                                                    <input id="kelurahan" name="kelurahan" disabled
                                                        value="{{ $data->kelurahan }}"
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                                        required />
                                                </div>

                                                <div class="mb-4">
                                                    <label for="alamat"
                                                        class="block mb-2 dark:text-white capitalize">alamat</label>
                                                    <input id="alamat" name="alamat" disabled
                                                        value="{{ $data->alamat }}"
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                                        required />
                                                </div>

                                                <div class="mb-4">
                                                    <label for="kodepos" class="block mb-2 dark:text-white capitalize">kode
                                                        pos</label>
                                                    <input id="kodepos" name="kodepos" disabled
                                                        value="{{ $data->kodepos }}"
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                                        required />
                                                </div>

                                                <div class="mb-4">
                                                    <label for="website"
                                                        class="block mb-2 dark:text-white capitalize">website</label>
                                                    <input id="website" name="website" disabled
                                                        value="{{ $data->website }}"
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                                        required />
                                                </div>

                                                <div class="mb-4">
                                                    <label for="nomorhp" class="block mb-2 dark:text-white capitalize">no
                                                        hp</label>
                                                    <input id="nomorhp" name="nomorhp" disabled
                                                        value="{{ $data->nomorhp }}"
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                                        required />
                                                </div>

                                                <div class="mb-4">
                                                    <label for="email"
                                                        class="block mb-2 dark:text-white capitalize">email</label>
                                                    <input id="email" name="email" disabled
                                                        value="{{ $data->email }}"
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                                        required />
                                                </div>

                                                <div class="mb-4">
                                                    <label for="password"
                                                        class="block mb-2 dark:text-white capitalize">Status</label>
                                                    <label>
                                                        <select id="status" name="status"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option value="diterima">Diterima</option>
                                                            <option value="dikembalikan">Dikembalikan</option>
                                                        </select>
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
                                                class="text-white bg-[#1E40AF] w-full hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg w-full  px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-[#1E40AF] dark:focus:ring-green-800">SIMPAN</button>
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
@endsection
