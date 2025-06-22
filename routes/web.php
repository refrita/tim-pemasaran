<?php

use Illuminate\Support\Facades\Route;
use App\Models\TimPemasaran;
use App\Models\Platform;
use App\Models\Iklan;
use App\Models\Performa;
use App\Models\BiayaPemasaran;

Route::get('/', function () {
    // Ambil keyword dari query string (?keyword=…)
    $keyword = request('keyword');

    // 1. Hitung jumlah TimPemasaran apabila nama anggota (NAMA_ANGGOTA) mengandung keyword
    $timCount = TimPemasaran::when($keyword, function ($query) use ($keyword) {
        $query->where(
            DB::raw('LOWER("NAMA_ANGGOTA")'),
            'LIKE',
            '%' . strtolower($keyword) . '%'
        );
    })->count();

    // 2. Hitung jumlah Platform apabila nama platform (NAMA) mengandung keyword
    $platformCount = Platform::when($keyword, function ($query) use ($keyword) {
        $query->where(
            DB::raw('LOWER("NAMA")'),
            'LIKE',
            '%' . strtolower($keyword) . '%'
        );
    })->count();

    // 3. Hitung jumlah Iklan apabila nama iklan (NAMA) mengandung keyword
    $iklanCount = Iklan::when($keyword, function ($query) use ($keyword) {
        $query->where(
            DB::raw('LOWER("NAMA")'),
            'LIKE',
            '%' . strtolower($keyword) . '%'
        );
    })->count();

    // 4. Hitung jumlah Performa apabila jumlah tayang, klik, atau konversi mengandung keyword
    //    (karena Performa Anda punya kolom JUMLAH_TAYANG, JUMLAH_KLIK, KONVERSI, TANGGAL)
    $performaCount = Performa::when($keyword, function ($query) use ($keyword) {
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

    // 5. Hitung jumlah BiayaPemasaran apabila bulan berlaku (BULAN_BERLAKU), total anggaran, atau anggaran tersedia mengandung keyword
    $biayaCount = BiayaPemasaran::when($keyword, function ($query) use ($keyword) {
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

    return view('home', compact(
        'timCount',
        'platformCount',
        'iklanCount',
        'performaCount',
        'biayaCount',
        'keyword'
    ));
})->name('home.index');

Route::get('/pendaftaran-anggotatim', function () {
    return 'Selamat datang di halaman Pendaftaran Akun Anggota Tim Pemasaran';
})->middleware('check.age');

// Tim Pemasaran
use App\Http\Controllers\TimPemasaranController;
Route::get('/tim-pemasaran', [TimPemasaranController::class, 'index'])->name('tim-pemasaran.index');
Route::get('/tim-pemasaran/create', [TimPemasaranController::class, 'create'])->name('tim-pemasaran.create');
Route::post('/tim-pemasaran', [TimPemasaranController::class, 'store'])->name('tim-pemasaran.store');
Route::get('/tim-pemasaran/{id}', [TimPemasaranController::class, 'show'])->name('tim-pemasaran.show');
Route::get('/tim-pemasaran/{id}/edit', [TimPemasaranController::class, 'edit'])->name('tim-pemasaran.edit');
Route::put('/tim-pemasaran/{id}', [TimPemasaranController::class, 'update'])->name('tim-pemasaran.update');
Route::get('/tim-pemasaran/{id}/delete', [TimPemasaranController::class, 'delete'])->name('tim-pemasaran.delete');
Route::delete('/tim-pemasaran/{id}', [TimPemasaranController::class, 'destroy'])->name('tim-pemasaran.destroy');
Route::get('/tim-pemasaran/error-a/{id}', [TimPemasaranController::class, 'showErrorA']);
Route::get('/tim-pemasaran/error-b/{id}', [TimPemasaranController::class, 'showErrorB']);
Route::get('/tim-pemasaran/cari/{nama}', [TimPemasaranController::class, 'searchByNama']);

// Platform
use App\Http\Controllers\PlatformController;
Route::get('/platform', [PlatformController::class, 'index'])->name('platform.index');
Route::get('/platform/create', [PlatformController::class, 'create'])->name('platform.create');
Route::post('/platform', [PlatformController::class, 'store'])->name('platform.store');
Route::get('/platform/{id}', [PlatformController::class, 'show'])->name('platform.show');
Route::get('/platform/{id}/edit', [PlatformController::class, 'edit'])->name('platform.edit');
Route::put('/platform/{id}', [PlatformController::class, 'update'])->name('platform.update');
Route::get('/platform/{id}/delete', [PlatformController::class, 'delete'])->name('platform.delete');
Route::delete('/platform/{id}', [PlatformController::class, 'destroy'])->name('platform.destroy');
Route::get('/platform/error-a/{id}', [PlatformController::class, 'showErrorA']);      // findOrFail
Route::get('/platform/error-b/{id}', [PlatformController::class, 'showErrorB']);      // try-catch
Route::get('/platform/cari/{nama}',   [PlatformController::class, 'searchByNama']);   // firstOrFail

// Biaya Pemasaran
use App\Http\Controllers\BiayaPemasaranController;
Route::get('/biaya-pemasaran', [BiayaPemasaranController::class, 'index'])->name('biaya-pemasaran.index');
Route::get('/biaya-pemasaran/create', [BiayaPemasaranController::class, 'create'])->name('biaya-pemasaran.create');
Route::post('/biaya-pemasaran', [BiayaPemasaranController::class, 'store'])->name('biaya-pemasaran.store');
Route::get('/biaya-pemasaran/{id}', [BiayaPemasaranController::class, 'show'])->name('biaya-pemasaran.show');
Route::get('/biaya-pemasaran/{id}/edit', [BiayaPemasaranController::class, 'edit'])->name('biaya-pemasaran.edit');
Route::put('/biaya-pemasaran/{id}', [BiayaPemasaranController::class, 'update'])->name('biaya-pemasaran.update');
Route::get('/biaya-pemasaran/{id}/delete', [BiayaPemasaranController::class, 'delete'])->name('biaya-pemasaran.delete');
Route::delete('/biaya-pemasaran/{id}', [BiayaPemasaranController::class, 'destroy'])->name('biaya-pemasaran.destroy');
Route::get('/biaya/error-a/{id}', [BiayaPemasaranController::class, 'showErrorA']);         // findOrFail
Route::get('/biaya/error-b/{id}', [BiayaPemasaranController::class, 'showErrorB']);         // try-catch
Route::get('/biaya/cari-status/{status}', [BiayaPemasaranController::class, 'searchByStatus']); // firstOrFail

// Performa
use App\Http\Controllers\PerformaController;
Route::get('/performa', [PerformaController::class, 'index'])->name('performa.index');
Route::get('/performa/create', [PerformaController::class, 'create'])->name('performa.create');
Route::post('/performa', [PerformaController::class, 'store'])->name('performa.store');
Route::get('/performa/{id}', [PerformaController::class, 'show'])->name('performa.show');
Route::get('/performa/{id}/edit', [PerformaController::class, 'edit'])->name('performa.edit');
Route::put('/performa/{id}', [PerformaController::class, 'update'])->name('performa.update');
Route::get('/performa/{id}/delete', [PerformaController::class, 'delete'])->name('performa.delete');
Route::delete('/performa/{id}', [PerformaController::class, 'destroy'])->name('performa.destroy');
Route::get('/performa/error-a/{id}', [PerformaController::class, 'showErrorA']);         // findOrFail
Route::get('/performa/error-b/{id}', [PerformaController::class, 'showErrorB']);         // try-catch
Route::get('/performa/cari-konversi/{konversi}', [PerformaController::class, 'searchByKonversi']); // firstOrFail


// Iklan
use App\Http\Controllers\IklanController;
Route::get('/iklan', [IklanController::class, 'index'])->name('iklan.index');
Route::get('/iklan/create', [IklanController::class, 'create'])->name('iklan.create');
Route::post('/iklan', [IklanController::class, 'store'])->name('iklan.store');
Route::get('/iklan/{id}', [IklanController::class, 'show'])->name('iklan.show');
Route::get('/iklan/{id}/edit', [IklanController::class, 'edit'])->name('iklan.edit');
Route::put('/iklan/{id}', [IklanController::class, 'update'])->name('iklan.update');
Route::get('/iklan/{id}/delete', [IklanController::class, 'delete'])->name('iklan.delete');
Route::delete('/iklan/{id}', [IklanController::class, 'destroy'])->name('iklan.destroy');
Route::get('/iklan/error-a/{id}', [IklanController::class, 'showErrorA']);      // findOrFail biasa
Route::get('/iklan/error-b/{id}', [IklanController::class, 'showErrorB']);      // try-catch
Route::get('/iklan/cari/{nama}',    [IklanController::class, 'searchByNama']);  // firstOrFail

use App\Http\Controllers\ImageController;
Route::get('/upload', [ImageController::class, 'create']);
Route::post('/upload', [ImageController::class, 'store'])->name('image.upload');
Route::delete('/upload/{id}', [ImageController::class, 'destroy'])->name('image.destroy');
