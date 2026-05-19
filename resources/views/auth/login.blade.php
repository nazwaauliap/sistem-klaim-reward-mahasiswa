<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIKAREMA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/flatly/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-blue: #0b5ed7;
            --dark-blue: #0b315f;
            --green: #12b886;
            --text-muted: #64748b;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(18, 184, 134, 0.18), transparent 35%),
                linear-gradient(135deg, #eef9ff, #eafff7);
            color: #1e293b;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 16px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 980px;
            background: white;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.12);
            margin: 0 auto;
        }

        .login-wrapper .row {
            align-items: stretch;
        }

        .login-wrapper .col-md-5,
        .login-wrapper .col-md-7 {
            display: flex;
        }

        .login-left,
        .login-right {
            width: 100%;
            height: 100%;
        }

        .login-left {
            background: linear-gradient(180deg, var(--dark-blue), var(--primary-blue), var(--green));
            color: white;
            min-height: 520px;
            padding: 46px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }

        .login-left::after {
            content: "";
            position: absolute;
            width: 230px;
            height: 230px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.12);
            bottom: -80px;
            right: -70px;
        }

        .brand-title {
            font-weight: 800;
            font-size: 42px;
            letter-spacing: 1px;
            position: relative;
            z-index: 1;
        }

        .brand-text {
            line-height: 1.8;
            opacity: 0.95;
            position: relative;
            z-index: 1;
        }

        .login-right {
            padding: 46px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-title {
            font-weight: 800;
            color: var(--dark-blue);
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            border-radius: 14px;
            padding: 12px 14px;
        }

        .btn-main {
            background: linear-gradient(90deg, var(--primary-blue), var(--green));
            color: white;
            border: none;
            border-radius: 999px;
            padding: 11px 24px;
            font-weight: 700;
            transition: 0.25s ease;
        }

        .btn-main:hover {
            color: white;
            opacity: 0.92;
            transform: translateY(-2px);
        }

        .btn-back {
            border-radius: 999px;
            padding: 11px 24px;
            font-weight: 700;
        }

        .alert {
            border: none;
            border-radius: 14px;
            padding: 10px 14px;
            font-size: 14px;
            font-weight: 600;
        }

        .demo-simple {
            margin-top: 16px;
            font-size: 12.5px;
            color: #64748b;
            line-height: 1.7;
        }

        .demo-simple strong {
            color: #0b315f;
        }

        @media (max-width: 768px) {
            .login-left {
                min-height: auto;
                padding: 34px;
                border-bottom-left-radius: 0;
                border-top-right-radius: 30px;
            }

            .login-right {
                padding: 34px;
            }

            .brand-title {
                font-size: 34px;
            }

            .btn-main,
            .btn-back {
                width: 100%;
            }

            .demo-row {
                display: block;
            }

            .demo-account {
                text-align: left;
                margin-top: 3px;
            }
        }
    </style>
</head>
<body>

<div class="container login-container">
    <div class="login-wrapper">
        <div class="row g-0">
            <div class="col-md-5">
                <div class="login-left">
                    <h1 class="brand-title">SIKAREMA</h1>

                    <p class="brand-text mt-3 mb-0">
                        Sistem Pengajuan Prestasi dan Klaim Reward Mahasiswa.
                        Masuk sesuai hak akses untuk mengelola atau mengajukan data prestasi.
                    </p>
                </div>
            </div>

            <div class="col-md-7">
                <div class="login-right">
                    <h3 class="login-title mb-2">Login Akun</h3>

                    <p class="text-muted mb-4">
                        Masukkan email dan password untuk melanjutkan.
                    </p>

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Terjadi kesalahan!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login.process') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Masukkan email" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-main">
                                Login
                            </button>

                            <a href="{{ url('/') }}" class="btn btn-secondary btn-back">
                                Kembali ke Beranda
                            </a>
                        </div>
                    </form>

                <div class="demo-simple">
                    <strong>Akun Demo:</strong><br>
                    Admin: admin@sikarema.test / password<br>
                    Mahasiswa: mahasiswa@sikarema.test / password
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>