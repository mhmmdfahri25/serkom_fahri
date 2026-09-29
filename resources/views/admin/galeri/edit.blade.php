@extends('index')

@section('content')

<div class="row">
    <div class="col-md-8">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">
                    Edit Galeri
                </h4>

                <p class="card-description">
                    Ubah data galeri sekolah
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

                <form action="{{ route('admin.galeri.update', $galeri->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="form-group">

                        <label>Judul</label>

                        <input type="text"
                               name="judul"
                               class="form-control"
                               value="{{ old('judul', $galeri->judul) }}"
                               required>

                    </div>

                    <div class="form-group">

                        <label>Keterangan</label>

                        <textarea name="keterangan"
                                  class="form-control"
                                  rows="5"
                                  required>{{ old('keterangan', $galeri->keterangan) }}</textarea>

                    </div>

                    <div class="form-group">

                        <label>Kategori</label>

                        <select name="kategori"
                                class="form-control"
                                required>

                            <option value="foto"
                                {{ old('kategori', $galeri->kategori) == 'foto' ? 'selected' : '' }}>
                                Foto
                            </option>

                            <option value="video"
                                {{ old('kategori', $galeri->kategori) == 'video' ? 'selected' : '' }}>
                                Video
                            </option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Tanggal</label>

                        <input type="date"
                               name="tanggal"
                               class="form-control"
                               value="{{ old('tanggal', $galeri->tanggal) }}"
                               required>

                    </div>

                    <div class="form-group">

                        <label>File Saat Ini</label>

                        <div class="mb-3">

                            @if($galeri->foto && $galeri->kategori == 'foto')

                                <img src="{{ asset('uploads/galeri/' . $galeri->foto) }}"
                                     width="200"
                                     height="150">

                            @elseif($galeri->foto && $galeri->kategori == 'video')

                                <video width="250"
                                       height="180"
                                       controls>

                                    <source src="{{ asset('uploads/galeri/' . $galeri->foto) }}">

                                    Browser tidak mendukung video.

                                </video>

                            @endif

                        </div>

                    </div>

                    <div class="form-group">

                        <label>Ganti Foto / Video</label>

                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp,.mp4,.mov,.avi,.mkv">

                        <small class="form-text text-muted">
                            Kosongkan jika tidak ingin mengganti file.
                            Maksimal 20 MB.
                        </small>

                    </div>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="mdi mdi-content-save"></i>
                        Update

                    </button>

                    <a href="{{ route('admin.galeri') }}"
                       class="btn btn-light">

                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection
