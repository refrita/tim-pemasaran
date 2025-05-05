<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performa extends Model
{
    use HasFactory;

    protected $table = 'PERFORMAS'; // sesuaikan nama tabel jika pakai plural
    protected $fillable = ['jumlah_tayang', 'jumlah_klik', 'konversi', 'tanggal',];

    protected $primaryKey = 'id'; // default sudah 'id', tapi eksplisit tetap bisa

    public $incrementing = true; // ID auto increment (default), bisa false jika pakai UUID
    protected $keyType = 'int'; // default juga 'int', tapi eksplisit

    public $timestamps = false;

    // Method tambahan seperti di Pelanggan
    public static function getAll()
    {
        return self::all();
    }

    public static function find($id)
    {
        return self::where('id', $id)->first();
    }
}
