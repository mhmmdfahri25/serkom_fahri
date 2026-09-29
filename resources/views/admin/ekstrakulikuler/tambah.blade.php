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
                            Tambah Ekstrakulikuler
                        </h4>

                        <p class="text-muted mb-0">
                            Tambahkan data ekstrakulikuler sekolah
                        </p>

                    </div>

                    <a href="{{ route('admin.ekstrakulikuler') }}"
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
                <form action="{{ route('admin.ekstrakulikuler.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf


                    {{-- NAMA EKSTRAKULIKULER --}}
                    <div class="form-group">

                        <label>
                            Nama Ekstrakulikuler
                        </label>

                        <input type="text"
                               name="nama_ekstrakulikuler"
                               class="form-control"
                               value="{{ old('nama_ekstrakulikuler') }}"
                               placeholder="Contoh: Pramuka"
                               required>

                    </div>


                    {{-- PEMBINA --}}
                    <div class="form-group">

                        <label>
                            Pembina
                        </label>

                        <input type="text"
                               name="pembina"
                               class="form-control"
                               value="{{ old('pembina') }}"
                               placeholder="Nama pembina"
                               required>

                    </div>


                    {{-- JADWAL LATIHAN --}}
                    <div class="form-group">

                        <label>
                            Jadwal Latihan
                        </label>

                        <input type="text"
                               name="jadwal_latihan"
                               class="form-control"
                               value="{{ old('jadwal_latihan') }}"
                               placeholder="Contoh: Jumat, 14:00 - 16:00"
                               required>

                    </div>


                    {{-- DESKRIPSI --}}
                    <div class="form-group">

                        <label>
                            Deskripsi
                        </label>

                        <textarea name="deskripsi"
                                  class="form-control"
                                  rows="6"
                                  placeholder="Masukkan deskripsi ekstrakulikuler"
                                  required>{{ old('deskripsi') }}</textarea>

                    </div>


                    {{-- FOTO --}}
                    <div class="form-group">

                        <label>
                            Foto
                        </label>

                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp">

                        <small class="form-text text-muted">

                            Format JPG, JPEG, PNG, WEBP.
                            Maksimal 5 MB.

                        </small>

                    </div>


                    {{-- BUTTON --}}
                    <div class="mt-4">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="mdi mdi-content-save"></i>

                            Simpan

                        </button>


                        <a href="{{ route('admin.ekstrakulikuler') }}"
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
