<?php

namespace App\Http\Controllers;

use App\Models\Dasarhukum;
use App\Models\Bidangcsr;
use App\Models\Kegiatan;
use App\Models\Perusahaan;
use App\Models\Slider;
use App\Models\Informasi;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function welcome(){

        if (array_key_exists("tahun", $_GET)){

        } else {
            return redirect('/?tahun='.date('Y'));
        }

        $bidangCsr = Bidangcsr::get();
        $slider = Slider::get();
        $dasarhukum = Dasarhukum::get();
        $tentang = Informasi::where('nama','=','tentang')->get();
        $tentang = $tentang[0];
        $nominalpagu = Kegiatan::where('status','=','tayang')->get()->sum('nominalpagu');
        $totalkegiatan = Kegiatan::where('status','=','tayang')->get()->count();
        $totalperusahaan = Perusahaan::where('status','=','diterima')->get()->count();

        return view('welcome', compact('bidangCsr','nominalpagu','totalkegiatan','totalperusahaan','dasarhukum','slider','tentang'));
    }
}
