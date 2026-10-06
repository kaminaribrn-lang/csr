@extends('layouts.app')

<title>Program Unggulan Bupati</title>

@section('content')
    <div class="container w-full">
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
                                            d="M9.568 3.082c.636-1.218 2.228-1.218 2.864 0l.844 1.615a1.607 1.607 0 0 0 1.21.84l1.783.259c1.344.195 1.836 1.847.864 2.794l-1.29 1.257a1.607 1.607 0 0 0-.462 1.423l.304 1.775c.23 1.337-1.174 2.408-2.376 1.776l-1.595-.838a1.607 1.607 0 0 0-1.496 0l-1.595.838c-1.202.632-2.606-.439-2.376-1.776l.304-1.775a1.607 1.607 0 0 0-.462-1.423L4.003 8.59c-.972-.947-.48-2.6.864-2.794l1.783-.26a1.607 1.607 0 0 0 1.21-.839l.844-1.615Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75 11.25 15 15 9.75" />
                                    </svg>

                                    <span class="mx-2 text-xl font-normal">Program Unggulan Bupati</span>
                                </h2>
                            </div>
                            <a href="{{ route('program-unggulan-bupati.create') }}"
                                class="{{ \Auth::user()->role == 'superadmin' ? '' : ' hidden' }}">
                                <button
                                    class="px-3 py-2 font-black tracking-wide text-sm text-white capitalize transition-colors duration-300 transform bg-[#1E40AF] rounded-lg hover:bg-green-900 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80 flex gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    Program Unggulan
                                </button>
                            </a>
                        </div>

                        <div class="flex flex-col mt-3 w-full">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div class="overflow-hidden w-full border border-gray-200  md:rounded-lg">
                                        <table class="w-full divide-y divide-gray-200 ">
                                            <thead class="text-white bg-[#1E40AF]">
                                                <tr>
                                                    <th class="px-6 py-3.5 text-sm font-bold uppercase text-left">Nama Program</th>
                                                    <th class="px-6 py-3.5 text-sm font-bold uppercase text-left">Uraian</th>
                                                    <th class="px-4 py-3.5 text-sm font-bold uppercase text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200  ">
                                                @forelse($datas as $data)
                                                    <tr>
                                                        <td class="px-6 py-4 text-sm font-medium text-gray-800 align-top">
                                                            {{ $data->nama }}
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-700 align-top">
                                                            <ol class="list-decimal pl-4 space-y-1">
                                                                @foreach($data->uraians as $uraian)
                                                                    <li>{{ $uraian->uraian }}</li>
                                                                @endforeach
                                                            </ol>
                                                        </td>
                                                        <td class="px-4 py-4 text-sm flex gap-4 justify-center">
                                                            <a href="{{ route('program-unggulan-bupati.edit', $data->id) }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor"
                                                                    class="w-5 h-5 cursor-pointer hover:text-orange-700">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                </svg>
                                                            </a>
                                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                                action="{{ route('program-unggulan-bupati.destroy', $data->id) }}"
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
                                                        <td class="px-4 py-4 text-sm font-medium" colspan="3">
                                                            <div class="font-medium flex gap-6 text-gray-800 text-center justify-center ">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                </svg>
                                                                Data Masih Kosong
                                                            </div>
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