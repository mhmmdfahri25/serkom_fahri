@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title mb-1">Detail Ekstrakulikuler</h4>
                        <p class="text-muted mb-0">Informasi lengkap ekstrakulikuler sekolah</p>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="text-center mb-4">
                    @if($ekstrakulikuler->foto && file_exists(public_path('uploads/ekstrakulikuler/' . $ekstrakulikuler->foto)))
                        <img src="{{ asset('uploads/ekstrakulikuler/' . $ekstrakulikuler->foto) }}"
                             alt="{{ $ekstrakulikuler->nama_ekstrakulikuler }}"
                             class="img-fluid rounded"
                             style="max-width: 500px; max-height: 350px; object-fit: contain;">
                    @else
                        <div class="p-5 bg-light rounded text-muted">
                            <i class="mdi mdi-image-off mdi-48px d-block mb-2"></i>
                            Foto ekstrakulikuler tidak tersedia.
                        </div>
                    @endif
                </div>

                <div class="text-center mb-4">
                    <h3 class="font-weight-bold mb-2">
                        {{ $ekstrakulikuler->nama_ekstrakulikuler }}
                    </h3>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Nama Ekstrakulikuler</th>
                                <td>{{ $ekstrakulikuler->nama_ekstrakulikuler }}</td>
                            </tr>
                            <tr>
                                <th>Pembina</th>
                                <td>{{ $ekstrakulikuler->pembina }}</td>
                            </tr>
                            <tr>
                                <th>Jadwal Latihan</th>
                                <td>{{ $ekstrakulikuler->jadwal_latihan }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td style="white-space: pre-line;">{{ $ekstrakulikuler->deskripsi }}</td>
                            </tr>
                            <tr>
                                <th>Nama File Foto</th>
                                <td>{{ $ekstrakulikuler->foto ?? '-' }}</td>
                            </tr>
                            @if(isset($ekstrakulikuler->created_at))
                                <tr>
                                    <th>Dibuat</th>
                                    <td>{{ $ekstrakulikuler->created_at ? $ekstrakulikuler->created_at->format('d-m-Y H:i') : '-' }}</td>
                                </tr>
                            @endif
                            @if(isset($ekstrakulikuler->updated_at))
                                <tr>
                                    <th>Terakhir Diubah</th>
                                    <td>{{ $ekstrakulikuler->updated_at ? $ekstrakulikuler->updated_at->format('d-m-Y H:i') : '-' }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.ekstrakulikuler') }}" class="btn btn-light">
                        <i class="mdi mdi-arrow-left"></i>
                        Kembali
                    </a>

                    <a href="{{ route('admin.ekstrakulikuler.addEdit', \Illuminate\Support\Facades\Crypt::encrypt($ekstrakulikuler->id)) }}"
                       class="btn btn-warning">
                        <i class="mdi mdi-pencil"></i>
                        Edit Ekstrakulikuler
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
