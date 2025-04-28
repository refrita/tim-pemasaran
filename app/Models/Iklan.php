<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    protected $table = 'iklan';

    protected $fillable = [
        'judul_iklan',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'id_tim_pemasaran',
    ];

    public function timPemasaran()
    {
        return $this->belongsTo(TimPemasaran::class, 'id_tim_pemasaran');
    }
}
