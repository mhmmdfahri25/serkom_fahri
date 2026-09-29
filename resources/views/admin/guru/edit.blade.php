@extends('index')

@section('content')

<div class="row">
    <div class="col-md-8">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h4 class="card-title mb-1">
                            Edit Guru
                        </h4>

                        <p class="text-muted mb-0">
                            Ubah data guru
                        </p>
                    </div>

                    <a href="{{ route('admin.guru') }}"
                       class="btn btn-light">

                        <i class="mdi mdi-arrow-left"></i>
                        Kembali

                    </a>

                </div>

                @if($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                @endif

                <form action="{{ route('admin.guru.update', $guru->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="form-group">

                        <label>Nama Guru</label>

                        <input type="text"
                               name="nama_guru"
                               class="form-control"
                               value="{{ old('nama_guru', $guru->nama_guru) }}"
                               required>

                    </div>

                    <div class="form-group">

                        <label>NIP</label>

                        <input type="text"
                               name="nip"
                               class="form-control"
                               value="{{ old('nip', $guru->nip) }}"
                               required>

                    </div>

                    <div class="form-group">

                        <label>Mata Pelajaran</label>

                        <input type="text"
                               name="mata_pelajaran"
                               class="form-control"
                               value="{{ old('mata_pelajaran', $guru->mata_pelajaran) }}"
                               required>

                    </div>

                    <div class="form-group">

                        <label>Foto Saat Ini</label>

                        <div class="mb-3">

                            @if($guru->foto && file_exists(public_path('uploads/guru/' . $guru->foto)))

                                <img src="{{ asset('uploads/guru/' . $guru->foto) }}"
                                     alt="Foto {{ $guru->nama_guru }}"
                                     width="120"
                                     height="120"
                                     style="object-fit:cover;border-radius:10px;">

                            @else

                                <div class="d-flex justify-content-center align-items-center"
                                     style="width:120px;height:120px;background:#f1f3f5;border-radius:10px;">

                                    <i class="mdi mdi-account"
                                       style="font-size:50px;color:#999;"></i>

                                </div>

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

                    <div class="mt-4">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="mdi mdi-content-save"></i>
                            Update

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
