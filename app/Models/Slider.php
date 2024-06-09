<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    public $table = "slider";

    protected $fillable = [
            'id' ,
            'slider' ,
            'link' ,
            'kecamatan' ,
            'deskripsi' ,
    ];
}
