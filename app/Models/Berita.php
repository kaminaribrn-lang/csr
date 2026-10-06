<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $table = 'beritas';

    protected $fillable = [
        'headline',
        'gambar',
        'berita',
        'tanggal',
        'hastag',
        'kategori',
        'dilihat',
        'status',
        'penulis',
        'slug'
    ];

    protected static function booted()
    {
        static::creating(function ($berita) {
            $berita->slug = Str::slug($berita->headline);
            $berita->dilihat = 0;
        });
    }
}