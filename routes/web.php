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
use App\Http\Controllers\UserController;

    Route::get('/', [DashboardController::class, 'publicDashboard'])->name('public.dashboard');
    Route::get('/berita', [BeritaController::class, 'publicBerita'])->name('public.berita');
    Route::get('/ekstrakulikuler', [EkstrakulikulerController::class, 'publicEkstrakurikuler'])->name('public.ekstrakulikuler');
    Route::get('/galeri', [GaleriController::class, 'publicGaleri'])->name('public.galeri');
    Route::get('/guru', [GuruController::class, 'publicGuru'])->name('public.guru');
    Route::get('/siswa', [SiswaController::class, 'publicSiswa'])->name('public.siswa');
    Route::get('/profile', [ProfileSekolahController::class, 'publicProfile'])->name('public.profile');

    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login-proses', [AuthController::class, 'processLogin'])->name('admin.process_login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('admin')->middleware('auth.check')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('profil-sekolah')->group(function () {

    // Lihat profile - Admin & Operator
    Route::get('/', [ProfileSekolahController::class, 'index'])
        ->name('admin.profil-sekolah')
        ->middleware('auth.check');

    // Edit profile - Admin saja
    Route::get('/form', [ProfileSekolahController::class, 'form'])
        ->name('admin.profil-sekolah.form')
        ->middleware(['auth.check', 'admin']);

    // Simpan perubahan - Admin saja
    Route::post('/save', [ProfileSekolahController::class, 'save'])
        ->name('admin.profil-sekolah.save')
        ->middleware(['auth.check', 'admin']);
});

    Route::prefix('berita')->group(function () {
        // Admin & Operator
        Route::get('/', [BeritaController::class, 'index'])->name('admin.berita');
        Route::get('/show/{id}', [BeritaController::class, 'show'])->name('admin.berita.show');

        // Admin saja
        Route::middleware('admin')->group(function () {
            Route::get('/add-edit/{id?}', [BeritaController::class, 'addEdit'])->name('admin.berita.addEdit');
            Route::post('/save/{id?}', [BeritaController::class, 'save'])->name('admin.berita.save');
            Route::delete('/delete/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.delete');
        });
    });

    Route::prefix('ekstrakurikuler')->group(function () {
        // Admin & Operator
        Route::get('/', [EkstrakulikulerController::class, 'index'])->name('admin.ekstrakulikuler');
        Route::get('/show/{id}', [EkstrakulikulerController::class, 'show'])->name('admin.ekstrakulikuler.show');

        // Admin saja
        Route::middleware('admin')->group(function () {
            Route::get('/add-edit/{id?}', [EkstrakulikulerController::class, 'addEdit'])->name('admin.ekstrakulikuler.addEdit');
            Route::post('/save/{id?}', [EkstrakulikulerController::class, 'save'])->name('admin.ekstrakulikuler.save');
            Route::delete('/delete/{id}', [EkstrakulikulerController::class, 'destroy'])->name('admin.ekstrakulikuler.delete');
        });
    });
    Route::get('/ekstrakulikuler', [EkstrakulikulerController::class, 'publicEkstrakurikuler'])->name('public.ekstrakulikuler');
    Route::get('/ekstrakulikuler', [EkstrakulikulerController::class, 'publicEkstrakurikuler'])->name('public.ekstrakulikuler');

    Route::prefix('galeri')->group(function () {
        // Admin & Operator
        Route::get('/', [GaleriController::class, 'index'])->name('admin.galeri');
        Route::get('/show/{id}', [GaleriController::class, 'show'])->name('admin.galeri.show');

        // Admin saja
        Route::middleware('admin')->group(function () {
            Route::get('/add-edit/{id?}', [GaleriController::class, 'addEdit'])->name('admin.galeri.addEdit');
            Route::post('/save/{id?}', [GaleriController::class, 'save'])->name('admin.galeri.save');
            Route::delete('/delete/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.delete');
        });
    });

    Route::prefix('guru')->group(function () {
        // Admin & Operator
        Route::get('/', [GuruController::class, 'index'])->name('admin.guru.index');
        Route::get('/show/{id}', [GuruController::class, 'show'])->name('admin.guru.show');

        // Admin saja
        Route::middleware('admin')->group(function () {
            Route::get('/add-edit/{id?}', [GuruController::class, 'addEdit'])->name('admin.guru.addEdit');
            Route::post('/save/{id?}', [GuruController::class, 'save'])->name('admin.guru.save');
            Route::delete('/delete/{id}', [GuruController::class, 'destroy'])->name('admin.guru.delete');
        });
    });

    Route::prefix('siswa')->group(function () {
        // Bisa diakses Admin & Operator
        Route::get('/', [SiswaController::class, 'index'])->name('admin.siswa.index');
        Route::get('/show/{id}', [SiswaController::class, 'show'])->name('admin.siswa.show');
        // Hanya Admin
        Route::middleware('admin')->group(function () {
            Route::get('/add-edit/{id?}', [SiswaController::class, 'addEdit'])->name('admin.siswa.addEdit');
            Route::post('/save/{id?}', [SiswaController::class, 'save'])->name('admin.siswa.save');
            Route::delete('/delete/{id}', [SiswaController::class, 'destroy'])->name('admin.siswa.delete');
        });
    });

    Route::middleware('admin')->prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/add-edit/{id?}', [UserController::class, 'addEdit'])->name('admin.user.addEdit');
        Route::post('/save/{id?}', [UserController::class, 'save'])->name('admin.user.save');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('admin.user.show');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
    });

});
