@extends('index')

@section('content')

<div class="row">
    <div class="col-12">

        {{-- Alert sukses --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-circle-outline"></i>
                {{ session('success') }}

                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        {{-- Card Data Guru --}}
        <div class="card">

            <div class="card-body">

                {{-- Header --}}
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h4 class="card-title mb-1">
                            Data Guru
                        </h4>

                        <p class="text-muted mb-0">
                            Kelola data guru sekolah
                        </p>
                    </div>

                    <a href="{{ route('admin.guru.tambah') }}"
                       class="btn btn-primary">

                        <i class="mdi mdi-plus"></i>
                        Tambah Guru

                    </a>

                </div>

                {{-- Tabel --}}
                <div class="table-responsive">

                    <table id="tabelGuru"
                           class="table table-striped table-bordered">

                        <thead>
                            <tr>
                                <th width="60">No</th>
                                <th width="120">Foto</th>
                                <th>Nama Guru</th>
                                <th>NIP</th>
                                <th>Mata Pelajaran</th>
                                <th width="180">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($gurus as $guru)

                                <tr>

                                    {{-- Nomor --}}
                                    <td></td>

                                    {{-- Foto --}}
                                    <td class="text-center align-middle">

                                        @if($guru->foto && file_exists(public_path('uploads/guru/' . $guru->foto)))

                                            <img src="{{ asset('uploads/guru/' . $guru->foto) }}"
                                                 alt="Foto {{ $guru->nama_guru }}"
                                                 width="90"
                                                 height="90"
                                                 style="object-fit: cover; border-radius: 10px;">

                                        @else

                                            <div class="d-flex justify-content-center align-items-center"
                                                 style="width:90px;
                                                        height:90px;
                                                        background:#f1f3f5;
                                                        border-radius:10px;
                                                        margin:auto;">

                                                <i class="mdi mdi-account"
                                                   style="font-size:40px;color:#999;"></i>

                                            </div>

                                        @endif

                                    </td>

                                    {{-- Nama --}}
                                    <td class="align-middle">
                                        {{ $guru->nama_guru }}
                                    </td>

                                    {{-- NIP --}}
                                    <td class="align-middle">
                                        {{ $guru->nip }}
                                    </td>

                                    {{-- Mata Pelajaran --}}
                                    <td class="align-middle">
                                        {{ $guru->mata_pelajaran }}
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="align-middle">

                                        <a href="{{ route('admin.guru.edit', $guru->id) }}"
                                           class="btn btn-warning btn-sm">

                                            <i class="mdi mdi-pencil"></i>
                                            Edit

                                        </a>

                                        <form action="{{ route('admin.guru.destroy', $guru->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus data guru ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm">

                                                <i class="mdi mdi-delete"></i>
                                                Hapus

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


@push('scripts')

<script>
$(document).ready(function () {

    var table = $('#tabelGuru').DataTable({

        pageLength: 10,

        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Semua"]
        ],

        language: {

            lengthMenu: "Tampilkan _MENU_ data",

            search: "Cari:",

            zeroRecords: "Data guru tidak ditemukan",

            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",

            infoEmpty: "Tidak ada data",

            infoFiltered: "(difilter dari _MAX_ data)",

            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "Berikutnya",
                previous: "Sebelumnya"
            }

        },

        columnDefs: [
            {
                targets: 0,
                searchable: false,
                orderable: false
            }
        ],

        order: [[2, 'asc']],

        drawCallback: function () {

            var api = this.api();

            api.column(0, {
                page: 'current'
            }).nodes().each(function (cell, i) {

                cell.innerHTML = i + 1;

            });

        }

    });

});
</script>

@endpush
