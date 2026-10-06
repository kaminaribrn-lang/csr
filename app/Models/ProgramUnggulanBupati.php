<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramUnggulanBupati extends Model
{
    use HasFactory;

    protected $table = 'program_unggulan_bupati';

    protected $fillable = [
        'nama',
    ];

    public function uraians()
    {
        return $this->hasMany(UraianProgramUnggulanBupati::class, 'program_unggulan_bupati_id');
    }
}