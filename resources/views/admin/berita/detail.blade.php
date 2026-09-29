@extends('index')

@section('content')

<div class="row">

    <div class="col-12">

        <div class="card">

            {{-- HEADER --}}
            <div class="card-header bg-white">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h4 class="card-title mb-1">
                            Detail Berita
                        </h4>

                        <p class="text-muted mb-0">
                            Informasi lengkap berita sekolah
                        </p>

                    </div>

                    <a href="{{ route('admin.berita') }}"
                       class="btn btn-secondary btn-sm">

                        <i class="mdi mdi-arrow-left"></i>

                        Kembali

                    </a>

                </div>

            </div>


            {{-- ISI --}}
            <div class="card-body">

                {{-- FOTO --}}
                @if($berita->foto)

                    <div class="text-center mb-4">

                        <img src="{{ asset('uploads/berita/' . $berita->foto) }}"
                             alt="{{ $berita->judul }}"
                             class="img-fluid rounded"
                             style="
                                max-width: 900px;
                                width: 100%;
                                max-height: 500px;
                                object-fit: cover;
                             ">

                    </div>

                @endif


                {{-- TANGGAL --}}
                <div class="mb-3">

                    <span class="text-muted">

                        <i class="mdi mdi-calendar-outline mr-1"></i>

                        {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}

                    </span>

                </div>


                {{-- JUDUL --}}
                <h2 class="font-weight-bold mb-4">

                    {{ $berita->judul }}

                </h2>


                {{-- ISI BERITA --}}
                <div class="text-dark"
                     style="
                        font-size: 16px;
                        line-height: 1.8;
                     ">

                    {!! nl2br(e($berita->isi)) !!}

                </div>


                {{-- ACTION --}}
                <div class="mt-5 pt-4 border-top">

                    <a href="{{ route('admin.berita.edit', $berita->id) }}"
                       class="btn btn-warning">

                        <i class="mdi mdi-pencil"></i>

                        Edit Berita

                    </a>


                    <form action="{{ route('admin.berita.destroy', $berita->id) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Yakin ingin menghapus berita ini?')">

                        @csrf

                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger">

                            <i class="mdi mdi-delete"></i>

                            Hapus Berita

                        </button>

                    </form>


                    <a href="{{ route('admin.berita') }}"
                       class="btn btn-secondary">

                        Kembali

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
