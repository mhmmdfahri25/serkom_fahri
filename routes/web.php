<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileSekolahController; // Fixed: Disesuaikan dengan controller kamu
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;

// Route::get('/', function () {
//     return view('admin');
// });

// Fixed: Menggunakan ProfileSekolahController dan menghapus sintaks 'action:'
Route::get('/profile', [ProfileSekolahController::class, 'index'])->name('admin.profile');
Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita');
Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])->name('admin.ekstrakurikuler');
Route::get('/galeri', [GaleriController::class, 'index'])->name('admin.galeri');
Route::get('/guru', [GuruController::class, 'index'])->name('admin.guru');
Route::get('/siswa', [SiswaController::class, 'index'])->name('admin.siswa');