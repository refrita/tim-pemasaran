<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimPemasaran extends Model
{
    protected $table = 'tim_pemasaran';

    protected $fillable = [
        'nama_anggota',
        'jabatan',
        'nama_pengguna',
        'kata_sandi',
        'id_platform',
        'id_pemasaran',
    ];

    public function setKataSandiAttribute($value)
    {
        $this->attributes['kata_sandi'] = bcrypt($value);
    }
}
