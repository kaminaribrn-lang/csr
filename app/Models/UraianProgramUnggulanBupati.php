<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UraianProgramUnggulanBupati extends Model
{
    use HasFactory;

    protected $table = 'uraian_program_unggulan_bupati';

    protected $fillable = [
        'program_unggulan_bupati_id',
        'uraian',
    ];

    public function program()
    {
        return $this->belongsTo(\App\Models\ProgramUnggulanBupati::class, 'program_unggulan_bupati_id');
    }
}