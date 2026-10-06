<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('wilayah_mahakam_ulu')) {
            Schema::create('wilayah_mahakam_ulu', function (Blueprint $table) {
                $table->id();
                $table->string('provinsi');
                $table->string('kabupaten');
                $table->string('kecamatan');
                $table->string('desa');
                $table->timestamps();

                $table->unique(['kecamatan', 'desa']);
            });
        }

        $rows = [
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Laham', 'desa' => 'Danum Paroy'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Laham', 'desa' => 'Laham'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Laham', 'desa' => 'Long Gelawang'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Laham', 'desa' => 'Nyaribungan'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Laham', 'desa' => 'Muara Ratah'],

            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Apari', 'desa' => 'Long Apari'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Apari', 'desa' => 'Long Kerioq'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Apari', 'desa' => 'Long Penaneh I'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Apari', 'desa' => 'Long Penaneh II'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Apari', 'desa' => 'Long Penaneh III'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Apari', 'desa' => 'Long Tuyoq'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Apari', 'desa' => 'Noha Boan'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Apari', 'desa' => 'Noha Tepo'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Apari', 'desa' => "Tiong Bu'u"],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Apari', 'desa' => 'Tiong Ohang'],

            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Bagun', 'desa' => 'Batoq Kelo'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Bagun', 'desa' => 'Batu Majang'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Bagun', 'desa' => 'Long Bagun Ilir'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Bagun', 'desa' => 'Long Bagun Ulu'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Bagun', 'desa' => 'Long Hurai'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Bagun', 'desa' => 'Long Melaham'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Bagun', 'desa' => 'Long Merah'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Bagun', 'desa' => 'Memahak Besar'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Bagun', 'desa' => 'Memahak Ulu'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Bagun', 'desa' => 'Rukun Damai'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Bagun', 'desa' => 'Ujoh Bilang'],

            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Hubung', 'desa' => 'Datah Bilang Baru'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Hubung', 'desa' => 'Datah Bilang Ilir'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Hubung', 'desa' => 'Datah Bilang Ulu'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Hubung', 'desa' => 'Lirung Ubing'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Hubung', 'desa' => 'Long Hubung'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Hubung', 'desa' => 'Long Hubung Ulu'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Hubung', 'desa' => 'Matalibaq'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Hubung', 'desa' => 'Muara Mohot'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Hubung', 'desa' => 'Muara Rikoq'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Hubung', 'desa' => 'Sirau'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Hubung', 'desa' => 'Tri Pariq Makmur'],

            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Pahangai', 'desa' => 'Datah Nanu'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Pahangai', 'desa' => 'Delang Kerohong'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Pahangai', 'desa' => 'Lirung Agung'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Pahangai', 'desa' => 'Long Lunuk'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Pahangai', 'desa' => 'Long Lunuk Baru'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Pahangai', 'desa' => 'Long Pahangai I'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Pahangai', 'desa' => 'Long Pahangai II'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Pahangai', 'desa' => 'Long Pakaq'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Pahangai', 'desa' => 'Long Pakaq Baru'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Pahangai', 'desa' => 'Long Tuyoq'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Pahangai', 'desa' => 'Noha Silat'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Pahangai', 'desa' => 'Pipui'],
            ['provinsi' => 'Kalimantan Timur', 'kabupaten' => 'Mahakam Ulu', 'kecamatan' => 'Long Pahangai', 'desa' => 'Tiong Bio'],
        ];

        $timestamp = now();
        $rows = array_map(function ($row) use ($timestamp) {
            return array_merge($row, ['created_at' => $timestamp, 'updated_at' => $timestamp]);
        }, $rows);

        foreach ($rows as $row) {
            DB::table('wilayah_mahakam_ulu')->updateOrInsert(
                ['kecamatan' => $row['kecamatan'], 'desa' => $row['desa']],
                $row
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilayah_mahakam_ulu');
    }
};
