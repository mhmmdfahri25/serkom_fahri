@extends('index')

@section('content')

<div class="row">

    <div class="col-12">

        <div class="card">

            <div class="card-body">

                <!-- ============================= -->
                <!-- HEADER -->
                <!-- ============================= -->

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>

                        <h4 class="card-title mb-1">
                            Data Siswa
                        </h4>

                        <p class="text-muted mb-0">
                            Kelola data siswa sekolah
                        </p>

                    </div>


                    <a href="{{ route('admin.siswa.tambah') }}"
                       class="btn btn-primary">

                        <i class="mdi mdi-plus"></i>

                        Tambah Siswa

                    </a>

                </div>


                <!-- ============================= -->
                <!-- PESAN SUKSES -->
                <!-- ============================= -->

                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show">

                        <i class="mdi mdi-check-circle"></i>

                        {{ session('success') }}

                        <button type="button"
                                class="close"
                                data-dismiss="alert">

                            <span>&times;</span>

                        </button>

                    </div>

                @endif


                <!-- ============================= -->
                <!-- PESAN ERROR -->
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
                <!-- TABLE -->
                <!-- ============================= -->

                <div class="table-responsive">

                    <table id="tabelSiswa"
                           class="table table-striped table-bordered">

                        <thead>

                            <tr>

                                <th>No</th>

                                <th>NISN</th>

                                <th>Nama Siswa</th>

                                <th>Jenis Kelamin</th>

                                <th>Tahun Masuk</th>

                                <th>Aksi</th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($siswas as $siswa)

                                <tr>

                                    <!-- NO -->

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    <!-- NISN -->

                                    <td>
                                        {{ $siswa->nisn }}
                                    </td>


                                    <!-- NAMA -->

                                    <td>
                                        {{ $siswa->nama_siswa }}
                                    </td>


                                    <!-- JENIS KELAMIN -->

                                    <td>
                                        {{ $siswa->jenis_kelamin }}
                                    </td>


                                    <!-- TAHUN MASUK -->

                                    <td>
                                        {{ $siswa->tahun_masuk }}
                                    </td>


                                    <!-- AKSI -->

                                    <td>

                                        <!-- EDIT -->

                                        <a href="{{ route('admin.siswa.edit', $siswa->id) }}"
                                           class="btn btn-warning btn-sm">

                                            <i class="mdi mdi-pencil"></i>

                                        </a>


                                        <!-- HAPUS -->

                                        <form action="{{ route('admin.siswa.destroy', $siswa->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm">

                                                <i class="mdi mdi-delete"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection


<!-- ===================================================== -->
<!-- DATATABLES -->
<!-- ===================================================== -->

@push('scripts')

<script>

$(document).ready(function () {

    $('#tabelSiswa').DataTable({

        pageLength: 10,

        lengthMenu: [

            [10, 25, 50, 100, -1],

            [10, 25, 50, 100, "All"]

        ],

        language: {

            lengthMenu: "Show _MENU_ entries",

            search: "Search:",

            zeroRecords: "No matching records found",

            info: "Showing _START_ to _END_ of _TOTAL_ entries",

            infoEmpty: "Showing 0 to 0 of 0 entries",

            infoFiltered: "(filtered from _MAX_ total entries)",

            paginate: {

                first: "First",

                last: "Last",

                next: "Next",

                previous: "Previous"

            }

        }

    });

});

</script>

@endpush
