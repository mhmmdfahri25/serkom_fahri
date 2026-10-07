@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-circle-outline"></i>
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-alert-circle-outline"></i>
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="card-title mb-1">Data Guru</h4>
                        <p class="text-muted mb-0">Kelola data guru sekolah</p>
                    </div>

                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.guru.addEdit') }}" class="btn btn-primary">
                            <i class="mdi mdi-plus"></i>
                            Tambah Guru
                        </a>
                    @endif
                </div>

                <div class="table-responsive">
                    <table id="tabelGuru" class="table table-striped table-bordered">

                        <thead>
                            <tr>
                                <th width="60">No</th>
                                <th width="140">Foto</th>
                                <th>Nama Guru</th>
                                <th>NIP</th>
                                <th>Mata Pelajaran</th>
                                <th width="220">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($guru as $item)
                                <tr>
                                    <td class="align-middle"></td>

                                    <td class="align-middle text-center">
                                        @if($item->foto)
                                            <img src="{{ asset('uploads/guru/' . $item->foto) }}"
                                                 alt="Foto Guru"
                                                 width="100"
                                                 height="100"
                                                 style="object-fit: cover; border-radius: 8px;">
                                        @else
                                            <div class="d-flex justify-content-center align-items-center"
                                                 style="width: 100px; height: 100px; margin: auto; border-radius: 8px; background: #f1f3f5;">
                                                <span class="text-muted text-center">
                                                    Tidak ada foto
                                                </span>
                                            </div>
                                        @endif
                                    </td>

                                    <td class="align-middle">
                                        {{ $item->nama_guru }}
                                    </td>

                                    <td class="align-middle">
                                        {{ $item->nip ?? '-' }}
                                    </td>

                                    <td class="align-middle">
                                        <span class="badge badge-info">
                                            {{ $item->mata_pelajaran }}
                                        </span>
                                    </td>

                                    <td class="align-middle text-center">

                                        <a href="{{ route('admin.guru.show', Crypt::encrypt($item->id)) }}"
                                           class="btn btn-info btn-sm text-white"
                                           title="Detail Guru">
                                            <i class="mdi mdi-eye"></i>
                                            Detail
                                        </a>

                                        @if(auth()->user()->role === 'admin')

                                            <a href="{{ route('admin.guru.addEdit', Crypt::encrypt($item->id)) }}"
                                               class="btn btn-warning btn-sm"
                                               title="Edit Guru">
                                                <i class="mdi mdi-pencil"></i>
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.guru.delete', Crypt::encrypt($item->id)) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Yakin ingin menghapus data guru ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-danger btn-sm"
                                                        title="Hapus Guru">
                                                    <i class="mdi mdi-delete"></i>
                                                    Hapus
                                                </button>

                                            </form>

                                        @endif

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

    $('#tabelGuru').DataTable({

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

        order: [
            [2, 'asc']
        ],

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
