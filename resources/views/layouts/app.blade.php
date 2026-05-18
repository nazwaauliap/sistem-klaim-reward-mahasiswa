<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKAREMA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/flatly/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-blue: #0b5ed7;
            --dark-blue: #0b315f;
            --green: #12b886;
            --gold: #f59f00;
            --soft-bg: #f3f9fb;
            --text-muted: #64748b;
        }

        * {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--soft-bg);
            color: #1e293b;
        }

        .navbar-sikarema {
            background: linear-gradient(90deg, var(--dark-blue), var(--primary-blue), var(--green));
            padding: 18px 0;
        }

        .navbar-brand {
            font-weight: 800;
            letter-spacing: 1px;
        }

        .nav-link {
            font-weight: 500;
            color: #fff !important;
            margin-left: 14px;
            position: relative;
        }

        .nav-link::after {
            content: "";
            width: 0;
            height: 2px;
            background: #fff;
            position: absolute;
            left: 0;
            bottom: 2px;
            transition: 0.25s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .hero-section {
            padding: 95px 0 70px;
            background:
                radial-gradient(circle at top left, rgba(18, 184, 134, 0.18), transparent 35%),
                linear-gradient(135deg, #eef9ff, #eafff7);
        }

        .badge-campus {
            background: rgba(18, 184, 134, 0.12);
            color: var(--green);
            border: 1px solid rgba(18, 184, 134, 0.25);
            border-radius: 999px;
            padding: 10px 16px;
            font-weight: 700;
        }

        .hero-title {
            font-size: 56px;
            font-weight: 800;
            color: var(--dark-blue);
            letter-spacing: 1px;
        }

        .hero-subtitle {
            color: var(--primary-blue);
            font-weight: 700;
            line-height: 1.4;
        }

        .hero-text {
            color: var(--text-muted);
            line-height: 1.9;
            max-width: 760px;
        }

        .btn-role {
            border-radius: 999px;
            padding: 13px 26px;
            font-weight: 700;
            transition: 0.25s ease;
        }

        .btn-role:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(11, 94, 215, 0.18);
        }

        .btn-role:active {
            transform: scale(0.97);
        }

        .btn-mahasiswa {
            background: linear-gradient(90deg, var(--primary-blue), var(--green));
            border: none;
            color: #fff;
        }

        .btn-mahasiswa:hover {
            color: #fff;
        }

        .btn-admin {
            border: 2px solid var(--primary-blue);
            color: var(--primary-blue);
            background: transparent;
        }

        .btn-admin:hover {
            background: var(--primary-blue);
            color: #fff;
        }

        .alur-card {
            border: none;
            border-radius: 26px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.10);
            overflow: hidden;
        }

        .alur-header {
            background: linear-gradient(90deg, var(--dark-blue), var(--primary-blue));
            color: white;
            padding: 20px 24px;
        }

        .step-item {
            display: flex;
            gap: 16px;
            align-items: flex-start;
            padding: 18px 0;
            border-bottom: 1px solid #eef2f7;
        }

        .step-item:last-child {
            border-bottom: none;
        }

        .step-number {
            width: 46px;
            height: 46px;
            min-width: 46px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-blue), var(--green));
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            box-shadow: 0 8px 18px rgba(11, 94, 215, 0.22);
        }

        .step-title {
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 4px;
        }

        .step-text {
            color: var(--text-muted);
            margin-bottom: 0;
        }

        .section-padding {
            padding: 75px 0;
        }

        .section-title {
            font-weight: 800;
            color: var(--dark-blue);
        }

        .section-subtitle {
            color: var(--text-muted);
        }

        .feature-card {
            border: none;
            border-radius: 22px;
            box-shadow: 0 14px 32px rgba(15, 23, 42, 0.08);
            transition: 0.25s ease;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-6px);
        }

        .feature-icon {
            width: 54px;
            height: 54px;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--primary-blue), var(--green));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 20px;
            margin-bottom: 16px;
        }

        .info-strip {
            background: linear-gradient(90deg, var(--dark-blue), var(--primary-blue), var(--green));
            color: white;
            border-radius: 28px;
            padding: 34px;
            box-shadow: 0 16px 35px rgba(11, 49, 95, 0.18);
        }

        footer {
            background: var(--dark-blue);
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-sikarema shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">SIKAREMA</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#alur">Alur</a></li>
                <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Login Admin</a>
                <li class="nav-item"><a class="nav-link" href="#">Login Mahasiswa</a></li>
            </ul>
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer class="text-center py-4">
    <small>&copy; {{ date('Y') }} SIKAREMA - Sistem Pengajuan Prestasi dan Klaim Reward Mahasiswa</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>