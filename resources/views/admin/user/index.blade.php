@extends('layouts.app')

@section('title', 'User')

@section('content')
<div class="card card-outline card-primary shadow-sm mb-4">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <h3 class="card-title mb-0">Daftar User</h3>

            <a href="{{ route('admin.user.addEdit') }}" class="btn btn-primary">
                <i class="mdi mdi-plus"></i> Tambah User
            </a>
        </div>
    </div>

    <div class="card-body">
        <table id="tableUser" class="table table-bordered table-striped table-hover align-middle responsive nowrap" width="100%">
            <thead class="table-light">
                <tr>
                    <th class="text-center" style="width: 40px;">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th class="text-center" style="width: 120px;">Role</th>
                    <th class="text-center" style="width: 180px;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>

                        <td>{{ $item->nama }}</td>

                        <td>{{ $item->email }}</td>

                        <td class="text-center">
                            @if(strtolower($item->role) === 'admin')
                                <span class="badge bg-primary">
                                    <i class="mdi mdi-shield-check"></i> Admin
                                </span>
                            @else
                                <span class="badge bg-secondary">
                                    <i class="mdi mdi-account"></i> Operator
                                </span>
                            @endif
                        </td>

                        <td class="text-center">
                            <a href="{{ route('admin.user.show', Crypt::encrypt($item->id_user)) }}"
                               class="btn btn-info btn-sm text-white">
                                <i class="mdi mdi-eye"></i>
                                Detail
                            </a>

                            <a href="{{ route('admin.user.addEdit', Crypt::encrypt($item->id_user)) }}"
                               class="btn btn-warning btn-sm">
                                <i class="mdi mdi-pencil"></i>
                                Edit
                            </a>

                            @if($item->id_user != auth()->user()->id_user)
                                <form action="{{ route('admin.user.delete', Crypt::encrypt($item->id_user)) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="mdi mdi-delete"></i>
                                        Hapus
                                    </button>
                                </form>
                            @else
                                <button class="btn btn-secondary btn-sm" disabled>
                                    <i class="mdi mdi-lock"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    $('#tableUser').DataTable({
        pageLength: 10,

        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Semua"]
        ],

        language: {
            lengthMenu: "Tampilkan _MENU_ data",
            search: "Cari:",
            zeroRecords: "Data user tidak ditemukan",
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

        order: [[1, 'asc']],

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
