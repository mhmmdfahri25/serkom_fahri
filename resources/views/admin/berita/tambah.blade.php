@extends('index')

@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-4">
                    Tambah Berita
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

                <form action="{{ route('admin.berita.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label>Judul Berita</label>

                        <input type="text"
                               name="judul"
                               class="form-control"
                               value="{{ old('judul') }}"
                               placeholder="Masukkan judul berita"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Isi Berita</label>

                        <textarea name="isi"
                                  rows="6"
                                  class="form-control"
                                  placeholder="Masukkan isi berita"
                                  required>{{ old('isi') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Tanggal</label>

                        <input type="date"
                               name="tanggal"
                               class="form-control"
                               value="{{ old('tanggal') }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Foto</label>

                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp">
                    </div>

                    <div class="mt-4">

                        <button type="submit"
                                class="btn btn-primary">
                            <i class="mdi mdi-content-save"></i>
                            Simpan
                        </button>

                        <a href="{{ route('admin.berita') }}"
                           class="btn btn-secondary">
                            Kembali
                        </a>

                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
