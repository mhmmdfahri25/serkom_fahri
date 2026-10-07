@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">

        <div class="card">

            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <h4 class="card-title mb-1">
                            Detail Guru
                        </h4>

                        <p class="text-muted mb-0">
                            Informasi lengkap data guru
                        </p>
                    </div>

                </div>
            </div>

            <div class="card-body">

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">

                        <i class="mdi mdi-alert-circle-outline"></i>
                        {{ session('error') }}

                        <button type="button"
                                class="close"
                                data-dismiss="alert">
                            <span>&times;</span>
                        </button>

                    </div>
                @endif

                {{-- Foto dan Nama --}}
                <div class="text-center mb-4">

                    @if($guru->foto && file_exists(public_path('uploads/guru/' . $guru->foto)))

                        <img src="{{ asset('uploads/guru/' . $guru->foto) }}"
                             alt="Foto {{ $guru->nama_guru }}"
                             width="220"
                             height="220"
                             style="object-fit: cover; border-radius: 15px;">

                    @else

                        <div class="d-inline-flex align-items-center justify-content-center"
                             style="width:220px;
                                    height:220px;
                                    background:#f1f3f5;
                                    border-radius:15px;">

                            <i class="mdi mdi-account"
                               style="font-size:110px;color:#999;"></i>

                        </div>

                    @endif

                </div>

                {{-- Informasi Guru --}}
                <div class="table-responsive">

                    <table class="table table-bordered table-striped">

                        <tbody>

                            <tr>
                                <th style="width:30%;">
                                    Nama Guru
                                </th>

                                <td>
                                    {{ $guru->nama_guru }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    NIP
                                </th>

                                <td>
                                    {{ $guru->nip ?? '-' }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Mata Pelajaran
                                </th>

                                <td>
                                    <span class="badge badge-info">
                                        {{ $guru->mata_pelajaran }}
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Foto
                                </th>

                                <td>
                                    @if($guru->foto)
                                        {{ $guru->foto }}
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>

                            @if($guru->created_at)

                                <tr>
                                    <th>
                                        Tanggal Terdaftar
                                    </th>

                                    <td>
                                        {{ $guru->created_at->format('d-m-Y H:i') }}
                                    </td>
                                </tr>

                            @endif

                            @if($guru->updated_at)

                                <tr>
                                    <th>
                                        Terakhir Diperbarui
                                    </th>

                                    <td>
                                        {{ $guru->updated_at->format('d-m-Y H:i') }}
                                    </td>
                                </tr>

                            @endif

                        </tbody>

                    </table>

                </div>

            </div>

            {{-- Footer --}}
            <div class="card-footer bg-white">

                <div class="d-flex justify-content-between align-items-center">

                    <a href="{{ route('admin.guru.index') }}"
                       class="btn btn-light">

                        <i class="mdi mdi-arrow-left"></i>
                        Kembali

                    </a>

                    @if(auth()->user()->role === 'admin')

                        <a href="{{ route('admin.guru.addEdit', Crypt::encrypt($guru->id)) }}"
                           class="btn btn-warning">

                            <i class="mdi mdi-pencil"></i>
                            Edit Data Guru

                        </a>

                    @endif

                </div>

            </div>

        </div>

    </div>
</div>

@endsection
