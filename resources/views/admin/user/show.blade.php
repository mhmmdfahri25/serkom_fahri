@extends('layouts.app')

@section('title', 'Detail User')

@section('content')

<div class="row">

    <div class="col-12">

        <div class="card">

            <div class="card-header bg-white">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <h4 class="card-title mb-1">
                            Detail User
                        </h4>

                        <p class="text-muted mb-0">
                            Informasi lengkap pengguna sistem
                        </p>
                    </div>

                </div>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-striped mb-0">

                        <tbody>

                            <tr>
                                <th style="width: 25%;">
                                    ID User
                                </th>

                                <td>
                                    {{ $user->id_user }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Nama
                                </th>

                                <td>
                                    {{ $user->nama }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Email
                                </th>

                                <td>
                                    {{ $user->email }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Role
                                </th>

                                <td>

                                    @if(strtolower($user->role) === 'admin')

                                        <span class="badge badge-primary">
                                            <i class="mdi mdi-shield-check"></i>
                                            Admin
                                        </span>

                                    @else

                                        <span class="badge badge-info">
                                            <i class="mdi mdi-account"></i>
                                            Operator
                                        </span>

                                    @endif

                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

            <div class="card-footer bg-white">

                <div class="d-flex justify-content-between align-items-center">

                    <a href="{{ route('admin.user.index') }}"
                       class="btn btn-light">

                        <i class="mdi mdi-arrow-left"></i>
                        Kembali

                    </a>

                    <a href="{{ route('admin.user.addEdit', Crypt::encrypt($user->id_user)) }}"
                       class="btn btn-warning">

                        <i class="mdi mdi-pencil"></i>
                        Edit

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
