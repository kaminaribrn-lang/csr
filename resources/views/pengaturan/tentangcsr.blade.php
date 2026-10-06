@extends('layouts.app')

<title>Kegiatan</title>

@section('content')
    <div class="container w-full ">
        <div class="row justify-content-center w-full mb-10">
            <div class="col-md-8">
                <div class="card">
                    <section class="container px-4 mx-auto">
                        <div class="w-full flex justify-between mt-6">
                            <div class="">
                                <h2 class="text-lg font-medium text-gray-800  flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.2" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                    </svg>



                                    <span class="mx-2 text-xl font-normal">Tentang CSR</span>
                                </h2>
                            </div>
                            <a href="{{ route('kegiatan.create') }}"
                                class="{{ \Auth::user()->role == 'perusahaan' ? '' : ' hidden' }}">
                                <button
                                    class="px-3 py-2 font-black tracking-wide text-sm text-white capitalize transition-colors duration-300 transform bg-[#1E40AF] rounded-lg hover:bg-green-900 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80 flex gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    Kegiatan
                                </button>
                            </a>
                        </div>

                        <div class="flex flex-col mt-3 w-full">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div
                                        class="overflow-hidden w-full p-6 border border-gray-200  md:rounded-lg">
                                        <form
                                            action="{{ route('pengaturanUpdate', last(request()->segments()), $data->id) }}"
                                            method="POST" enctype="multipart/form-data"
                                            class="text-base font-normal w-full ">

                                            @csrf
                                            @method('PUT')

                                            <div class=" gap-x-6 w-full">
                                                <input type="text" class="hidden" id="id" name="id"
                                                    value="{{ $data->id }}">
                                                <div class="mb-4">
                                                    <label for="nama" class="block mb-2 ">Tentang
                                                        CSR</label>
                                                    <textarea id="deskripsi" name="deskripsi" rows="5"
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                                                        required>{{ $data->deskripsi }} </textarea>
                                                </div>


                                            </div>
                                            <button type="submit"
                                                class="text-white bg-[#1E40AF] w-full hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg w-full  px-5 py-2.5 text-center   ">SIMPAN</button>
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
