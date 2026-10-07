@extends('layouts.app')

@section('title', 'Detail User')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card card-outline card-primary shadow-sm">
            <div class="card-header">
                <h3 class="card-title mb-0">Detail User</h3>
            </div>

            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-md-4 font-weight-bold">
                        ID User
                    </div>
                    <div class="col-md-8">
                        {{ $user->id_user }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 font-weight-bold">
                        Nama
                    </div>
                    <div class="col-md-8">
                        {{ $user->nama }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 font-weight-bold">
                        Email
                    </div>
                    <div class="col-md-8">
                        {{ $user->email }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 font-weight-bold">
                        Role
                    </div>
                    <div class="col-md-8">
                        @if(strtolower($user->role) === 'admin')
                            <span class="badge bg-primary">
                                <i class="mdi mdi-shield-check"></i>
                                Admin
                            </span>
                        @else
                            <span class="badge bg-secondary">
                                <i class="mdi mdi-account"></i>
                                Operator
                            </span>
                        @endif
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">
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
@endsection
