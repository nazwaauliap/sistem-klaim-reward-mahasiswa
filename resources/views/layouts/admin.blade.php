<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - SIKAREMA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/flatly/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-blue: #0b5ed7;
            --dark-blue: #0b315f;
            --green: #12b886;
            --soft-bg: #f3f9fb;
            --text-muted: #64748b;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--soft-bg);
            color: #1e293b;
            overflow-x: hidden;
        }

        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 270px;
            background: linear-gradient(180deg, var(--dark-blue), var(--primary-blue), var(--green));
            color: white;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            padding: 24px 18px;
            transition: all 0.3s ease;
            overflow-x: hidden;
            z-index: 1000;
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }

        .sidebar-brand {
            font-size: 26px;
            font-weight: 800;
            letter-spacing: 1px;
            white-space: nowrap;
        }

        .sidebar-toggle {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            border: none;
            background: rgba(255, 255, 255, 0.18);
            color: white;
            font-size: 20px;
            font-weight: 700;
            transition: 0.25s ease;
        }

        .sidebar-toggle:hover {
            background: rgba(255, 255, 255, 0.30);
            transform: scale(1.05);
        }

        .sidebar-subtitle {
            font-size: 13px;
            opacity: 0.85;
            margin-top: -18px;
            margin-bottom: 26px;
            white-space: nowrap;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin-bottom: 10px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 16px;
            border-radius: 14px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: 0.25s ease;
            white-space: nowrap;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(255, 255, 255, 0.20);
            transform: translateX(4px);
        }

        .menu-icon {
            width: 24px;
            min-width: 24px;
            text-align: center;
            font-size: 18px;
        }

        .menu-text {
            transition: opacity 0.2s ease;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 22px;
            left: 18px;
            right: 18px;
        }

        .content {
            margin-left: 270px;
            width: calc(100% - 270px);
            padding: 28px;
            transition: all 0.3s ease;
        }

        .topbar {
            background: white;
            border-radius: 22px;
            padding: 20px 26px;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.08);
            margin-bottom: 28px;
        }

        .page-card,
        .feature-card {
            border: none;
            border-radius: 22px;
            box-shadow: 0 14px 32px rgba(15, 23, 42, 0.08);
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

        .btn-main,
        .btn-mahasiswa {
            background: linear-gradient(90deg, var(--primary-blue), var(--green));
            color: white;
            border: none;
            border-radius: 999px;
            padding: 10px 22px;
            font-weight: 700;
            transition: 0.25s ease;
        }

        .btn-main:hover,
        .btn-mahasiswa:hover {
            color: white;
            opacity: 0.9;
            transform: translateY(-2px);
        }

        .btn-role {
            border-radius: 999px;
            padding: 10px 22px;
            font-weight: 700;
        }

        .section-padding {
            padding: 0;
        }

        .section-title {
            font-weight: 800;
            color: var(--dark-blue);
        }

        .section-subtitle {
            color: var(--text-muted);
        }

        .table-primary th {
            background: #dbeafe !important;
            color: var(--dark-blue);
        }

        /* Saat sidebar ditutup */
        .admin-wrapper.sidebar-collapsed .sidebar {
            width: 92px;
            padding: 24px 14px;
        }

        .admin-wrapper.sidebar-collapsed .content {
            margin-left: 92px;
            width: calc(100% - 92px);
        }

        .admin-wrapper.sidebar-collapsed .sidebar-brand,
        .admin-wrapper.sidebar-collapsed .sidebar-subtitle,
        .admin-wrapper.sidebar-collapsed .menu-text,
        .admin-wrapper.sidebar-collapsed .sidebar-footer {
            display: none;
        }

        .admin-wrapper.sidebar-collapsed .sidebar-brand-short {
            display: block;
        }

        .admin-wrapper.sidebar-collapsed .sidebar-header {
            justify-content: center;
            flex-direction: column;
            gap: 14px;
        }

        .admin-wrapper.sidebar-collapsed .sidebar-toggle {
            width: 46px;
            height: 46px;
        }

        .admin-wrapper.sidebar-collapsed .sidebar-menu a {
            justify-content: center;
            padding: 14px 0;
            gap: 0;
        }

        .admin-wrapper.sidebar-collapsed .sidebar-menu a:hover,
        .admin-wrapper.sidebar-collapsed .sidebar-menu a.active {
            transform: none;
        }

        .admin-wrapper.sidebar-collapsed .menu-icon {
            font-size: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 92px;
                padding: 24px 14px;
            }

            .content {
                margin-left: 92px;
                width: calc(100% - 92px);
                padding: 18px;
            }

            .sidebar-brand,
            .sidebar-subtitle,
            .menu-text,
            .sidebar-footer {
                display: none;
            }

            .sidebar-header {
                justify-content: center;
                flex-direction: column;
                gap: 14px;
            }

            .sidebar-menu a {
                justify-content: center;
                padding: 14px 0;
                gap: 0;
            }

            .topbar {
                padding: 18px;
            }

            .admin-wrapper.sidebar-collapsed .sidebar-header {
                justify-content: center;
                flex-direction: row;
                gap: 0;
            }
        }
    </style>
</head>
<body>

<div class="admin-wrapper">
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-brand">SIKAREMA</div>

            <button type="button" id="sidebarToggle" class="sidebar-toggle">
                ☰
            </button>
        </div>

        <div class="sidebar-subtitle">Admin Panel</div>

        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <span class="menu-icon">🏠</span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.mahasiswa.index') }}" class="{{ request()->routeIs('admin.mahasiswa.*') ? 'active' : '' }}">
                    <span class="menu-icon">🎓</span>
                    <span class="menu-text">Data Mahasiswa</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.hak-akses.index') }}" class="{{ request()->routeIs('admin.hak-akses.*') ? 'active' : '' }}">
                    <span class="menu-icon">🔐</span>
                    <span class="menu-text">Hak Akses</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="menu-icon">🏆</span>
                    <span class="menu-text">Kategori Prestasi</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="menu-icon">📊</span>
                    <span class="menu-text">Tingkat Prestasi</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="menu-icon">📅</span>
                    <span class="menu-text">Periode Klaim</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="menu-icon">✅</span>
                    <span class="menu-text">Verifikasi Prestasi</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="menu-icon">💰</span>
                    <span class="menu-text">Klaim Reward</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="menu-icon">📄</span>
                    <span class="menu-text">Laporan</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <a href="{{ url('/') }}" class="btn btn-light w-100 rounded-pill fw-semibold">
                Kembali ke Beranda
            </a>
        </div>
    </aside>

    <main class="content">
        <div class="topbar d-flex justify-content-between align-items-center">
            <div>
                <h5 class="fw-bold mb-0">Dashboard Admin</h5>
                <small class="text-muted">
                    Kelola sistem pengajuan prestasi dan klaim reward mahasiswa.
                </small>
            </div>

            <div class="text-end d-none d-md-block">
                <strong>Admin</strong><br>
                <small class="text-muted">SIKAREMA</small>
            </div>
        </div>

        @yield('content')
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const sidebarToggle = document.getElementById('sidebarToggle');
    const adminWrapper = document.querySelector('.admin-wrapper');

    if (localStorage.getItem('sidebar-collapsed') === 'true') {
        adminWrapper.classList.add('sidebar-collapsed');
    }

    sidebarToggle.addEventListener('click', function () {
        adminWrapper.classList.toggle('sidebar-collapsed');

        localStorage.setItem(
            'sidebar-collapsed',
            adminWrapper.classList.contains('sidebar-collapsed')
        );
    });
</script>

</body>
</html>