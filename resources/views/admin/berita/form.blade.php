
@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                {{-- Header --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="card-title mb-1">
                            {{ $berita ? 'Edit Berita' : 'Tambah Berita' }}
                        </h4>
                        <p class="text-muted mb-0">
                            {{ $berita ? 'Perbarui informasi berita sekolah.' : 'Tambahkan berita terbaru sekolah.' }}
                        </p>
                    </div>
                </div>

                {{-- Pesan error --}}
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span>&times;</span>
                        </button>
                    </div>
                @endif

                {{-- Validasi --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Periksa kembali data berikut:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form berita --}}
                <form action="{{ $berita
                    ? route('admin.berita.save', \Illuminate\Support\Facades\Crypt::encrypt($berita->id))
                    : route('admin.berita.save') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    {{-- Judul --}}
                    <div class="form-group mb-3">
                        <label for="judul">Judul Berita <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            id="judul"
                            name="judul"
                            class="form-control @error('judul') is-invalid @enderror"
                            value="{{ old('judul', $berita->judul ?? '') }}"
                            placeholder="Masukkan judul berita"
                            maxlength="255"
                            required>

                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Isi --}}
                    <div class="form-group mb-3">
                        <label for="isi">Isi Berita <span class="text-danger">*</span></label>
                        <textarea
                            id="isi"
                            name="isi"
                            rows="7"
                            class="form-control @error('isi') is-invalid @enderror"
                            placeholder="Tuliskan isi berita di sini..."
                            required>{{ old('isi', $berita->isi ?? '') }}</textarea>

                        @error('isi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tanggal --}}
                    <div class="form-group mb-3">
                        <label for="tanggal">Tanggal Berita <span class="text-danger">*</span></label>
                        <input
                            type="date"
                            id="tanggal"
                            name="tanggal"
                            class="form-control @error('tanggal') is-invalid @enderror"
                            value="{{ old('tanggal', $berita->tanggal ?? '') }}"
                            required>

                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Foto --}}
                    <div class="form-group mb-3">
                        <label for="foto">Foto Berita</label>
                        <input
                            type="file"
                            id="foto"
                            name="foto"
                            class="form-control @error('foto') is-invalid @enderror"
                            accept=".jpg,.jpeg,.png,.webp">

                        <small class="form-text text-muted">
                            Format JPG, JPEG, PNG, atau WEBP. Maksimal 5 MB.
                            Foto boleh dikosongkan jika tidak ingin mengganti foto.
                        </small>

                        @error('foto')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror

                        {{-- Foto saat ini --}}
                        @if(
                            $berita &&
                            $berita->foto &&
                            file_exists(public_path('uploads/berita/' . $berita->foto))
                        )
                            <div class="mt-3">
                                <p class="mb-2">Foto Saat Ini:</p>

                                <img
                                    src="{{ asset('uploads/berita/' . $berita->foto) }}"
                                    alt="{{ $berita->judul }}"
                                    width="180"
                                    class="img-thumbnail rounded">

                            </div>
                        @endif
                    </div>

                    {{-- Tombol --}}
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save"></i>
                            {{ $berita ? 'Update Berita' : 'Simpan Berita' }}
                        </button>

                        <a href="{{ route('admin.berita') }}" class="btn btn-secondary">
                            <i class="mdi mdi-arrow-left"></i>
                            Kembali
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
