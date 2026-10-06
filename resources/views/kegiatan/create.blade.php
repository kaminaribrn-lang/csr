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
                                            d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                    </svg>

                                    <span class="mx-2 text-xl font-normal">Kegiatan</span>
                                </h2>
                            </div>
                            <div>
                                <span class="mx-2 text-xl font-normal">Tambah Kegiatan</span>
                            </div>
                        </div>

                        <div class="flex flex-col mt-3 w-full">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block w-full py-2  md:px-6 lg:px-8">
                                    <div
                                        class="overflow-hidden w-full border border-gray-300 p-3  md:rounded-lg">

                                        <form action="{{ route('kegiatan.store') }}" method="POST"
                                            enctype="multipart/form-data" class="text-base font-normal w-full ">

                                            @csrf
                                            <div class="space-y-5 w-full">
                                                @if (\Auth::user()->role == 'superadmin')
                                                    <div class="mb-4">
                                                        <label for="perusahaan"
                                                            class="block mb-2  capitalize">Perusahaan</label>
                                                        <select id="perusahaan" name="perusahaan" required
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      ">
                                                            @forelse($perusahaan as $item)
                                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                @elseif($company)
                                                    <div class="mb-4">
                                                        <label class="block mb-2  capitalize">Perusahaan</label>
                                                        <input value="{{ $company->nama }}" disabled
                                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5   " />
                                                    </div>
                                                @endif

                                                <div class="mb-4">
                                                    <label for="nama" class="block mb-2 ">Nama Kegiatan</label>
                                                    <input id="nama" name="nama"
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                                                        required />
                                                </div>

                                                <div class="mb-4">
                                                    <label for="deskripsi" class="block mb-2  capitalize">Uraian Kegiatan</label>
                                                    <textarea id="deskripsi" name="deskripsi" rows="5"
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                                                        required></textarea>
                                                </div>

                                                <div class="rounded-lg border border-blue-100 bg-blue-50 px-4 py-3 text-sm text-blue-900">
                                                    Detail pelaksanaan tidak diisi di form kegiatan. Setelah kegiatan disimpan, rincian tindakan dimasukkan melalui menu aksi di halaman detail kegiatan.
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