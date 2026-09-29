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
                            Tambah Guru
                        </h4>

                        <p class="text-muted mb-0">
                            Tambahkan data guru baru
                        </p>

                    </div>

                    <a href="{{ route('admin.guru') }}"
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
                <form action="{{ route('admin.guru.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf


                    {{-- NAMA GURU --}}
                    <div class="form-group">

                        <label>
                            Nama Guru
                        </label>

                        <input type="text"
                               name="nama_guru"
                               class="form-control"
                               value="{{ old('nama_guru') }}"
                               placeholder="Masukkan nama guru"
                               required>

                    </div>


                    {{-- NIP --}}
                    <div class="form-group">

                        <label>
                            NIP
                        </label>

                        <input type="text"
                               name="nip"
                               class="form-control"
                               value="{{ old('nip') }}"
                               placeholder="Masukkan NIP"
                               required>

                    </div>


                    {{-- MATA PELAJARAN --}}
                    <div class="form-group">

                        <label>
                            Mata Pelajaran
                        </label>

                        <input type="text"
                               name="mata_pelajaran"
                               class="form-control"
                               value="{{ old('mata_pelajaran') }}"
                               placeholder="Masukkan mata pelajaran"
                               required>

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


                        <a href="{{ route('admin.guru') }}"
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
