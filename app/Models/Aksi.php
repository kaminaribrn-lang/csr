<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aksi extends Model
{
    use HasFactory;

    public $table = "aksi";

    protected $fillable = [
        'id_kegiatan',
        'program_unggulan_bupati_id',
        'uraian_program_unggulan_bupati_id',
        'nama',
        'target',
        'realisasi_fisik',
        'realisasi_uang',
        'tanggal',
        'kecamatan',
        'desa',
        'nominalpagu',
        'idbidang',
        'idperusahaan',
        'output',
        'deskripsi',
        'lampiran',
        'lokasi',
        'tahun',
        'catatan',
        'status',
        'status_verifikasi',
        'catatan_verifikasi'
    ];

    public function programUnggulan()
    {
        return $this->belongsTo(ProgramUnggulanBupati::class, 'program_unggulan_bupati_id');
    }

    public function uraianProgram()
    {
        return $this->belongsTo(UraianProgramUnggulanBupati::class, 'uraian_program_unggulan_bupati_id');
    }
}
