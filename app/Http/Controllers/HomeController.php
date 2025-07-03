<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TimPemasaran;
use App\Models\Platform;
use App\Models\Iklan;
use App\Models\Performa;
use App\Models\BiayaPemasaran;

class HomeController extends Controller
{
    public function index()
    {
        $keyword = request('keyword');

        // Hitung jumlah data dengan atau tanpa keyword
        $counts = [
            'timCount' => $this->countWithKeyword(TimPemasaran::class, 'NAMA_ANGGOTA', $keyword),
            'platformCount' => $this->countWithKeyword(Platform::class, 'NAMA', $keyword),
            'iklanCount' => $this->countWithKeyword(Iklan::class, 'NAMA', $keyword),
            'performaCount' => $this->countPerformaWithKeyword($keyword),
            'biayaCount' => $this->countBiayaWithKeyword($keyword)
        ];

        return view('home', array_merge(
            $counts,
            ['keyword' => $keyword]
        ));
    }

    private function countWithKeyword($model, $column, $keyword)
    {
        return $model::when($keyword, function ($query) use ($keyword, $column) {
            $query->where(
                DB::raw('LOWER("'.$column.'")'),
                'LIKE',
                '%' . strtolower($keyword) . '%'
            );
        })->count();
    }

    private function countPerformaWithKeyword($keyword)
    {
        return Performa::when($keyword, function ($query) use ($keyword) {
            $query->where(
                DB::raw('CAST("JUMLAH_TAYANG" AS VARCHAR2(255))'),
                'LIKE',
                '%' . $keyword . '%'
            )
            ->orWhere(
                DB::raw('CAST("JUMLAH_KLIK" AS VARCHAR2(255))'),
                'LIKE',
                '%' . $keyword . '%'
            )
            ->orWhere(
                DB::raw('CAST("KONVERSI" AS VARCHAR2(255))'),
                'LIKE',
                '%' . $keyword . '%'
            );
        })->count();
    }

    private function countBiayaWithKeyword($keyword)
    {
        return BiayaPemasaran::when($keyword, function ($query) use ($keyword) {
            $query->where(
                DB::raw('LOWER("BULAN_BERLAKU")'),
                'LIKE',
                '%' . strtolower($keyword) . '%'
            )
            ->orWhere(
                DB::raw('CAST("TOTAL_ANGGARAN" AS VARCHAR2(255))'),
                'LIKE',
                '%' . $keyword . '%'
            )
            ->orWhere(
                DB::raw('CAST("ANGGARAN_TERSEDIA" AS VARCHAR2(255))'),
                'LIKE',
                '%' . $keyword . '%'
            );
        })->count();
    }
}