<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    use HasFactory;

    protected $table = 'iklans'; // gunakan huruf kecil dan plural sesuai konvensi Laravel

    protected $fillable = [
        'id_biaya_pemasaran',
        'id_platform',
        'nama',
        'kategori',
        'tanggal_peluncuran',
        'tanggal_selesai',
    ];

    public $timestamps = false;

    // Relasi ke BiayaPemasaran
    public function biayaPemasaran()
    {
        return $this->belongsTo(BiayaPemasaran::class, 'id_biaya_pemasaran');
    }

    // Relasi ke Platform
    public function platform()
    {
        return $this->belongsTo(Platform::class, 'id_platform');
    }
}
