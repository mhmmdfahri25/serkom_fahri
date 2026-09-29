@extends('index')

@section('content')

<div class="row">

    <div class="col-md-8">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">
                    Edit Ekstrakulikuler
                </h4>

                <p class="card-description">
                    Ubah data ekstrakulikuler sekolah
                </p>

                @if($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <form action="{{ route('admin.ekstrakulikuler.update', $ekstrakulikuler->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    @method('PUT')

                    <div class="form-group">

                        <label>Nama Ekstrakulikuler</label>

                        <input type="text"
                               name="nama_ekstrakulikuler"
                               class="form-control"
                               value="{{ old('nama_ekstrakulikuler', $ekstrakulikuler->nama_ekstrakulikuler) }}"
                               required>

                    </div>

                    <div class="form-group">

                        <label>Pembina</label>

                        <input type="text"
                               name="pembina"
                               class="form-control"
                               value="{{ old('pembina', $ekstrakulikuler->pembina) }}"
                               required>

                    </div>

                    <div class="form-group">

                        <label>Jadwal Latihan</label>

                        <input type="text"
                               name="jadwal_latihan"
                               class="form-control"
                               value="{{ old('jadwal_latihan', $ekstrakulikuler->jadwal_latihan) }}"
                               required>

                    </div>

                    <div class="form-group">

                        <label>Deskripsi</label>

                        <textarea name="deskripsi"
                                  class="form-control"
                                  rows="5"
                                  required>{{ old('deskripsi', $ekstrakulikuler->deskripsi) }}</textarea>

                    </div>

                    <div class="form-group">

                        <label>Foto Saat Ini</label>

                        <div class="mb-3">

                            @if(
                                $ekstrakulikuler->foto &&
                                file_exists(
                                    public_path(
                                        'uploads/ekstrakulikuler/' .
                                        $ekstrakulikuler->foto
                                    )
                                )
                            )

                                <img src="{{ asset('uploads/ekstrakulikuler/' . $ekstrakulikuler->foto) }}"
                                     width="200"
                                     height="150">

                            @else

                                <p class="text-muted">
                                    Belum ada foto.
                                </p>

                            @endif

                        </div>

                    </div>

                    <div class="form-group">

                        <label>Ganti Foto</label>

                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp">

                        <small class="form-text text-muted">
                            Kosongkan jika tidak ingin mengganti foto.
                            Maksimal 5 MB.
                        </small>

                    </div>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="mdi mdi-content-save"></i>

                        Update

                    </button>

                    <a href="{{ route('admin.ekstrakulikuler') }}"
                       class="btn btn-light">

                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
