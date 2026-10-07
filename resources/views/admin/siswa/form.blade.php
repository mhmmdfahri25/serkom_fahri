@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">

            {{-- HEADER --}}
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title mb-1">
                            {{ isset($siswa) ? 'Edit Siswa' : 'Tambah Siswa' }}
                        </h4>
                        <p class="text-muted mb-0">
                            {{ isset($siswa) ? 'Ubah data siswa' : 'Tambahkan data siswa baru' }}
                        </p>
                    </div>

                    <a href="{{ route('admin.siswa.index') }}" class="btn btn-light">
                        <i class="mdi mdi-arrow-left"></i>
                        Kembali
                    </a>
                </div>
            </div>

            {{-- BODY --}}
            <div class="card-body">

                {{-- ERROR --}}
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

                {{-- FORM --}}
                <form action="{{ route('admin.siswa.save', isset($siswa) ? \Illuminate\Support\Facades\Crypt::encrypt($siswa->id) : null) }}"
                      method="POST">

                    @csrf

                    {{-- NISN --}}
                    <div class="form-group">
                        <label>NISN</label>
                        <input type="text"
                               name="nisn"
                               class="form-control"
                               value="{{ old('nisn', $siswa->nisn ?? '') }}"
                               maxlength="10"
                               placeholder="Masukkan NISN"
                               required>
                    </div>

                    {{-- NAMA SISWA --}}
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text"
                               name="nama_siswa"
                               class="form-control"
                               value="{{ old('nama_siswa', $siswa->nama_siswa ?? '') }}"
                               placeholder="Masukkan nama siswa"
                               required>
                    </div>

                    {{-- JENIS KELAMIN --}}
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-Laki"
                                {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'Laki-Laki' ? 'selected' : '' }}>
                                Laki-Laki
                            </option>
                            <option value="Perempuan"
                                {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>
                        </select>
                    </div>

                    {{-- TAHUN MASUK --}}
                    <div class="form-group">
                        <label>Tahun Masuk</label>
                        <input type="number"
                               name="tahun_masuk"
                               class="form-control"
                               value="{{ old('tahun_masuk', $siswa->tahun_masuk ?? date('Y')) }}"
                               min="1900"
                               max="2100"
                               placeholder="Contoh: 2026"
                               required>
                    </div>

                    {{-- BUTTON --}}
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save"></i>
                            {{ isset($siswa) ? 'Update' : 'Simpan' }}
                        </button>

                        <a href="{{ route('admin.siswa.index') }}" class="btn btn-light">
                            Batal
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
