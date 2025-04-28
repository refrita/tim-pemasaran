<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiayaPemasaran extends Model
{
    protected $table = 'biaya_pemasaran';

    protected $fillable = [
        'total_anggaran',
        'anggaran_tersedia',
        'bulan_berlaku',
        'status',
    ];
}
