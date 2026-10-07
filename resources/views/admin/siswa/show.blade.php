@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">

            {{-- HEADER --}}
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title mb-1">Detail Siswa</h4>
                        <p class="text-muted mb-0">Informasi lengkap data siswa</p>
                    </div>
                </div>
            </div>

            {{-- BODY --}}
            <div class="card-body">

                {{-- PESAN ERROR --}}
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="mdi mdi-alert-circle"></i>
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                    </div>
                @endif

                {{-- PROFIL SISWA --}}
                <div class="text-center mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-circle"
                         style="width: 90px; height: 90px;">
                        <i class="mdi mdi-account" style="font-size: 45px;"></i>
                    </div>

                    <h4 class="mt-3 mb-1">{{ $siswa->nama_siswa }}</h4>
                    <p class="text-muted mb-0">NISN: {{ $siswa->nisn }}</p>
                </div>

                {{-- DETAIL DATA --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">NISN</th>
                                <td>{{ $siswa->nisn }}</td>
                            </tr>
                            <tr>
                                <th>Nama Siswa</th>
                                <td>{{ $siswa->nama_siswa }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>
                                    @if($siswa->jenis_kelamin == 'Laki-Laki' || $siswa->jenis_kelamin == 'Laki-laki')
                                        <span class="badge badge-primary">
                                            <i class="mdi mdi-gender-male"></i>
                                            Laki-Laki
                                        </span>
                                    @else
                                        <span class="badge badge-danger">
                                            <i class="mdi mdi-gender-female"></i>
                                            Perempuan
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Tahun Masuk / Angkatan</th>
                                <td>{{ $siswa->tahun_masuk }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Terdaftar</th>
                                <td>
                                    {{ $siswa->created_at ? $siswa->created_at->format('d-m-Y H:i') : '-' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            {{-- FOOTER --}}
            <div class="card-footer bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.siswa.index') }}" class="btn btn-light">
                        <i class="mdi mdi-arrow-left"></i>
                        Kembali
                    </a>

                    <a href="{{ route('admin.siswa.addEdit', \Illuminate\Support\Facades\Crypt::encrypt($siswa->id)) }}"
                       class="btn btn-warning">
                        <i class="mdi mdi-pencil"></i>
                        Edit Data Siswa
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
