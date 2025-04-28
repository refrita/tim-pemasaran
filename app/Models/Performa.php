<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Performa extends Model
{
    protected $table = 'performa';

    protected $fillable = [
        'jumlah_tayang',
        'jumlah_klik',
        'konversi',
        'tanggal',
        'id_iklan',
    ];

    public function iklan()
    {
        return $this->belongsTo(Iklan::class, 'id_iklan');
    }
}
