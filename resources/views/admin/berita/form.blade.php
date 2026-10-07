@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-4">
                    {{ $berita ? 'Edit Berita' : 'Tambah Berita' }}
                </h4>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ $berita ? route('admin.berita.save', \Illuminate\Support\Facades\Crypt::encrypt($berita->id)) : route('admin.berita.save') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text"
                               name="judul"
                               class="form-control"
                               value="{{ old('judul', $berita->judul ?? '') }}"
                               placeholder="Masukkan judul berita"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Isi Berita</label>
                        <textarea name="isi"
                                  rows="6"
                                  class="form-control"
                                  placeholder="Masukkan isi berita"
                                  required>{{ old('isi', $berita->isi ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date"
                               name="tanggal"
                               class="form-control"
                               value="{{ old('tanggal', $berita->tanggal ?? '') }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp">

                        @if($berita && $berita->foto && file_exists(public_path('uploads/berita/' . $berita->foto)))
                            <div class="mt-3">
                                <p class="mb-2">Foto Saat Ini:</p>
                                <img src="{{ asset('uploads/berita/' . $berita->foto) }}"
                                     alt="{{ $berita->judul }}"
                                     width="150"
                                     class="rounded">
                            </div>
                        @endif
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save"></i>
                            {{ $berita ? 'Update' : 'Simpan' }}
                        </button>

                        <a href="{{ route('admin.berita') }}" class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
