<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performa extends Model
{
    use HasFactory;

    protected $table = 'performas'; // gunakan huruf kecil dan plural sesuai konvensi Laravel

    protected $fillable = [
        'jumlah_tayang',
        'jumlah_klik',
        'konversi',
        'tanggal',
        'id_platform',
    ];

    public $timestamps = false;

    // Relasi ke Platform
    public function platform()
    {
        return $this->belongsTo(Platform::class, 'id_platform');
    }
}
