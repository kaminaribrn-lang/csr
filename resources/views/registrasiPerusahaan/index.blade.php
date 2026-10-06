@extends('layouts.app')

<title>Registrasi</title>

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
                                            d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                                    </svg>

                                    <span class="mx-2 text-xl font-normal">Registrasi Perusahaan</span>
                                </h2>
                            </div>
                            <div>
                            </div>
                        </div>

                        <div class="flex flex-col mt-3 w-full">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div
                                        class="overflow-hidden w-full border border-gray-200  md:rounded-lg">

                                        <table class="w-full divide-y divide-gray-200 ">
                                            <thead class="text-white bg-[#1E40AF]">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-12 py-3.5 text-sm font-bold uppercase text-center rtl:text-right">
                                                        Nama
                                                    </th>

                                                    <th scope="col"
                                                        class="px-12 py-3.5 text-sm font-bold uppercase text-center rtl:text-right">
                                                        Direktur
                                                    </th>

                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-bold uppercase text-center rtl:text-right">
                                                        Kecamatan
                                                    </th>

                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-bold uppercase text-center rtl:text-right">
                                                        Website</th>

                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-bold uppercase text-center rtl:text-right">
                                                        Nomor HP</th>

                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-bold uppercase text-center rtl:text-right">
                                                        aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                class="bg-white divide-y divide-gray-200  ">
                                                @forelse($datas as $data)
                                                    <tr>
                                                        <td class="px-4 py-4 text-sm font-medium ">
                                                            <div>
                                                                <h2 class="font-medium text-gray-800  ">
                                                                    {{ $data->nama }}
                                                                </h2>
                                                            </div>
                                                        </td>
                                                        <td class="px-12 py-4 text-sm ">
                                                            {{ $data->direktur }}
                                                        </td>
                                                        <td class="px-4 py-4 text-sm ">
                                                            {{ $data->kecamatan }}
                                                        </td>
                                                        <td class="px-4 py-4 text-sm ">
                                                            {{ $data->website }}
                                                        </td>

                                                        <td class="px-4 py-4 text-sm ">
                                                            {{ $data->nomorhp }}
                                                        </td>

                                                        <td
                                                            class="px-4 py-4 text-sm whitespace-nowrap flex gap-3 justify-center">
                                                            <a href="{{ route('registrasi.edit', $data->id) }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor"
                                                                    class="w-5 h-5 cursor-pointer hover:text-orange-700">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="px-4 py-4 text-sm font-medium" colspan="10">
                                                            <div>
                                                                <h2
                                                                    class="font-medium flex gap-6 text-gray-800 text-center justify-center  ">
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
