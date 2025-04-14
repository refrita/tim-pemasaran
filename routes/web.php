<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimPemasaranController;

Route::get('/', function () {
    return view('welcome');
});

// Tim Pemasaran (dengan halaman delete terpisah)
Route::get('/tim-pemasaran', [TimPemasaranController::class, 'index']);
Route::get('/tim-pemasaran/create', [TimPemasaranController::class, 'create']);
Route::post('/tim-pemasaran', [TimPemasaranController::class, 'store']);
Route::get('/tim-pemasaran/{id}', [TimPemasaranController::class, 'show']);
Route::get('/tim-pemasaran/{id}/edit', [TimPemasaranController::class, 'edit']);
Route::put('/tim-pemasaran/{id}', [TimPemasaranController::class, 'update']);
Route::delete('/tim-pemasaran/{id}', [TimPemasaranController::class, 'destroy']);
Route::get('/tim-pemasaran/{id}/delete', [TimPemasaranController::class, 'delete']);
