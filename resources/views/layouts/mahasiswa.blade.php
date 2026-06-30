<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - SIKAREMA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/flatly/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

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
                radial-gradient(circle, rgba(11, 94, 215, 0.12) 1.5px, transparent 1.5px) 0 0 / 22px 22px,
                radial-gradient(circle at top left, rgba(18, 184, 134, 0.16), transparent 35%),
                linear-gradient(135deg, #eef9ff, #eafff7);
            color: #1e293b;
            min-height: 100vh;
        }

        .footer-mahasiswa {
            text-align: center;
            padding: 22px 0 10px;
            color: var(--text-muted);
            font-size: 0.82rem;
        }

        .footer-mahasiswa .dot-sep {
            margin: 0 8px;
            opacity: 0.5;
        }

        .navbar-mahasiswa {
            background: linear-gradient(90deg, var(--dark-blue), var(--primary-blue), var(--green));
            padding: 14px 0;
        }

        .navbar-brand-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .navbar-logo-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.16);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 800;
            color: white;
            flex-shrink: 0;
        }
 
.navbar-logo-img {
    width: 200px;
    height: 200px;
    object-fit: contain;
    flex-shrink: 0;
    margin: -115px 0;
}

        .navbar-brand-text { line-height: 1.15; }

        .navbar-brand {
            font-weight: 800;
            letter-spacing: 0.5px;
            font-size: 1.15rem;
            margin: 0;
        }

        .navbar-brand-subtitle {
            font-size: 0.62rem;
            font-weight: 600;
            letter-spacing: 0.06em;
            color: rgba(255, 255, 255, 0.75);
            text-transform: uppercase;
        }

        .nav-link {
            font-weight: 600;
            color: #fff !important;
            margin-left: 22px;
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 0.92rem;
        }

        .nav-link i { font-size: 1rem; }

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
            padding: 8px 22px;
            font-weight: 700;
            margin-left: 22px;
            transition: 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 0.9rem;
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

        .period-track i {
            margin-right: 4px;
        }

        @keyframes marqueeMove {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
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

        /* ════════════════════════════════════════════════════════════════════
           Dashboard Mahasiswa v2 — komponen tambahan
           ════════════════════════════════════════════════════════════════════ */

        /* ── Hero refinements ───────────────────────────────────────────────── */
        .hero-meta {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
            position: relative;
            z-index: 1;
        }

        .hero-meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            font-size: 14px;
            color: var(--dark-blue);
            background: rgba(11, 94, 215, 0.06);
            padding: 7px 14px;
            border-radius: 999px;
        }

        .hero-meta-item i { color: var(--primary-blue); font-size: 15px; }

        .hero-meta-divider {
            width: 1px;
            height: 18px;
            background: rgba(15, 23, 42, 0.12);
        }

        .wave {
            display: inline-block;
            animation: waveHand 1.8s ease-in-out infinite;
            transform-origin: 70% 70%;
        }

        @keyframes waveHand {
            0%, 100% { transform: rotate(0deg); }
            15% { transform: rotate(14deg); }
            30% { transform: rotate(-8deg); }
            45% { transform: rotate(14deg); }
            60% { transform: rotate(0deg); }
        }

        .hero-illustration {
            position: relative;
            z-index: 1;
            height: 100%;
            min-height: 170px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-illustration img {
            max-width: 100%;
            max-height: 200px;
            object-fit: contain;
        }

        .hero-illustration-icon {
            width: 130px;
            height: 130px;
            border-radius: 32px;
            background: linear-gradient(135deg, var(--primary-blue), var(--green));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 56px;
            box-shadow: 0 18px 40px rgba(11, 94, 215, 0.22);
        }

        /* ── Stat Cards v2 ───────────────────────────────────────────────────── */
        .stat-card-v2 {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 26px rgba(15, 23, 42, 0.06);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card-v2:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 34px rgba(15, 23, 42, 0.10);
        }

        .stat-card-v2 .card-body {
            padding: 1.25rem 1.3rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stat-icon-v2 {
            width: 52px;
            height: 52px;
            min-width: 52px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin-bottom: 0;
            flex-shrink: 0;
        }

        .stat-text-v2 {
            min-width: 0;
        }

        .stat-icon-primary { color: var(--primary-blue); background: rgba(11, 94, 215, 0.10); }
        .stat-icon-success  { color: #198754; background: rgba(25, 135, 84, 0.10); }
        .stat-icon-warning  { color: #c98a06; background: rgba(255, 193, 7, 0.16); }
        .stat-icon-purple   { color: #7c3aed; background: rgba(124, 58, 237, 0.10); }

        .stat-number-v2 {
            font-size: 1.65rem;
            font-weight: 800;
            color: var(--dark-blue);
            line-height: 1;
            margin-bottom: 0.3rem;
        }

        .stat-label-v2 {
            font-size: 0.84rem;
            color: var(--dark-blue);
            font-weight: 700;
        }

        .stat-sub-v2 {
            font-size: 0.72rem;
            font-weight: 600;
            margin-top: 0.2rem;
        }

        .stat-sub-positive { color: #198754; }
        .stat-sub-warning  { color: #c98a06; }
        .stat-sub-success  { color: #198754; }
        .stat-sub-purple   { color: #7c3aed; }
        .stat-sub-muted    { color: var(--text-muted); }

        /* ── Section block titles ────────────────────────────────────────────── */
        .section-block-title {
            font-weight: 800;
            color: var(--dark-blue);
            font-size: 1.02rem;
        }

        .link-small {
            font-size: 0.82rem;
            font-weight: 700;
            color: var(--primary-blue);
            text-decoration: none;
        }
        .link-small:hover { text-decoration: underline; }

        /* ── Quick Action Cards ──────────────────────────────────────────────── */
        .quick-action-card {
            display: flex;
            align-items: center;
            gap: 14px;
            background: white;
            border-radius: 18px;
            padding: 1.1rem 1.25rem;
            text-decoration: none;
            box-shadow: 0 10px 26px rgba(15, 23, 42, 0.06);
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
            height: 100%;
        }

        .quick-action-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 34px rgba(15, 23, 42, 0.10);
        }

        .qa-card-primary:hover,
        .qa-card-success:hover,
        .qa-card-purple:hover { background: #ffffff; }

        .quick-action-icon {
            width: 48px;
            height: 48px;
            min-width: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .qa-icon-primary { color: var(--primary-blue); background: rgba(11, 94, 215, 0.10); }
        .qa-icon-success { color: #198754; background: rgba(25, 135, 84, 0.10); }
        .qa-icon-purple  { color: #7c3aed; background: rgba(124, 58, 237, 0.10); }

        .quick-action-text { flex: 1; min-width: 0; }

        .quick-action-title {
            font-weight: 700;
            color: var(--dark-blue);
            font-size: 0.95rem;
            margin-bottom: 2px;
        }

        .quick-action-desc {
            font-size: 0.78rem;
            color: var(--text-muted);
            line-height: 1.4;
        }

        .quick-action-arrow {
            color: var(--text-muted);
            font-size: 0.95rem;
            flex-shrink: 0;
        }

        /* ── Page Card v2 ──────────────────────────────────────────────────────── */
        .page-card-v2 {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 26px rgba(15, 23, 42, 0.06);
        }

        /* ── Prestasi item card ──────────────────────────────────────────────── */
        .prestasi-item-card {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: #f8fafc;
            border-radius: 14px;
            padding: 0.85rem 1rem;
        }

        .prestasi-item-thumb {
            width: 46px;
            height: 46px;
            min-width: 46px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .prestasi-item-main { min-width: 0; flex: 1; }

        .prestasi-item-title {
            font-weight: 700;
            color: var(--dark-blue);
            font-size: 0.92rem;
            margin-bottom: 4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .prestasi-item-meta {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
            font-size: 0.76rem;
            color: var(--text-muted);
        }

        .prestasi-item-date i { margin-right: 3px; }

        /* ── Timeline v2 ───────────────────────────────────────────────────────── */
        .timeline-v2 {
            position: relative;
            padding-left: 6px;
        }

        .timeline-v2-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            position: relative;
            padding-bottom: 1.4rem;
        }

        .timeline-v2-item:last-child { padding-bottom: 0; }

        .timeline-v2-item:not(:last-child)::before {
            content: '';
            position: absolute;
            left: 11px;
            top: 26px;
            bottom: -4px;
            width: 2px;
            background: rgba(15, 23, 42, 0.08);
        }

        .timeline-v2-dot {
            width: 24px;
            height: 24px;
            min-width: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            color: white;
            z-index: 1;
        }

        .dot-success { background: #198754; }
        .dot-warning { background: #e6a817; }
        .dot-info    { background: #0dcaf0; }
        .dot-primary { background: var(--primary-blue); }
        .dot-purple  { background: #7c3aed; }

        .timeline-v2-content {
            min-width: 0;
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 8px;
        }

        .timeline-v2-text {
            font-size: 0.86rem;
            font-weight: 600;
            color: var(--dark-blue);
            line-height: 1.4;
        }

        .timeline-v2-sub {
            font-size: 0.76rem;
            color: var(--text-muted);
            margin-top: 1px;
        }

        .timeline-v2-time {
            font-size: 0.74rem;
            color: var(--text-muted);
            white-space: nowrap;
            flex-shrink: 0;
        }

        /* ── Empty state ───────────────────────────────────────────────────────── */
        .empty-state {
            text-align: center;
            padding: 2.2rem 1rem;
            color: var(--text-muted);
        }

        .empty-state i {
            font-size: 2rem;
            display: block;
            margin-bottom: 0.6rem;
            opacity: 0.5;
        }

        .empty-state p { margin: 0; font-size: 0.88rem; }

        /* ── Status badges (dipakai lintas halaman) ──────────────────────────── */
        .badge-status {
            font-weight: 700;
            font-size: 0.74rem;
            padding: 0.4rem 0.75rem;
            border-radius: 999px;
        }

        /* ── Form styling (Ajukan Prestasi) ──────────────────────────────────── */
        .form-section-title {
            font-weight: 700;
            color: var(--dark-blue);
            font-size: 0.95rem;
            margin-bottom: 1.1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-label-v2 {
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--dark-blue);
            margin-bottom: 0.4rem;
        }

        .form-control,
        .form-select {
            border-radius: 12px;
            border: 1px solid rgba(15, 23, 42, 0.12);
            padding: 0.65rem 0.9rem;
            font-size: 0.9rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.2rem rgba(11, 94, 215, 0.12);
        }

        /* ── Table wrapper v2 (Prestasi Saya / Klaim Reward) ─────────────────── */
        .table-card-v2 {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 26px rgba(15, 23, 42, 0.06);
        }

        .table-card-v2 thead th {
            background: #eff6ff;
            color: var(--dark-blue);
            font-weight: 700;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            border: none;
            padding: 0.9rem 1rem;
            white-space: nowrap;
        }

        .table-card-v2 tbody td {
            padding: 0.9rem 1rem !important;
            vertical-align: middle;
            font-size: 0.88rem;
            border-color: rgba(15, 23, 42, 0.06);
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
                justify-content: center;
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

            .hero-illustration { min-height: 110px; margin-top: 12px; }
            .hero-illustration-icon { width: 90px; height: 90px; font-size: 38px; border-radius: 24px; }
            .stat-number-v2 { font-size: 1.4rem; }
            .quick-action-card { padding: 0.95rem 1rem; }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-mahasiswa shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand-wrap text-decoration-none" href="{{ url('/') }}">
            @if(file_exists(public_path('images/SIKAREMA.png')))
                <img src="{{ asset('images/SIKAREMA.png') }}" alt="Logo SIKAREMA" class="navbar-logo-img">
            @else
                <div class="navbar-logo-icon">S</div>
            @endif
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMahasiswa">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMahasiswa">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mahasiswa.prestasi.create') }}">
                        <i class="bi bi-plus-circle"></i> Ajukan Prestasi
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mahasiswa.prestasi.index') }}">
                        <i class="bi bi-journal-text"></i> Prestasi Saya
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mahasiswa.klaim-reward.index') }}">
                        <i class="bi bi-gift"></i> Klaim Reward
                    </a>
                </li>

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-logout-mahasiswa">
                            <i class="bi bi-box-arrow-right"></i> Logout
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

<footer class="footer-mahasiswa">
    SIKAREMA v1.0 <span class="dot-sep">&bull;</span> Sistem Klaim Reward Prestasi Mahasiswa <span class="dot-sep">&bull;</span> &copy; {{ date('Y') }}
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>