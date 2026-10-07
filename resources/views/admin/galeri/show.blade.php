@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title mb-1">Detail Galeri</h4>
                        <p class="text-muted mb-0">Informasi lengkap galeri sekolah</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                    @if($galeri->foto && $galeri->kategori == 'foto')
                        @if(file_exists(public_path('uploads/galeri/' . $galeri->foto)))
                            <img src="{{ asset('uploads/galeri/' . $galeri->foto) }}"
                                 alt="{{ $galeri->judul }}"
                                 class="img-fluid rounded"
                                 style="max-height: 450px; width: 100%; object-fit: contain;">
                        @else
                            <div class="p-5 bg-light rounded text-muted">
                                <i class="mdi mdi-image-off mdi-48px d-block mb-2"></i>
                                File foto tidak ditemukan.
                            </div>
                        @endif
                    @elseif($galeri->foto && $galeri->kategori == 'video')
                        @if(file_exists(public_path('uploads/galeri/' . $galeri->foto)))
                            <video controls class="w-100 rounded" style="max-height: 450px;">
                                <source src="{{ asset('uploads/galeri/' . $galeri->foto) }}">
                                Browser tidak mendukung video.
                            </video>
                        @else
                            <div class="p-5 bg-light rounded text-muted">
                                <i class="mdi mdi-video-off mdi-48px d-block mb-2"></i>
                                File video tidak ditemukan.
                            </div>
                        @endif
                    @else
                        <div class="p-5 bg-light rounded text-muted">
                            <i class="mdi mdi-file-image-remove mdi-48px d-block mb-2"></i>
                            File media tidak ditemukan.
                        </div>
                    @endif
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="font-weight-bold mb-0">{{ $galeri->judul }}</h4>
                    @if($galeri->kategori == 'foto')
                        <span class="badge badge-primary">
                            <i class="mdi mdi-image"></i> Foto
                        </span>
                    @else
                        <span class="badge badge-info">
                            <i class="mdi mdi-video"></i> Video
                        </span>
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Tanggal Dokumentasi</th>
                                <td>{{ \Carbon\Carbon::parse($galeri->tanggal)->format('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>
                                    @if($galeri->kategori == 'foto')
                                        <span class="badge badge-primary">
                                            <i class="mdi mdi-image"></i> Foto
                                        </span>
                                    @else
                                        <span class="badge badge-info">
                                            <i class="mdi mdi-video"></i> Video
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nama File</th>
                                <td>{{ $galeri->foto ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td style="white-space: pre-line;">{{ $galeri->keterangan ?: 'Tidak ada keterangan.' }}</td>
                            </tr>
                            @if(isset($galeri->created_at))
                                <tr>
                                    <th>Dibuat</th>
                                    <td>{{ $galeri->created_at ? $galeri->created_at->format('d-m-Y H:i') : '-' }}</td>
                                </tr>
                            @endif
                            @if(isset($galeri->updated_at))
                                <tr>
                                    <th>Terakhir Diubah</th>
                                    <td>{{ $galeri->updated_at ? $galeri->updated_at->format('d-m-Y H:i') : '-' }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.galeri') }}" class="btn btn-light">
                        <i class="mdi mdi-arrow-left"></i> Kembali
                    </a>
                    <a href="{{ route('admin.galeri.addEdit', \Illuminate\Support\Facades\Crypt::encrypt($galeri->id)) }}" class="btn btn-warning">
                        <i class="mdi mdi-pencil"></i> Edit Galeri
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
