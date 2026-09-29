@extends('index')

@section('content')

<div class="row">

    <div class="col-md-8 mx-auto">

        <div class="card">

            <div class="card-body">

                <!-- ============================= -->
                <!-- JUDUL -->
                <!-- ============================= -->

                <h4 class="card-title">
                    Edit Siswa
                </h4>

                <p class="card-description">
                    Ubah data siswa
                </p>


                <!-- ============================= -->
                <!-- ERROR -->
                <!-- ============================= -->

                @if($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <!-- ============================= -->
                <!-- FORM -->
                <!-- ============================= -->

                <form action="{{ route('admin.siswa.update', $siswa->id) }}"
                      method="POST">

                    @csrf

                    @method('PUT')


                    <!-- NISN -->

                    <div class="form-group">

                        <label>
                            NISN
                        </label>

                        <input type="text"
                               name="nisn"
                               class="form-control"
                               value="{{ old('nisn', $siswa->nisn) }}"
                               maxlength="20"
                               required>

                    </div>


                    <!-- NAMA SISWA -->

                    <div class="form-group">

                        <label>
                            Nama Siswa
                        </label>

                        <input type="text"
                               name="nama_siswa"
                               class="form-control"
                               value="{{ old('nama_siswa', $siswa->nama_siswa) }}"
                               required>

                    </div>


                    <!-- JENIS KELAMIN -->

                    <div class="form-group">

                        <label>
                            Jenis Kelamin
                        </label>

                        <select name="jenis_kelamin"
                                class="form-control"
                                required>

                            <option value="Laki-laki"
                                {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>

                                Laki-laki

                            </option>

                            <option value="Perempuan"
                                {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>

                                Perempuan

                            </option>

                        </select>

                    </div>


                    <!-- TAHUN MASUK -->

                    <div class="form-group">

                        <label>
                            Tahun Masuk
                        </label>

                        <input type="number"
                               name="tahun_masuk"
                               class="form-control"
                               value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}"
                               min="1900"
                               max="2100"
                               required>

                    </div>


                    <!-- BUTTON -->

                    <div class="mt-4">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="mdi mdi-content-save"></i>

                            Update

                        </button>


                        <a href="{{ route('admin.siswa') }}"
                           class="btn btn-light">

                            Kembali

                        </a>

                    </div>


                </form>

            </div>

        </div>

    </div>

</div>

@endsection
