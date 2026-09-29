@extends('index')

@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-4">
                    Edit Berita
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

                <form action="{{ route('admin.berita.update', $berita->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Judul Berita</label>

                        <input type="text"
                               name="judul"
                               class="form-control"
                               value="{{ old('judul', $berita->judul) }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Isi Berita</label>

                        <textarea name="isi"
                                  rows="6"
                                  class="form-control"
                                  required>{{ old('isi', $berita->isi) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Tanggal</label>

                        <input type="date"
                               name="tanggal"
                               class="form-control"
                               value="{{ old('tanggal', $berita->tanggal) }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Foto Saat Ini</label>

                        <div class="mb-3">

                            @if($berita->foto)

                                <img src="{{ asset('uploads/berita/' . $berita->foto) }}"
                                     width="200"
                                     height="120"
                                     style="object-fit: cover;">

                            @else

                                <p class="text-muted">
                                    Tidak ada foto
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

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti foto.
                        </small>
                    </div>

                    <div class="mt-4">

                        <button type="submit"
                                class="btn btn-primary">
                            <i class="mdi mdi-content-save"></i>
                            Update
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
