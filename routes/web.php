<?php

use Illuminate\Support\Facades\Route;
Route::view('/', 'home')->name('home.index');

use App\Http\Controllers\TimPemasaranController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\BiayaPemasaranController;
use App\Http\Controllers\PerformaController;
use App\Http\Controllers\IklanController;


// Tim Pemasaran
Route::get('/tim-pemasaran', [TimPemasaranController::class, 'index'])->name('tim-pemasaran.index');
Route::get('/tim-pemasaran/create', [TimPemasaranController::class, 'create'])->name('tim-pemasaran.create');
Route::post('/tim-pemasaran', [TimPemasaranController::class, 'store'])->name('tim-pemasaran.store');
Route::get('/tim-pemasaran/{id}', [TimPemasaranController::class, 'show'])->name('tim-pemasaran.show');
Route::get('/tim-pemasaran/{id}/edit', [TimPemasaranController::class, 'edit'])->name('tim-pemasaran.edit');
Route::put('/tim-pemasaran/{id}', [TimPemasaranController::class, 'update'])->name('tim-pemasaran.update');
Route::get('/tim-pemasaran/{id}/delete', [TimPemasaranController::class, 'delete'])->name('tim-pemasaran.delete');
Route::delete('/tim-pemasaran/{id}', [TimPemasaranController::class, 'destroy'])->name('tim-pemasaran.destroy');

// Platform
Route::get('/platform', [PlatformController::class, 'index'])->name('platform.index');
Route::get('/platform/create', [PlatformController::class, 'create'])->name('platform.create');
Route::post('/platform', [PlatformController::class, 'store'])->name('platform.store');
Route::get('/platform/{id}', [PlatformController::class, 'show'])->name('platform.show');
Route::get('/platform/{id}/edit', [PlatformController::class, 'edit'])->name('platform.edit');
Route::put('/platform/{id}', [PlatformController::class, 'update'])->name('platform.update');
Route::get('/platform/{id}/delete', [PlatformController::class, 'delete'])->name('platform.delete');
Route::delete('/platform/{id}', [PlatformController::class, 'destroy'])->name('platform.destroy');

// Biaya Pemasaran
Route::get('/biaya-pemasaran', [BiayaPemasaranController::class, 'index'])->name('biaya-pemasaran.index');
Route::get('/biaya-pemasaran/create', [BiayaPemasaranController::class, 'create'])->name('biaya-pemasaran.create');
Route::post('/biaya-pemasaran', [BiayaPemasaranController::class, 'store'])->name('biaya-pemasaran.store');
Route::get('/biaya-pemasaran/{id}', [BiayaPemasaranController::class, 'show'])->name('biaya-pemasaran.show');
Route::get('/biaya-pemasaran/{id}/edit', [BiayaPemasaranController::class, 'edit'])->name('biaya-pemasaran.edit');
Route::put('/biaya-pemasaran/{id}', [BiayaPemasaranController::class, 'update'])->name('biaya-pemasaran.update');
Route::get('/biaya-pemasaran/{id}/delete', [BiayaPemasaranController::class, 'delete'])->name('biaya-pemasaran.delete');
Route::delete('/biaya-pemasaran/{id}', [BiayaPemasaranController::class, 'destroy'])->name('biaya-pemasaran.destroy');

// Performa
Route::get('/performa', [PerformaController::class, 'index'])->name('performa.index');
Route::get('/performa/create', [PerformaController::class, 'create'])->name('performa.create');
Route::post('/performa', [PerformaController::class, 'store'])->name('performa.store');
Route::get('/performa/{id}', [PerformaController::class, 'show'])->name('performa.show');
Route::get('/performa/{id}/edit', [PerformaController::class, 'edit'])->name('performa.edit');
Route::put('/performa/{id}', [PerformaController::class, 'update'])->name('performa.update');
Route::get('/performa/{id}/delete', [PerformaController::class, 'delete'])->name('performa.delete');
Route::delete('/performa/{id}', [PerformaController::class, 'destroy'])->name('performa.destroy');

// Iklan
Route::get('/iklan', [IklanController::class, 'index'])->name('iklan.index');
Route::get('/iklan/create', [IklanController::class, 'create'])->name('iklan.create');
Route::post('/iklan', [IklanController::class, 'store'])->name('iklan.store');
Route::get('/iklan/{id}', [IklanController::class, 'show'])->name('iklan.show');
Route::get('/iklan/{id}/edit', [IklanController::class, 'edit'])->name('iklan.edit');
Route::put('/iklan/{id}', [IklanController::class, 'update'])->name('iklan.update');
Route::get('/iklan/{id}/delete', [IklanController::class, 'delete'])->name('iklan.delete');
Route::delete('/iklan/{id}', [IklanController::class, 'destroy'])->name('iklan.destroy');

Route::get('/test-platforms', function () {
    return DB::table('platforms')->get();
});

Route::get('/test-performas', function () {
    return DB::table('performas')->get();
});

Route::get('/test-iklans', function () {
    return DB::table('iklans')->get();
});

Route::get('/test-tim-pemasarans', function () {
    return DB::table('tim_pemasarans')->get();
});

Route::get('/test-biaya-pemasarans', function () {
    return DB::table('biaya_pemasarans')->get();
});