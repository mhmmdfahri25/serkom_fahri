<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;
use App\Models\ProfileSekolah;
use App\Models\Berita;
use App\Models\Ekstrakulikuler;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Siswa;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sekolah = ProfileSekolah::first();

        $jumlahBerita = Berita::count();
        $jumlahEkstrakulikuler = Ekstrakulikuler::count();
        $jumlahGaleri = Galeri::count();
        $jumlahGuru = Guru::count();
        $jumlahSiswa = Siswa::count();

        $beritaTerbaru = Berita::take(5)->get();

        return view('admin.dashboard', compact(
            'sekolah',
            'jumlahBerita',
            'jumlahEkstrakulikuler',
            'jumlahGaleri',
            'jumlahGuru',
            'jumlahSiswa',
            'beritaTerbaru'
        ));
    }


    /**
     * Halaman utama website
     */
    public function indexPublic()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        return view('index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDashboardRequest $request)
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function show(Dashboard $dashboard)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateDashboardRequest $request,
        Dashboard $dashboard
    ) {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
