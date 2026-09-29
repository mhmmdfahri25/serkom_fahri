@extends('index')

@section('content')

<div class="row">
    <div class="col-12">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">

                <i class="mdi mdi-check-circle-outline"></i>

                {{ session('success') }}

                <button type="button"
                        class="close"
                        data-dismiss="alert">

                    <span>&times;</span>

                </button>

            </div>
        @endif

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h4 class="card-title mb-1">
                            Data Ekstrakulikuler
                        </h4>

                        <p class="text-muted mb-0">
                            Kelola data ekstrakulikuler sekolah
                        </p>
                    </div>

                    <a href="{{ route('admin.ekstrakulikuler.tambah') }}"
                       class="btn btn-primary">

                        <i class="mdi mdi-plus"></i>

                        Tambah Ekstrakulikuler

                    </a>

                </div>

                <div class="table-responsive">

                    <table id="tabelEkstrakulikuler"
                           class="table table-striped table-bordered">

                        <thead>

                            <tr>

                                <th width="60">
                                    No
                                </th>

                                <th width="150">
                                    Foto
                                </th>

                                <th>
                                    Nama Ekstrakulikuler
                                </th>

                                <th>
                                    Pembina
                                </th>

                                <th>
                                    Jadwal Latihan
                                </th>

                                <th>
                                    Deskripsi
                                </th>

                                <th width="180">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($ekstrakulikulers as $ekstrakulikuler)

                                <tr>

                                    <td></td>

                                    <td class="text-center align-middle">

                                        @if(
                                            $ekstrakulikuler->foto &&
                                            file_exists(
                                                public_path(
                                                    'uploads/ekstrakulikuler/' .
                                                    $ekstrakulikuler->foto
                                                )
                                            )
                                        )

                                            <img src="{{ asset('uploads/ekstrakulikuler/' . $ekstrakulikuler->foto) }}"
                                                 alt="{{ $ekstrakulikuler->nama_ekstrakulikuler }}"
                                                 width="120"
                                                 height="100">

                                        @else

                                            <i class="mdi mdi-image mdi-48px"></i>

                                        @endif

                                    </td>

                                    <td class="align-middle">
                                        {{ $ekstrakulikuler->nama_ekstrakulikuler }}
                                    </td>

                                    <td class="align-middle">
                                        {{ $ekstrakulikuler->pembina }}
                                    </td>

                                    <td class="align-middle">
                                        {{ $ekstrakulikuler->jadwal_latihan }}
                                    </td>

                                    <td class="align-middle">
                                        {{ $ekstrakulikuler->deskripsi }}
                                    </td>

                                    <td class="align-middle">

                                        <a href="{{ route('admin.ekstrakulikuler.edit', $ekstrakulikuler->id) }}"
                                           class="btn btn-warning btn-sm">

                                            <i class="mdi mdi-pencil"></i>
                                            Edit

                                        </a>

                                        <form action="{{ route('admin.ekstrakulikuler.destroy', $ekstrakulikuler->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus data ekstrakulikuler ini?')">

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

    $('#tabelEkstrakulikuler').DataTable({

        pageLength: 10,

        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Semua"]
        ],

        language: {

            lengthMenu: "Tampilkan _MENU_ data",

            search: "Cari:",

            zeroRecords: "Data ekstrakulikuler tidak ditemukan",

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
