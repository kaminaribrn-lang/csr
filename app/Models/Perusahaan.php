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
}
