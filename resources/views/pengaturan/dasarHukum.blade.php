@extends('layouts.app')

<title>Dasar Hukum</title>

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
                                        stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                    </svg>

                                    <span class="mx-2 text-xl font-normal">Dasar Hukum</span>
                                </h2>
                            </div>
                            <a href="/pengaturan/tambah-dasar-hukum">
                                <button
                                    class="px-3 py-2 font-black tracking-wide text-sm text-white capitalize transition-colors duration-300 transform bg-[#1E40AF] rounded-lg hover:bg-green-900 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80 flex gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    Dasar Hukum
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
                                                        Lihat
                                                    </th>

                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-bold uppercase text-center rtl:text-right">
                                                        Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                class="bg-white divide-y divide-gray-200  ">
                                                @forelse($datas as $data)
                                                    <tr class="h-full items-center">
                                                        <td class="px-4 py-4 text-sm  ">
                                                            <div>
                                                                {{ $data->nama }}
                                                            </div>
                                                        </td>

                                                        <td class="px-12 py-4 text-sm text-center ">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                                class="w-6 h-6 cursor-pointer">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                            </svg>

                                                        </td>

                                                        <td
                                                            class="my-auto px-4 py-4 text-sm whitespace-nowrap flex gap-3 justify-center">
                                                            <form
                                                                action="{{ route('pengaturanUpdate', 'ubah-dasar-hukum') }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="" value="{{ $data->id }}"
                                                                    id="id" name="id" class="hidden">
                                                                <button type="submit">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor"
                                                                        class="w-5 h-5 cursor-pointer hover:text-orange-700">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                                action="{{ route('pengaturanUpdate', 'hapus-dasar-hukum') }}"
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
