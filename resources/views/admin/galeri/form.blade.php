@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">

        <div class="card">

            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <h4 class="card-title mb-1">
                            {{ isset($galeri) ? 'Edit Galeri' : 'Tambah Galeri' }}
                        </h4>

                        <p class="text-muted mb-0">
                            {{ isset($galeri) ? 'Ubah data foto atau video sekolah' : 'Tambahkan foto atau video sekolah' }}
                        </p>
                    </div>

                    <a href="{{ route('admin.galeri') }}" class="btn btn-light">
                        <i class="mdi mdi-arrow-left"></i>
                        Kembali
                    </a>

                </div>
            </div>

            <div class="card-body">

                @if($errors->any())

                    <div class="alert alert-danger">

                        <div class="font-weight-bold mb-2">
                            <i class="mdi mdi-alert-circle"></i>
                            Terjadi kesalahan:
                        </div>

                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>

                @endif

                <form action="{{ route('admin.galeri.save', isset($galeri) ? \Illuminate\Support\Facades\Crypt::encrypt($galeri->id) : null) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">

                        <label>Judul</label>

                        <input type="text"
                               name="judul"
                               class="form-control"
                               value="{{ old('judul', $galeri->judul ?? '') }}"
                               placeholder="Masukkan judul galeri"
                               required>

                    </div>

                    <div class="form-group">

                        <label>Keterangan</label>

                        <textarea name="keterangan"
                                  class="form-control"
                                  rows="6"
                                  placeholder="Masukkan keterangan"
                                  required>{{ old('keterangan', $galeri->keterangan ?? '') }}</textarea>

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Kategori</label>

                                <select name="kategori"
                                        id="kategori"
                                        class="form-control"
                                        required>

                                    <option value="">
                                        -- Pilih Kategori --
                                    </option>

                                    <option value="foto"
                                        {{ old('kategori', $galeri->kategori ?? '') == 'foto' ? 'selected' : '' }}>
                                        Foto
                                    </option>

                                    <option value="video"
                                        {{ old('kategori', $galeri->kategori ?? '') == 'video' ? 'selected' : '' }}>
                                        Video
                                    </option>

                                </select>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Tanggal</label>

                                <input type="date"
                                       name="tanggal"
                                       class="form-control"
                                       value="{{ old('tanggal', $galeri->tanggal ?? date('Y-m-d')) }}"
                                       required>

                            </div>

                        </div>

                    </div>

                    {{-- INPUT FOTO --}}
                    <div class="form-group" id="inputFoto">

                        <label>
                            {{ isset($galeri) ? 'Ganti Foto' : 'Foto' }}
                        </label>

                        <input type="file"
                               name="foto_file"
                               id="foto_file"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp">

                        <small class="form-text text-muted">
                            Format: JPG, JPEG, PNG, WEBP. Maksimal 20 MB.

                            @if(isset($galeri))
                                Biarkan kosong jika tidak ingin mengganti foto.
                            @endif
                        </small>

                    </div>

                    {{-- INPUT VIDEO --}}
                    <div class="form-group" id="inputVideo">

                        <label>
                            {{ isset($galeri) ? 'Ganti Video' : 'Video' }}
                        </label>

                        <input type="file"
                               name="video_file"
                               id="video_file"
                               class="form-control"
                               accept=".mp4,.mov,.avi,.mkv">

                        <small class="form-text text-muted">
                            Format: MP4, MOV, AVI, MKV. Maksimal 20 MB.

                            @if(isset($galeri))
                                Biarkan kosong jika tidak ingin mengganti video.
                            @endif
                        </small>

                    </div>

                    {{-- MEDIA SAAT INI --}}
                    @if(isset($galeri) && $galeri->foto)

                        <div class="form-group">

                            <label>
                                Media Saat Ini
                            </label>

                            @if($galeri->kategori == 'foto')

                                @if(file_exists(public_path('uploads/galeri/' . $galeri->foto)))

                                    <div>
                                        <img src="{{ asset('uploads/galeri/' . $galeri->foto) }}"
                                             alt="{{ $galeri->judul }}"
                                             class="img-fluid rounded"
                                             style="max-height: 250px; object-fit: contain;">
                                    </div>

                                @else

                                    <div class="alert alert-warning">
                                        File foto tidak ditemukan.
                                    </div>

                                @endif

                            @elseif($galeri->kategori == 'video')

                                @if(file_exists(public_path('uploads/galeri/' . $galeri->foto)))

                                    <div>
                                        <video controls
                                               class="w-100 rounded"
                                               style="max-height: 300px;">

                                            <source src="{{ asset('uploads/galeri/' . $galeri->foto) }}">

                                            Browser tidak mendukung video.

                                        </video>
                                    </div>

                                @else

                                    <div class="alert alert-warning">
                                        File video tidak ditemukan.
                                    </div>

                                @endif

                            @endif

                        </div>

                    @endif

                    <div class="mt-4">

                        <button type="submit" class="btn btn-primary">

                            <i class="mdi mdi-content-save"></i>

                            {{ isset($galeri) ? 'Update' : 'Simpan' }}

                        </button>

                        <a href="{{ route('admin.galeri') }}"
                           class="btn btn-light">

                            Batal

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const kategori = document.getElementById('kategori');

    const inputFoto = document.getElementById('inputFoto');
    const inputVideo = document.getElementById('inputVideo');

    const fotoFile = document.getElementById('foto_file');
    const videoFile = document.getElementById('video_file');

    function tampilkanInput() {

        if (kategori.value === 'foto') {

            inputFoto.style.display = 'block';
            inputVideo.style.display = 'none';

            fotoFile.disabled = false;
            videoFile.disabled = true;

        } else if (kategori.value === 'video') {

            inputFoto.style.display = 'none';
            inputVideo.style.display = 'block';

            fotoFile.disabled = true;
            videoFile.disabled = false;

        } else {

            inputFoto.style.display = 'none';
            inputVideo.style.display = 'none';

            fotoFile.disabled = true;
            videoFile.disabled = true;

        }
    }

    kategori.addEventListener('change', tampilkanInput);

    tampilkanInput();

});
</script>

@endsection
