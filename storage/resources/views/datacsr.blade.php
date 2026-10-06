<section class="service-two">
            <div class="container">
                <div class="sec-title-two text-center sec-title-animation animation-style1">
                    <div class="text-3xl text-[#1E40AF]  font-medium  flex justify-between">
                        <p class="">DATA CSR</p>
                    </div>
                    {{-- <p>It’s about telling a story through the message and visuals that get your<br>
                        ideas across to your customers</p> --}}
                    <div class="">
                    </div>
                </div>
                <div class=" flex items-center col-12 hidden " style="margin-right: -10px;">
                    <div class="col-2">
                        Filter
                    </div>
                    <div class="w-100 justify-end flex ">
                        <div class="p-3">
                            <select class="text-dark border-dark  w-100 border" id="dataTahun" name="dataTahun"
                                aria-label="Default select example">
                                <option value="semua">Semua</option>
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                            </select>
                        </div>
                        <div class="p-3">
                            <select class="text-dark border-dark  w-100 border" id="opd" name="opd"
                                aria-label="Default select example">
                                <option value="semua">Semua</option>
                                <option value="skpd">SKPD</option>
                                <option value="lembaga">Lembaga</option>
                                <option value="perorangan">Perorangan</option>
                            </select>
                        </div>
                        {{-- <button name="klik" id="klik">klik</button> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">

                        <table id="tabelsdata" name="tabelsdata"
                            class="display table table-bordered table-striped table-hover " width="100%" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center items-center" rowspan="2">No</th>
                                    <th class="text-center items-center" rowspan="2">Bidang</th>
                                    <th class="text-center items-center" rowspan="2">Program CSR</th>
                                    <th class="text-center items-center" rowspan="2">Perusahaan</th>
                                    <th class="text-center items-center" rowspan="2">Kecamatan</th>
                                    <th class="text-center items-center" rowspan="2">Desa</th>
                                    <th class="text-center items-center" rowspan="2">Target</th>
                                    <th class="text-center items-center" rowspan="1" colspan="2">Realisasi</th>
                                    <!-- <th class="text-center items-center" rowspan="2">Aksi</th> -->
                                </tr>
                                <tr>
                                    <th class="text-center items-center" rowspan="1">Fisik</th>
                                    <th class="text-center items-center" rowspan="1">Uang</th>
                                </tr>
                            </thead>
                            <tbody name="getDataTabel" id="getDataTabel">
                                <?php $no = 0; ?>
                                @foreach ($datax as $item)
                                    <?php    $no += 1; ?>
                                    <tr>
                                        <td>
                                            <div class="text-center">
                                                {{$no}}
                                            </div>
                                        </td>
                                        <td>{{$item->namaBidang}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->namaPerusahaan}}</td>
                                        <td>{{$item->kecamatan}}</td>
                                        <td>{{$item->desa}}</td>
                                        <td class="text-center">{{$item->target}}</td>
                                        <td>{{ number_format(floatVal($item->realisasi_fisik), 0, ',', '.') }}</td>
                                        <td>{{ number_format(floatVal($item->realisasi_uang), 0, ',', '.') }}</td>
                                        <!-- <td><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>
</td> -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>