@extends('layouts.app')

<title>Kata Sandi</title>

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



                                    <span class="mx-2 text-xl font-normal">Kata Sandi</span>
                                </h2>
                            </div>
                        </div>

                        <div class="flex flex-col mt-3 w-full">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div
                                        class="overflow-hidden w-full p-6 border border-gray-200  md:rounded-lg">
                                        <form action="{{ route('pengaturanUpdate', last(request()->segments()), '1') }}"
                                            method="POST" enctype="multipart/form-data"
                                            class="text-base font-normal w-full ">

                                            @csrf
                                            @method('PUT')

                                            <div class=" gap-x-6 w-full">
                                                <div class="mb-4">

                                                    <div class="flex gap-2">
                                                        <label for="lampiran"
                                                            class="block mb-2  capitalize">Kata Sandi</label>
                                                        <label for="text-sm">( hanya diisi jika ingin mengubah file
                                                            )</label>
                                                    </div>
                                                    <input id="password" name="password"
                                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5      "
                                                        required>
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
