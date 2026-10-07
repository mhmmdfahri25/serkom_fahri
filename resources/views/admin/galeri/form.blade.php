@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title mb-1">{{ isset($galeri) ? 'Edit Galeri' : 'Tambah Galeri' }}</h4>
                        <p class="text-muted mb-0">{{ isset($galeri) ? 'Ubah data foto atau video sekolah' : 'Tambahkan foto atau video sekolah' }}</p>
                    </div>
                    <a href="{{ route('admin.galeri') }}" class="btn btn-light">
                        <i class="mdi mdi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <div class="font-weight-bold mb-2">
                            <i class="mdi mdi-alert-circle"></i> Terjadi kesalahan:
                        </div>
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.galeri.save', isset($galeri) ? \Illuminate\Support\Facades\Crypt::encrypt($galeri->id) : null) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" value="{{ old('judul', $galeri->judul ?? '') }}" placeholder="Masukkan judul galeri" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="6" placeholder="Masukkan keterangan">{{ old('keterangan', $galeri->keterangan ?? '') }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="kategori" class="form-control" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="foto" {{ old('kategori', $galeri->kategori ?? '') == 'foto' ? 'selected' : '' }}>Foto</option>
                                    <option value="video" {{ old('kategori', $galeri->kategori ?? '') == 'video' ? 'selected' : '' }}>Video</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $galeri->tanggal ?? date('Y-m-d')) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ isset($galeri) ? 'Ganti Foto / Video' : 'Foto / Video' }}</label>
                        <input type="file" name="foto" class="form-control" accept=".jpg,.jpeg,.png,.webp,.mp4,.mov,.avi,.mkv" {{ isset($galeri) ? '' : 'required' }}>
                        <small class="form-text text-muted">
                            Foto: JPG, JPEG, PNG, WEBP. Video: MP4, MOV, AVI, MKV. Maksimal 20 MB.
                            @if(isset($galeri)) Biarkan kosong jika tidak ingin mengganti file. @endif
                        </small>
                    </div>
                    @if(isset($galeri) && $galeri->foto && file_exists(public_path('uploads/galeri/' . $galeri->foto)))
                        <div class="form-group">
                            <label>File Saat Ini</label>
                            @if($galeri->kategori == 'foto')
                                <div>
                                    <img src="{{ asset('uploads/galeri/' . $galeri->foto) }}" alt="{{ $galeri->judul }}" class="img-fluid rounded" style="max-height: 200px; object-fit: cover;">
                                </div>
                            @elseif($galeri->kategori == 'video')
                                <div>
                                    <video controls style="max-width: 100%; max-height: 250px;">
                                        <source src="{{ asset('uploads/galeri/' . $galeri->foto) }}">
                                        Browser tidak mendukung video.
                                    </video>
                                </div>
                            @endif
                        </div>
                    @endif
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save"></i> {{ isset($galeri) ? 'Update' : 'Simpan' }}
                        </button>
                        <a href="{{ route('admin.galeri') }}" class="btn btn-light">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
