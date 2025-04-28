<?php

use Illuminate\Support\Facades\Route;
Route::view('/', 'home');

use App\Http\Controllers\TimPemasaranController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\BiayaPemasaranController;
use App\Http\Controllers\PerformaController;
use App\Http\Controllers\IklanController;


// Tim Pemasaran
Route::get('/tim-pemasaran', [TimPemasaranController::class, 'index']);
Route::get('/tim-pemasaran/create', [TimPemasaranController::class, 'create']);
Route::post('/tim-pemasaran', [TimPemasaranController::class, 'store']);
Route::get('/tim-pemasaran/{id}', [TimPemasaranController::class, 'show']);
Route::get('/tim-pemasaran/{id}/edit', [TimPemasaranController::class, 'edit']);
Route::put('/tim-pemasaran/{id}', [TimPemasaranController::class, 'update']);
Route::get('/tim-pemasaran/{id}/delete', [TimPemasaranController::class, 'delete']);
Route::delete('/tim-pemasaran/{id}', [TimPemasaranController::class, 'destroy']);

// Platform
Route::get('/platform', [PlatformController::class, 'index']);
Route::get('/platform/create', [PlatformController::class, 'create']);
Route::post('/platform', [PlatformController::class, 'store']);
Route::get('/platform/{id}', [PlatformController::class, 'show']);
Route::get('/platform/{id}/edit', [PlatformController::class, 'edit']);
Route::put('/platform/{id}', [PlatformController::class, 'update']);
Route::get('/platform/{id}/delete', [PlatformController::class, 'delete']);
Route::delete('/platform/{id}', [PlatformController::class, 'destroy']);

// Biaya Pemasaran
Route::get('/biaya-pemasaran', [BiayaPemasaranController::class, 'index']);
Route::get('/biaya-pemasaran/create', [BiayaPemasaranController::class, 'create']);
Route::post('/biaya-pemasaran', [BiayaPemasaranController::class, 'store']);
Route::get('/biaya-pemasaran/{id}', [BiayaPemasaranController::class, 'show']);
Route::get('/biaya-pemasaran/{id}/edit', [BiayaPemasaranController::class, 'edit']);
Route::put('/biaya-pemasaran/{id}', [BiayaPemasaranController::class, 'update']);
Route::get('/biaya-pemasaran/{id}/delete', [BiayaPemasaranController::class, 'delete']);
Route::delete('/biaya-pemasaran/{id}', [BiayaPemasaranController::class, 'destroy']);

// Performa
Route::get('/performa', [PerformaController::class, 'index']);
Route::get('/performa/create', [PerformaController::class, 'create']);
Route::post('/performa', [PerformaController::class, 'store']);
Route::get('/performa/{id}', [PerformaController::class, 'show']);
Route::get('/performa/{id}/edit', [PerformaController::class, 'edit']);
Route::put('/performa/{id}', [PerformaController::class, 'update']);
Route::get('/performa/{id}/delete', [PerformaController::class, 'delete']);
Route::delete('/performa/{id}', [PerformaController::class, 'destroy']);

// Iklan
Route::get('/iklan', [IklanController::class, 'index']);
Route::get('/iklan/create', [IklanController::class, 'create']);
Route::post('/iklan', [IklanController::class, 'store']);
Route::get('/iklan/{id}', [IklanController::class, 'show']);
Route::get('/iklan/{id}/edit', [IklanController::class, 'edit']);
Route::put('/iklan/{id}', [IklanController::class, 'update']);
Route::get('/iklan/{id}/delete', [IklanController::class, 'delete']);
Route::delete('/iklan/{id}', [IklanController::class, 'destroy']);