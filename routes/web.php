<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileSekolahController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'index'])->name('admin.login');
Route::get('/login', [AuthController::class, 'index']) ->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login-proses', [AuthController::class, 'prosesLogin'])->name('admin.proses_login');

Route::prefix('admin')
    ->middleware('auth.check')
    ->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [ProfileSekolahController::class, 'index'])->name('admin.profile');
    Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita');
    Route::get('/ekstrakulikuler', [EkstrakulikulerController::class, 'index'])->name('admin.ekstrakulikuler');
    Route::get('/galeri', [GaleriController::class, 'index'])->name('admin.galeri');
    Route::get('/guru', [GuruController::class, 'index'])->name('admin.guru');
    Route::get('/siswa', [SiswaController::class, 'index']) ->name('admin.siswa');
});

Route::prefix('siswa')->group(function () {
    Route::get('/', [SiswaController::class, 'index'])->name('admin.siswa');
    Route::get('/tambah', [SiswaController::class, 'create'])->name('admin.siswa.tambah');
    Route::post('/simpan', [SiswaController::class, 'store'])->name('admin.siswa.store');
    Route::get('/edit/{id}', [SiswaController::class, 'edit'])->name('admin.siswa.edit');
    Route::put('/update/{id}', [SiswaController::class, 'update'])->name('admin.siswa.update');
    Route::delete('/hapus/{id}', [SiswaController::class, 'destroy'])->name('admin.siswa.destroy');
});

 Route::prefix('profile')->group(function () {
    Route::get('/profile', [ProfileSekolahController::class, 'index'])->name('admin.profile');
    Route::get('/profile/edit', [ProfileSekolahController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/profile/update', [ProfileSekolahController::class, 'update'])->name('admin.profile.update');
    Route::put('/update', [ProfileSekolahController::class, 'update']) ->name('admin.profile.update');

});

 Route::prefix('guru')->group(function () {
    Route::get('/', [GuruController::class, 'index'])->name('admin.guru');
    Route::get('/tambah', [GuruController::class, 'create'])->name('admin.guru.tambah');
    Route::post('/simpan', [GuruController::class, 'store'])->name('admin.guru.store');
    Route::get('/edit/{id}', [GuruController::class, 'edit'])->name('admin.guru.edit');
    Route::put('/update/{id}', [GuruController::class, 'update'])->name('admin.guru.update');
    Route::delete('/hapus/{id}', [GuruController::class, 'destroy'])->name('admin.guru.destroy');
});

Route::prefix('galeri')->group(function () {
    Route::get('/', [GaleriController::class, 'index'])->name('admin.galeri');
    Route::get('/tambah', [GaleriController::class, 'create'])->name('admin.galeri.tambah');
    Route::post('/simpan', [GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::get('/edit/{id}', [GaleriController::class, 'edit'])->name('admin.galeri.edit');
    Route::put('/update/{id}', [GaleriController::class, 'update'])->name('admin.galeri.update');
    Route::delete('/hapus/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');

});
Route::prefix('ekstrakulikuler')->group(function () {
    Route::get('/', [EkstrakulikulerController::class, 'index'])->name('admin.ekstrakulikuler');
    Route::get('/tambah', [EkstrakulikulerController::class, 'create'])->name('admin.ekstrakulikuler.tambah');
    Route::post('/simpan', [EkstrakulikulerController::class, 'store'])->name('admin.ekstrakulikuler.store');
    Route::get('/edit/{id}', [EkstrakulikulerController::class, 'edit'])->name('admin.ekstrakulikuler.edit');
    Route::put('/update/{id}', [EkstrakulikulerController::class, 'update'])->name('admin.ekstrakulikuler.update');
    Route::delete('/hapus/{id}', [EkstrakulikulerController::class, 'destroy'])->name('admin.ekstrakulikuler.destroy');
});

Route::prefix('berita')->group(function () {
    Route::get('/', [BeritaController::class, 'index'])->name('admin.berita');
    Route::get('/tambah', [BeritaController::class, 'create'])->name('admin.berita.tambah');
    Route::post('/simpan', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/detail/{id}', [BeritaController::class, 'show'])->name('admin.berita.detail');
    Route::get('/edit/{id}', [BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/update/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('/hapus/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');
});
