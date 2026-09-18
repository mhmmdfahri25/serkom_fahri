<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileSekolahController; // Fixed: Disesuaikan dengan controller kamu
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;

Route::get('/dashboard', function () {
    return view('index');
});
// });

// Fixed: Menggunakan ProfileSekolahController dan menghapus sintaks 'action:'
Route::get('/profile', [ProfileSekolahController::class, 'index'])->name('admin.profile');
Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita');
Route::get('/ekstrakulikuler', [EkstrakulikulerController::class, 'index'])->name('admin.ekstrakulikuler');
Route::get('/galeri', [GaleriController::class, 'index'])->name('admin.galeri');
Route::get('/guru', [GuruController::class, 'index'])->name('admin.guru');
Route::get('/siswa', [SiswaController::class, 'index'])->name('admin.siswa');