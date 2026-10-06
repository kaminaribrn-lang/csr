<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    public $table = "kegiatan";

    protected $fillable = [
            'nama' ,
            'nominalpagu' ,
            'idbidang' ,
            'idperusahaan' ,
            'output' ,
            'deskripsi' ,
            'lampiran' ,
            'lokasi' ,
            'tahun' ,
            'catatan' ,
            'status' ,
    ];

    public function perusahaan() {
        // 'id_perusahaan' adalah kolom di tabel kegiatan yang merujuk ke id di tabel perusahaan
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }
    
    public function bidang()
{
    // Parameter kedua adalah Foreign Key di tabel kegiatan
    return $this->belongsTo(BidangCsr::class, 'id_bidang');
}

}
