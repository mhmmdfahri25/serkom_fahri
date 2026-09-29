@extends('index')

@section('content')

<div class="row">

    <div class="col-12">

        <div class="card">

            {{-- HEADER --}}
            <div class="card-header bg-white">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h4 class="card-title mb-1">
                            Tambah Galeri
                        </h4>

                        <p class="text-muted mb-0">
                            Tambahkan foto atau video sekolah
                        </p>

                    </div>

                    <a href="{{ route('admin.galeri') }}"
                       class="btn btn-light">

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

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                {{-- FORM --}}
                <form action="{{ route('admin.galeri.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf


                    {{-- JUDUL --}}
                    <div class="form-group">

                        <label>
                            Judul
                        </label>

                        <input type="text"
                               name="judul"
                               class="form-control"
                               value="{{ old('judul') }}"
                               placeholder="Masukkan judul galeri"
                               required>

                    </div>


                    {{-- KETERANGAN --}}
                    <div class="form-group">

                        <label>
                            Keterangan
                        </label>

                        <textarea name="keterangan"
                                  class="form-control"
                                  rows="6"
                                  placeholder="Masukkan keterangan"
                                  required>{{ old('keterangan') }}</textarea>

                    </div>


                    {{-- KATEGORI --}}
                    <div class="form-group">

                        <label>
                            Kategori
                        </label>

                        <select name="kategori"
                                class="form-control"
                                required>

                            <option value="">
                                -- Pilih Kategori --
                            </option>

                            <option value="foto"
                                {{ old('kategori') == 'foto' ? 'selected' : '' }}>

                                Foto

                            </option>

                            <option value="video"
                                {{ old('kategori') == 'video' ? 'selected' : '' }}>

                                Video

                            </option>

                        </select>

                    </div>


                    {{-- TANGGAL --}}
                    <div class="form-group">

                        <label>
                            Tanggal
                        </label>

                        <input type="date"
                               name="tanggal"
                               class="form-control"
                               value="{{ old('tanggal') }}"
                               required>

                    </div>


                    {{-- FOTO / VIDEO --}}
                    <div class="form-group">

                        <label>
                            Foto / Video
                        </label>

                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp,.mp4,.mov,.avi,.mkv"
                               required>

                        <small class="form-text text-muted">

                            Foto: JPG, JPEG, PNG, WEBP.
                            Video: MP4, MOV, AVI, MKV.
                            Maksimal 20 MB.

                        </small>

                    </div>


                    {{-- BUTTON --}}
                    <div class="mt-4">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="mdi mdi-content-save"></i>

                            Simpan

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

@endsection
