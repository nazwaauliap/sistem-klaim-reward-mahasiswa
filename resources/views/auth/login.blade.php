<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIKAREMA</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            margin: 0;
            font-family: Poppins, sans-serif;
            background: linear-gradient(135deg, #eef7ff, #effff8);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }
        .wrapper {
            max-width: 1180px;
            width: 100%;
            background: #fff;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(0, 0, 0, .12);
        }
        .left {
            background: linear-gradient(180deg, #0b315f, #0b5ed7, #12b886);
            color: #fff;
            padding: 60px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .logo {
            width: 220px;
            margin-bottom: 40px;
        }
        .trophy {
            width: 100%;
            max-width: 320px;
            margin-top: 40px;
            align-self: center;
        }
        .right {
            padding: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 420px;
        }
        .avatar {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: #eef5ff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto auto 20px;
            font-size: 30px;
            color: #0b5ed7;
        }
        .form-control {
            border-radius: 14px;
            padding: 14px 16px;
        }
        .btn-login {
            width: 100%;
            border: none;
            padding: 14px;
            border-radius: 999px;
            background: linear-gradient(90deg, #0b5ed7, #12b886);
            color: #fff;
            font-weight: 700;
        }
        .btn-back {
            width: 100%;
            margin-top: 12px;
            border-radius: 999px;
        }
        @media(max-width: 992px) {
            .left {
                display: none;
            }
            .right {
                padding: 40px 28px;
            }
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="row g-0">
        
        <div class="col-lg-6">
            <div class="left">
                <img class="logo" src="{{ asset('images/logo-putih.png') }}" alt="SIKAREMA">
                <h1 style="font-size:52px; font-weight:800; line-height:1.15;">
                    Apresiasi Prestasi,<br>Raih Reward Terbaik
                </h1>
                <p style="margin-top:20px; font-size:18px; line-height:1.8;">
                    Masuk ke SIKAREMA untuk mengelola pengajuan prestasi dan proses klaim reward mahasiswa secara mudah dan terintegrasi.
                </p>
                <img class="trophy" src="{{ asset('images/trophy.png') }}" alt="Trophy">
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="right">
                <div class="login-card">
                    
                    <div class="avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    
                    <h3 class="text-center fw-bold mb-2">Masuk ke SIKAREMA</h3>
                    <p class="text-center text-muted mb-4">Masukkan email dan password untuk melanjutkan.</p>

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

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login.process') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        
                        <button type="submit" class="btn-login">Masuk</button>
                        <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-back">Kembali ke Beranda</a>
                    </form>

                </div>
            </div>
        </div>
        
    </div>
</div>

</body>
</html>