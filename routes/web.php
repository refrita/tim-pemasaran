<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TimPemasaranController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\BiayaPemasaranController;
use App\Http\Controllers\PerformaController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\ImageController;
use App\Models\TimPemasaran;
use App\Models\Platform;
use App\Models\Iklan;
use App\Models\Performa;
use App\Models\BiayaPemasaran;

// Redirect root ke home (akan dihandle middleware auth)
Route::get('/', function () {
    if (auth()->check()) {
        // Logika pencarian dan tampilan home
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
    }
    return redirect()->route('login');
})->name('home.index')->middleware('auth');

// Auth Routes (hanya untuk guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Protected Routes (hanya untuk yang sudah login)
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Resource Controllers
    Route::resource('tim-pemasaran', TimPemasaranController::class);
    Route::get('/tim-pemasaran/search', [TimPemasaranController::class, 'search'])->name('tim-pemasaran.search');
    
    Route::resource('platform', PlatformController::class);
    Route::resource('biaya-pemasaran', BiayaPemasaranController::class);
    Route::resource('performa', PerformaController::class);
    Route::resource('iklan', IklanController::class);
    
    // Image Upload
    Route::get('/upload', [ImageController::class, 'create']);
    Route::post('/upload', [ImageController::class, 'store'])->name('image.upload');
    Route::delete('/upload/{id}', [ImageController::class, 'destroy'])->name('image.destroy');
    
    // Route khusus lainnya
    Route::get('/pendaftaran-anggotatim', function () {
        return 'Selamat datang di halaman Pendaftaran Akun Anggota Tim Pemasaran';
    })->middleware('check.age');
});