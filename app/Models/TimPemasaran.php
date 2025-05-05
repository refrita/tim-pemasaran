<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimPemasaran extends Model
{
    use HasFactory;

    protected $table = 'TIM_PEMASARANS';
    protected $fillable = [
        'id_biaya_pemasaran',
        'id_platform',
        'nama_anggota',
        'jabatan_anggota',
        'nama_pengguna',
        'kata_sandi',
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
