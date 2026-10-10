@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">

        {{-- Pesan berhasil --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-circle-outline"></i>
                {{ session('success') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
        @endif

        {{-- Pesan gagal --}}
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-alert-circle-outline"></i>
                {{ session('error') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">

                {{-- Header --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="card-title mb-1">Daftar Berita</h4>
                        <p class="text-muted mb-0">Kelola berita sekolah</p>
                    </div>

                    @if(auth()->check() && auth()->user()->role === 'admin')
                        <a href="{{ route('admin.berita.addEdit') }}"
                           class="btn btn-primary">
                            <i class="mdi mdi-plus"></i>
                            Tambah Berita
                        </a>
                    @endif
                </div>

                {{-- Tabel berita --}}
                <div class="table-responsive">
                    <table id="tableBerita" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="60">No</th>
                                <th width="100">Foto</th>
                                <th>Judul Berita</th>
                                <th width="150">Tanggal</th>
                                <th>Isi Berita</th>
                                <th width="220">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($beritas as $berita)
                                <tr>
                                    {{-- Nomor urut DataTables --}}
                                    <td class="text-center align-middle"></td>

                                    {{-- Foto --}}
                                    <td class="text-center align-middle">
                                        @if(
                                            $berita->foto &&
                                            file_exists(public_path('uploads/berita/' . $berita->foto))
                                        )
                                            <img
                                                src="{{ asset('uploads/berita/' . $berita->foto) }}"
                                                alt="{{ $berita->judul }}"
                                                width="80"
                                                height="60"
                                                style="object-fit: cover;"
                                                class="rounded">
                                        @else
                                            <div class="d-flex align-items-center justify-content-center bg-light rounded"
                                                 style="width: 80px; height: 60px;">
                                                <i class="mdi mdi-image-off text-muted mdi-24px"></i>
                                            </div>
                                        @endif
                                    </td>

                                    {{-- Judul --}}
                                    <td class="align-middle">
                                        <strong>{{ $berita->judul }}</strong>
                                    </td>

                                    {{-- Tanggal --}}
                                    <td class="align-middle">
                                        <i class="mdi mdi-calendar-outline mr-1"></i>

                                        {{ $berita->tanggal
                                            ? \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y')
                                            : '-' }}
                                    </td>

                                    {{-- Isi --}}
                                    <td class="align-middle">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 100) }}
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="align-middle text-center">

                                        {{-- Detail --}}
                                        <a href="{{ route('admin.berita.show', [
                                            'id' => \Illuminate\Support\Facades\Crypt::encrypt($berita->getKey())
                                        ]) }}"
                                           class="btn btn-info btn-sm text-white">
                                            <i class="mdi mdi-eye"></i>
                                            Detail
                                        </a>

                                        @if(auth()->check() && auth()->user()->role === 'admin')

                                            {{-- Edit --}}
                                            <a href="{{ route('admin.berita.addEdit', [
                                                'id' => \Illuminate\Support\Facades\Crypt::encrypt($berita->getKey())
                                            ]) }}"
                                               class="btn btn-warning btn-sm">
                                                <i class="mdi mdi-pencil"></i>
                                                Edit
                                            </a>

                                            {{-- Hapus --}}
                                            <form
                                                action="{{ route('admin.berita.delete', [
                                                    'id' => \Illuminate\Support\Facades\Crypt::encrypt($berita->getKey())
                                                ]) }}"
                                                method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus berita ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="mdi mdi-delete"></i>
                                                    Hapus
                                                </button>
                                            </form>

                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        Belum ada data berita.
                                    </td>
                                </tr>
                            @endforelse
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
    $('#tableBerita').DataTable({
        pageLength: 10,

        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Semua"]
        ],

        language: {
            lengthMenu: "Tampilkan _MENU_ data",
            search: "Cari:",
            zeroRecords: "Data berita tidak ditemukan",
            emptyTable: "Belum ada data berita",
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
            var start = api.page.info().start;

            api.column(0, {
                page: 'current'
            }).nodes().each(function (cell, i) {
                cell.innerHTML = start + i + 1;
            });
        }
    });
});
</script>
@endpush
