<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidangcsr extends Model
{
    use HasFactory;

     public $table = "bidangcsr";

    protected $fillable = [
            'nama' ,
            'urut' ,
            'deskripsi' ,
    ];
}
