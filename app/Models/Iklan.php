<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    use HasFactory;

    protected $table = 'IKLANS'; // sesuaikan jika tabel pakai plural

    protected $fillable = [
        'id_biaya_pemasaran',
        'id_platform',
        'nama',
        'kategori',
        'tanggal_peluncuran',
        'tanggal_selesai',
    ];

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    // Method tambahan
    public static function getAll()
    {
        return self::all();
    }

    public static function find($id)
    {
        return self::where('id', $id)->first();
    }
}
