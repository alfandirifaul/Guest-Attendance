<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'nama',
        'asal_instansi',
        'tujuan',
        'nomor_hp',
        'foto',
    ];
}
