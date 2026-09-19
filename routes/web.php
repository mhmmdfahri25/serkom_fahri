<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileSekolahController; // Fixed: Disesuaikan dengan controller kamu
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

Route::get('/dashboard', function () {
    return view('index');
});
// });

Route::get('/', [DashboardController::class, 'indexPublic'])->name('pubilc.dashboard');

Route::get('/login', [AuthController::class, 'index'])->name('admin.login');
Route::post('/login-proses', [AuthController::class, 'prosesLogin'])->name('admin.proses_login');

// Fixed: Menggunakan ProfileSekolahController dan menghapus sintaks 'action:'
Route::prefix('admin')->group(function () {
    Route::get('/profile', [ProfileSekolahController::class, 'index'])->name('admin.profile');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita');
    Route::get('/ekstrakulikuler', [EkstrakulikulerController::class, 'index'])->name('admin.ekstrakulikuler');
    Route::get('/galeri', [GaleriController::class, 'index'])->name('admin.galeri');
    Route::get('/guru', [GuruController::class, 'index'])->name('admin.guru');
    Route::get('/siswa', [SiswaController::class, 'index'])->name('admin.siswa');
    Route::get('/login', [SiswaController::class, 'index'])->name('admin.login');
});
