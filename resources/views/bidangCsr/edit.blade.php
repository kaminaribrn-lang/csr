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
                                <h2 class="text-lg font-medium text-gray-800  flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.2" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
                                    </svg>

                                    <span class="mx-2 text-xl font-normal">Bidang CSR</span>
                                </h2>
                            </div>
                            <div>
                                <span class="mx-2 text-xl font-normal">Tambah Bidang CSR</span>
                            </div>
                        </div>

                        <div class="flex flex-col mt-3 w-full">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block w-full py-2  md:px-6 lg:px-8">
                                    <div
                                        class="overflow-hidden w-full border border-gray-300 p-3  md:rounded-lg">



                                        <form action="{{ route('bidang-csr.update', $data->id) }}" method="POST"
                                            enctype="multipart/form-data" class="text-base font-normal w-full ">

                                            @csrf
                                            @method('PUT')

                                            <div class="grid grid-cols-2 gap-6 w-full">
                                                <div>
                                                    <div class="mb-5">
                                                        <label for="nama" class="block mb-2 ">Nama
                                                            Bidang</label>
                                                        <input id="nama" name="nama" value="{{ $data->nama }}"
                                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                                                            required />
                                                    </div>
                                                    {{-- <div class="mb-5">
                                                        <label for="password"
                                                            class="block mb-2  ">Urutan</label>
                                                        <input type="number" id="urutan" name="urutan"
                                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                                                            required />
                                                    </div> --}}
                                                </div>
                                                <div>
                                                    <div class="mb-5">
                                                        <label for="password"
                                                            class="block mb-2  ">Deskripsi</label>
                                                        <textarea id="deskripsi" name="deskripsi" rows="3"
                                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                                                            required>{{ $data->deskripsi }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="text-white bg-[#1E40AF] w-full hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full  px-5 py-2.5 text-center   ">Tambah</button>
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
