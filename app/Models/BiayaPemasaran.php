<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaPemasaran extends Model
{
    use HasFactory;

    protected $table = 'BIAYA_PEMASARANS';
    protected $fillable = [
        'total_anggaran',
        'anggaran_tersedia',
        'bulan_berlaku',
        'status',
    ];

    protected $primaryKey = 'id';

    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = false;

    public static function getAll()
    {
        return self::all();
    }

    public static function find($id)
    {
        return self::where('id', $id)->first();
    }
}
