<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa - SIKAREMA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/flatly/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-blue: #0b5ed7;
            --dark-blue: #0b315f;
            --green: #12b886;
            --soft-bg: #f3f9fb;
            --text-muted: #64748b;
            --danger: #ef4444;
        }

        * {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(18, 184, 134, 0.16), transparent 35%),
                linear-gradient(135deg, #eef9ff, #eafff7);
            color: #1e293b;
            min-height: 100vh;
        }

        .navbar-mahasiswa {
            background: linear-gradient(90deg, var(--dark-blue), var(--primary-blue), var(--green));
            padding: 16px 0;
        }

        .navbar-brand {
            font-weight: 800;
            letter-spacing: 1px;
        }

        .nav-link {
            font-weight: 600;
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

        .btn-logout-mahasiswa {
            background: var(--danger);
            color: white !important;
            border: none;
            border-radius: 999px;
            padding: 8px 20px;
            font-weight: 700;
            margin-left: 16px;
            transition: 0.25s ease;
        }

        .btn-logout-mahasiswa:hover {
            background: #dc2626;
            color: white !important;
            transform: translateY(-2px);
        }

        .main-content {
            padding: 34px 0 50px;
        }

        .hero-mahasiswa {
            background: white;
            border-radius: 28px;
            padding: 34px 42px;
            box-shadow: 0 16px 36px rgba(15, 23, 42, 0.08);
            margin-bottom: 26px;
            position: relative;
            overflow: hidden;
        }

        .hero-mahasiswa::before {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(18, 184, 134, 0.14);
            top: -80px;
            right: -70px;
        }

        .hero-title {
            color: var(--dark-blue);
            font-weight: 800;
            position: relative;
            z-index: 1;
        }

        .hero-text {
            color: var(--text-muted);
            line-height: 1.8;
            position: relative;
            z-index: 1;
        }

        .badge-soft {
            background: rgba(18, 184, 134, 0.12);
            color: var(--green);
            border: 1px solid rgba(18, 184, 134, 0.25);
            border-radius: 999px;
            padding: 8px 14px;
            font-weight: 700;
            position: relative;
            z-index: 1;
        }

        .hero-brand-simple {
            position: relative;
            z-index: 1;
            height: 100%;
            min-height: 210px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            transform: translateY(-25px);
        }

        .hero-brand-simple h1 {
            font-size: 42px;
            font-weight: 800;
            color: var(--dark-blue);
            letter-spacing: 1px;
            margin-bottom: 6px;
        }

        .hero-brand-simple p {
            color: var(--text-muted);
            font-weight: 500;
            margin-bottom: 0;
            font-size: 16px;
        }

        .period-banner {
            background: linear-gradient(90deg, var(--dark-blue), var(--primary-blue), var(--green));
            border-radius: 20px;
            padding: 14px 0;
            overflow: hidden;
            box-shadow: 0 10px 24px rgba(11, 94, 215, 0.18);
            margin-bottom: 28px;
            position: relative;
        }

        .period-track {
            display: inline-block;
            white-space: nowrap;
            color: #fff;
            font-weight: 700;
            font-size: 15px;
            padding-left: 100%;
            animation: marqueeMove 18s linear infinite;
        }

        .period-track span {
            margin-right: 42px;
        }

        @keyframes marqueeMove {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .page-card,
        .menu-card,
        .stat-card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 14px 32px rgba(15, 23, 42, 0.08);
            transition: 0.25s ease;
        }

        .menu-card {
            border-radius: 26px;
            overflow: hidden;
        }

        .menu-card:hover,
        .stat-card:hover {
            transform: translateY(-5px);
        }

        .menu-card .card-body {
            padding: 34px;
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            background: #dbeafe;
            color: var(--dark-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 14px;
        }

        .action-icon {
            width: 64px;
            height: 64px;
            border-radius: 20px;
            background: linear-gradient(135deg, var(--primary-blue), var(--green));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 18px;
            box-shadow: 0 10px 24px rgba(11, 94, 215, 0.18);
        }

        .action-card-title {
            font-size: 20px;
            font-weight: 800;
            color: var(--dark-blue);
            margin-bottom: 12px;
        }

        .action-card-text {
            color: var(--text-muted);
            line-height: 1.8;
            min-height: 86px;
        }

        .btn-main {
            background: linear-gradient(90deg, var(--primary-blue), var(--green));
            color: white;
            border: none;
            border-radius: 999px;
            padding: 10px 22px;
            font-weight: 700;
            transition: 0.25s ease;
        }

        .btn-main:hover {
            color: white;
            opacity: 0.92;
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(11, 94, 215, 0.20);
        }

        .btn-outline-main {
            border: 2px solid var(--primary-blue);
            color: var(--primary-blue);
            border-radius: 999px;
            padding: 9px 22px;
            font-weight: 700;
            transition: 0.25s ease;
        }

        .btn-outline-main:hover {
            background: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
        }

        .table-primary th {
            background: #dbeafe !important;
            color: var(--dark-blue);
            padding: 14px 16px;
            vertical-align: middle;
        }

        table td {
            padding: 14px 16px !important;
            vertical-align: middle;
        }

        @media (max-width: 768px) {
            .navbar-mahasiswa {
                padding: 12px 0;
            }

            .nav-link {
                margin-left: 0;
                margin-top: 8px;
            }

            .btn-logout-mahasiswa {
                margin-left: 0;
                margin-top: 10px;
                width: 100%;
            }

            .hero-mahasiswa {
                padding: 26px;
            }

            .hero-brand-simple {
                align-items: flex-start;
                text-align: left;
                min-height: auto;
                margin-top: 20px;
            }

            .hero-brand-simple h1 {
                font-size: 34px;
            }

            .period-track {
                font-size: 13px;
                animation-duration: 14s;
            }

            .action-card-text {
                min-height: auto;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-mahasiswa shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('mahasiswa.dashboard') }}">
            SIKAREMA Mahasiswa
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMahasiswa">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMahasiswa">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mahasiswa.dashboard') }}">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mahasiswa.prestasi.create') }}">Ajukan Prestasi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mahasiswa.prestasi.index') }}">Prestasi Saya</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mahasiswa.klaim-reward.index') }}">Klaim Reward</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                </li>

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-logout-mahasiswa">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="main-content">
    <div class="container">
        @yield('content')
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>