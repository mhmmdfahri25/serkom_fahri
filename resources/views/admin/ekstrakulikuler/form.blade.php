@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title mb-1">
                            {{ isset($ekstrakulikuler) ? 'Edit Ekstrakulikuler' : 'Tambah Ekstrakulikuler' }}
                        </h4>
                        <p class="text-muted mb-0">
                            {{ isset($ekstrakulikuler) ? 'Ubah data ekstrakulikuler sekolah' : 'Tambahkan data ekstrakulikuler sekolah' }}
                        </p>
                    </div>
                    <a href="{{ route('admin.ekstrakulikuler') }}" class="btn btn-light">
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

                <form action="{{ route('admin.ekstrakulikuler.save', isset($ekstrakulikuler) ? \Illuminate\Support\Facades\Crypt::encrypt($ekstrakulikuler->id) : null) }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Nama Ekstrakulikuler</label>
                        <input type="text"
                               name="nama_ekstrakulikuler"
                               class="form-control"
                               value="{{ old('nama_ekstrakulikuler', $ekstrakulikuler->nama_ekstrakulikuler ?? '') }}"
                               placeholder="Contoh: Pramuka"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Pembina</label>
                        <input type="text"
                               name="pembina"
                               class="form-control"
                               value="{{ old('pembina', $ekstrakulikuler->pembina ?? '') }}"
                               placeholder="Nama pembina"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Jadwal Latihan</label>
                        <input type="text"
                               name="jadwal_latihan"
                               class="form-control"
                               value="{{ old('jadwal_latihan', $ekstrakulikuler->jadwal_latihan ?? '') }}"
                               placeholder="Contoh: Jumat, 14:00 - 16:00"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi"
                                  class="form-control"
                                  rows="6"
                                  placeholder="Masukkan deskripsi ekstrakulikuler"
                                  required>{{ old('deskripsi', $ekstrakulikuler->deskripsi ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>{{ isset($ekstrakulikuler) ? 'Ganti Foto' : 'Foto' }}</label>
                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp">

                        <small class="form-text text-muted">
                            Format JPG, JPEG, PNG, WEBP. Maksimal 5 MB.
                            @if(isset($ekstrakulikuler))
                                Biarkan kosong jika tidak ingin mengganti foto.
                            @endif
                        </small>
                    </div>

                    @if(isset($ekstrakulikuler) && $ekstrakulikuler->foto && file_exists(public_path('uploads/ekstrakulikuler/' . $ekstrakulikuler->foto)))
                        <div class="form-group">
                            <label>Foto Saat Ini</label>
                            <div>
                                <img src="{{ asset('uploads/ekstrakulikuler/' . $ekstrakulikuler->foto) }}"
                                     alt="{{ $ekstrakulikuler->nama_ekstrakulikuler }}"
                                     class="img-fluid rounded"
                                     style="max-width: 300px; max-height: 220px; object-fit: cover;">
                            </div>
                        </div>
                    @endif

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save"></i>
                            {{ isset($ekstrakulikuler) ? 'Update' : 'Simpan' }}
                        </button>

                        <a href="{{ route('admin.ekstrakulikuler') }}" class="btn btn-light">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
