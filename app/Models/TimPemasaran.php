<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimPemasaran extends Model
{
    use HasFactory;

    protected $table = 'tim_pemasarans'; // gunakan huruf kecil dan plural sesuai konvensi Laravel

    protected $fillable = [
        'id_biaya_pemasaran',
        'id_platform',
        'nama_anggota',
        'jabatan_anggota',
        'nama_pengguna',
        'kata_sandi',
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
