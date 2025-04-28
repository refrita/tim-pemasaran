<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $table = 'platform';

    protected $fillable = [
        'nama_platform',
        'jenis_platform',
    ];
}
