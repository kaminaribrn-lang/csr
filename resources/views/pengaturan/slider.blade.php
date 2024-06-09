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
                                            d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>


                                    <span class="mx-2 text-xl font-normal">Slider</span>
                                </h2>
                            </div>
                            <a href="/pengaturan/tambah-slider">
                                <button
                                    class="px-3 py-2 font-black tracking-wide text-sm text-white capitalize transition-colors duration-300 transform bg-[#00ae73] rounded-lg hover:bg-green-900 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80 flex gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    Slider
                                </button>
                            </a>
                        </div>

                        <div class="flex flex-col mt-3 w-full">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div
                                        class="overflow-hidden w-full border border-gray-200 dark:border-gray-700 md:rounded-lg">

                                        <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                                            <thead class="text-white bg-[#00ae73]">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-12 py-3.5 text-sm font-bold uppercase text-center rtl:text-right">
                                                        Slider
                                                    </th>

                                                    {{-- <th scope="col"
                                                        class="px-12 py-3.5 text-sm font-bold uppercase text-center rtl:text-right">
                                                        Link
                                                    </th>

                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-bold uppercase text-center rtl:text-right">
                                                        Deskripsi
                                                    </th> --}}

                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-bold uppercase text-center rtl:text-right">
                                                        Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                                @forelse($datas as $data)
                                                    <tr class="h-full items-center">
                                                        <td class="px-4 py-4 text-sm font-medium ">
                                                            <div>
                                                                <img src="/slider/{{ $data->slider }}" class="roudend">
                                                                </img>
                                                            </div>
                                                        </td>
                                                        {{-- <td class="px-12 py-4 text-sm text-center ">
                                                            {{ $data->link }}
                                                        </td>
                                                        <td class="px-4 py-4 text-sm text-center ">
                                                            {{ $data->deskripsi }}
                                                        </td> --}}

                                                        <td
                                                            class="my-auto px-4 py-4 text-sm whitespace-nowrap flex gap-3 justify-center">
                                                            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                                class="w-5 h-5 cursor-pointer hover:text-orange-700">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                            </svg> --}}
                                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                                action="{{ route('pengaturanUpdate', 'hapus-slide') }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="" value="{{ $data->id }}"
                                                                    id="id" name="id" class="hidden">
                                                                <button type="submit">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor"
                                                                        class="w-5 h-5 cursor-pointer hover:text-red-700">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                    </svg>
                                                                </button>
                                                            </form>

                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="px-4 py-4 text-sm font-medium" colspan="10">
                                                            <div>
                                                                <h2
                                                                    class="font-medium flex gap-6 text-gray-800 text-center justify-center dark:text-white ">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor" class="w-6 h-6">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                    </svg>
                                                                    Data Masih Kosong
                                                                </h2>
                                                            </div>
                                                        </td>

                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>

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
