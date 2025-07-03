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
        'status'
    ];

    protected $casts = [
        'bulan_berlaku' => 'date:Y-m-d',
        'total_anggaran' => 'integer',
        'anggaran_tersedia' => 'integer'
    ];

    public function biayaPemasaran()
    {
        return $this->belongsTo(BiayaPemasaran::class, 'id_biaya_pemasaran');
    }
    
    public function platform()
    {
        return $this->belongsTo(Platform::class, 'id_platform');
    }

    // Accessor untuk format tampilan
    public function getTotalAnggaranFormattedAttribute()
    {
        return 'Rp ' . number_format($this->total_anggaran, 0, ',', '.');
    }

    public function getAnggaranTersediaFormattedAttribute()
    {
        return 'Rp ' . number_format($this->anggaran_tersedia, 0, ',', '.');
    }

    public function getDisplayAttribute()
    {
        return sprintf("Rp %s - %s", 
            number_format($this->total_anggaran, 0, ',', '.'),
            $this->bulan_berlaku->format('F Y')
        );
    }

    // Validasi custom sebelum menyimpan
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if ($model->anggaran_tersedia > $model->total_anggaran) {
                throw new \Exception('Anggaran tersedia tidak boleh melebihi total anggaran');
            }
        });
    }
}