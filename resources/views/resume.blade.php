@extends('layouts.app')

<title>Resume</title>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card flex gap-4">

                <a class="flex items-center px-3 py-3 text-white transition-colors duration-300 transform rounded-lg  bg-[#00ae73] "
                    href="/resume-keg">


                    <span class="mx-2 text-sm font-medium">KEGIATAN</span>
                </a>
                <a class="flex items-center px-3 py-3 text-white transition-colors duration-300 transform rounded-lg  bg-[#00ae73] "
                    href="/resume-per">


                    <span class="mx-2 text-sm font-medium">PERUSAHAAN</span>
                </a>
                <a class="flex items-center px-3 py-3 text-white transition-colors duration-300 transform rounded-lg  bg-[#00ae73] "
                    href="/resume-bid">


                    <span class="mx-2 text-sm font-medium">BIDANG CSR</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection