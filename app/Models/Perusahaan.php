<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

     public $table = "perusahaan";

    protected $fillable = [
            'id' ,
            'nama' ,
            'direktur' ,
            'kecamatan' ,
            'kelurahan' ,
            'alamat' ,
            'kodepos' ,
            'website' ,
            'nomorhp' ,
            'status' ,
            'email' ,
            'password' ,
    ];

    public function kegiatans()
    {
        // Pastikan 'id_perusahaan' adalah nama kolom foreign key di tabel kegiatan
        return $this->hasMany(Kegiatan::class, 'idperusahaan');
    }
}
