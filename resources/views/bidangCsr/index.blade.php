@extends('layouts.app')

<title>Bidang CSR</title>

@section('content')
    <div class="container w-full">
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
                                            d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
                                    </svg>

                                    <span class="mx-2 text-xl font-normal">Bidang CSR</span>
                                </h2>
                            </div>
                            <a href="{{ route('bidang-csr.create') }}"
                                class="{{ \Auth::user()->role == 'superadmin' ? '' : ' hidden' }}">
                                <button
                                    class="px-3 py-2 font-black tracking-wide text-sm text-white capitalize transition-colors duration-300 transform bg-[#00ae73] rounded-lg hover:bg-green-900 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80 flex gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    Bidang CSR
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
                                                        Nama
                                                    </th>

                                                    <th scope="col"
                                                        class="px-12 py-3.5 text-sm font-bold uppercase text-center rtl:text-right">
                                                        Deskripsi
                                                    </th>

                                                    {{-- <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-bold uppercase text-center rtl:text-right">
                                                        urut
                                                    </th> --}}

                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-bold uppercase text-center rtl:text-right">
                                                        Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                                @forelse($datas as $data)
                                                    <tr>
                                                        <td class="px-4 py-4 text-sm font-medium ">
                                                            <div>
                                                                <h2
                                                                    class="font-medium text-gray-800 text-left dark:text-white ">
                                                                    {{ $data->nama }}

                                                                </h2>
                                                            </div>
                                                        </td>
                                                        <td class="px-12 py-4 text-sm ">
                                                            {{ $data->deskripsi }}
                                                        </td>
                                                        {{-- <td class="px-4 py-4 text-sm text-center ">
                                                            1
                                                        </td> --}}

                                                        <td class="px-4 py-4 text-sm flex gap-4 justify-center">
                                                            <a href="{{ route('bidang-csr.edit', $data->id) }}"
                                                                class="{{ \Auth::user()->role == 'superadmin' ? '' : ' hidden' }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor"
                                                                    class="w-5 h-5 cursor-pointer hover:text-orange-700">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                </svg>
                                                            </a>
                                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                                action="{{ route('bidang-csr.destroy', $data->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
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
                                                        <td class="px-4 py-4 text-sm font-medium" colspan="4">
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
