<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SMAN 1 SAMARINDA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logosman1samarinda.png') }}">
</head>

<body class="bg-light">

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-12 col-sm-10 col-md-6 col-lg-4">

            <div class="card shadow border-0">
                <div class="card-body p-4">

                    <div class="text-center mb-4">

                        @if(file_exists(public_path('assets/images/logosman1samarinda.png')))
                            <img src="{{ asset('assets/images/logosman1samarinda.png') }}"
                                 alt="Logo Sekolah"
                                 class="img-fluid"
                                 width="90">
                        @else
                            <img src="{{ asset('assets/images/logo-mini.svg') }}"
                                 alt="Logo"
                                 class="img-fluid"
                                 width="90">
                        @endif

                        <h4 class="mt-3 mb-1">
                            Sistem Informasi Sekolah
                        </h4>

                        <p class="text-muted mb-0">
                            SMAN 1 SAMARINDA
                        </p>

                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">
                            <i class="mdi mdi-check-circle-outline"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <i class="mdi mdi-alert-circle-outline"></i>

                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.process_login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">
                                Email
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="mdi mdi-email-outline"></i>
                                </span>

                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       placeholder="Masukkan email"
                                       value="{{ old('email') }}"
                                       required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Password
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="mdi mdi-lock-outline"></i>
                                </span>

                                <input type="password"
                                       name="password"
                                       id="password"
                                       class="form-control"
                                       placeholder="Masukkan password"
                                       required>

                                <button type="button"
                                        class="btn btn-outline-secondary"
                                        onclick="togglePassword()">
                                    <i class="mdi mdi-eye-outline" id="eyeIcon"></i>
                                </button>
                            </div>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox"
                                   class="form-check-input"
                                   id="remember">

                            <label class="form-check-label" for="remember">
                                Ingat saya
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="mdi mdi-login"></i>
                            Login
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <small class="text-muted">
                            © {{ date('Y') }} SMAN 1 SAMARINDA.
                            All rights reserved.
                        </small>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
function togglePassword() {
    const password = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    if (password.type === 'password') {
        password.type = 'text';
        eyeIcon.classList.remove('mdi-eye-outline');
        eyeIcon.classList.add('mdi-eye-off-outline');
    } else {
        password.type = 'password';
        eyeIcon.classList.remove('mdi-eye-off-outline');
        eyeIcon.classList.add('mdi-eye-outline');
    }
}
</script>

</body>
</html>
