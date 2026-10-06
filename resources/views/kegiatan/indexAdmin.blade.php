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
                                <h2 class="text-lg font-medium text-gray-800  flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.2" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                    </svg>

                                    <span class="mx-2 text-xl font-normal">Kegiatan/Aksi</span>
                                </h2>
                            </div>
                            <a href="{{ route('kegiatan.create') }}"
                                class="{{ \Auth::user()->role == 'perusahaan' ? '' : '' }}">
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
                                                        Perusahaan
                                                    </th>

                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-bold uppercase text-center rtl:text-right">
                                                        Uraian
                                                    </th>

                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-bold uppercase text-center rtl:text-right">
                                                        Total Pagu</th>

                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-bold uppercase text-center rtl:text-right">
                                                        Alat</th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                class="bg-white divide-y divide-gray-200  ">
                                                @forelse($datas as $data)
                                                    <tr>
                                                        <td class="px-4 py-4 text-sm font-medium ">
                                                            <div>
                                                                <h2
                                                                    class="font-medium text-gray-800  capitalize">
                                                                    {{ $data->nama }}
                                                                </h2>
                                                            </div>
                                                        </td>
                                                        <td class="px-12 py-4 text-sm text-center ">
                                                            {{ $data->namaPerusahaan ?? '-' }}
                                                        </td>
                                                        <td class="px-4 py-4 text-sm text-center ">
                                                            {{ $data->deskripsi }}
                                                        </td>

                                                        <td class="px-4 py-4 text-sm">
                                                            <div class="flex justify-strech">
                                                                <div>Rp.</div>
                                                                <div class="w-full text-right">
                                                                    {{ number_format($data->nominalpagu, 2) }}</div>
                                                            </div>
                                                        </td>

                                                        <td class="px-4 py-4 text-sm text-center ">
                                                            <a href="{{ route('kegiatan.edit', $data->id) }}">
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
                                                        <td class="px-4 py-4 text-sm font-medium" colspan="5">
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
