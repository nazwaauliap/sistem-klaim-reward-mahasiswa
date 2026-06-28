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
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, var(--dark-blue), var(--primary-blue), var(--green));
            color: white;
            padding: 18px 16px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            transition: width 0.3s ease;
            z-index: 1000;
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
            margin-bottom: 6px;
        }

        .sidebar-brand {
            font-size: 24px;
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
            font-size: 19px;
            font-weight: 700;
            transition: 0.25s ease;
        }

        .sidebar-toggle:hover {
            background: rgba(255, 255, 255, 0.30);
        }

        .sidebar-subtitle {
            font-size: 12px;
            opacity: 0.85;
            margin-bottom: 14px;
            flex-shrink: 0;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0 4px 0 0;
            margin: 0;
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar-menu::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar-menu::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.35);
            border-radius: 999px;
        }

        .sidebar-menu::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-menu li {
            margin-bottom: 7px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 10px 13px;
            border-radius: 13px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 13.5px;
            transition: 0.25s ease;
            white-space: nowrap;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(255, 255, 255, 0.20);
            transform: translateX(3px);
        }

        .sidebar-section-title {
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.68);
            padding: 14px 13px 4px;
            margin-top: 4px;
            margin-bottom: 0 !important;
            white-space: nowrap;
        }

        .sidebar-section-line {
            height: 1px;
            background: rgba(255, 255, 255, 0.16);
            margin: 4px 13px 9px;
        }

        .menu-icon {
            width: 22px;
            min-width: 22px;
            text-align: center;
            font-size: 17px;
        }

        .menu-text {
            transition: opacity 0.2s ease;
        }

        .sidebar-footer {
            flex-shrink: 0;
            padding-top: 14px;
        }

        .sidebar-footer .btn {
            font-size: 13px;
            font-weight: 700;
            border-radius: 999px;
            padding: 9px 12px;
        }

        .btn-logout {
            background: rgba(239, 68, 68, 0.95);
            color: white;
            border: none;
            border-radius: 999px;
            padding: 9px 12px;
            font-weight: 700;
            font-size: 13px;
            transition: 0.25s ease;
        }

        .btn-logout:hover {
            background: #dc2626;
            color: white;
            transform: translateY(-2px);
        }

        .content {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 26px;
            transition: margin-left 0.3s ease, width 0.3s ease;
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

        .admin-wrapper.sidebar-collapsed .sidebar {
            width: 78px;
            padding: 18px 10px;
        }

        .admin-wrapper.sidebar-collapsed .content {
            margin-left: 78px;
            width: calc(100% - 78px);
        }

        .admin-wrapper.sidebar-collapsed .sidebar-brand,
        .admin-wrapper.sidebar-collapsed .sidebar-subtitle,
        .admin-wrapper.sidebar-collapsed .menu-text,
        .admin-wrapper.sidebar-collapsed .sidebar-footer,
        .admin-wrapper.sidebar-collapsed .sidebar-section-title,
        .admin-wrapper.sidebar-collapsed .sidebar-section-line {
            display: none;
        }

        .admin-wrapper.sidebar-collapsed .sidebar-header {
            justify-content: center;
        }

        .admin-wrapper.sidebar-collapsed .sidebar-toggle {
            width: 44px;
            height: 44px;
        }

        .admin-wrapper.sidebar-collapsed .sidebar-menu {
            padding-right: 0;
            margin-top: 18px;
        }

        .admin-wrapper.sidebar-collapsed .sidebar-menu a {
            justify-content: center;
            padding: 11px 0;
            gap: 0;
        }

        .admin-wrapper.sidebar-collapsed .sidebar-menu a:hover,
        .admin-wrapper.sidebar-collapsed .sidebar-menu a.active {
            transform: none;
        }

        .admin-wrapper.sidebar-collapsed .menu-icon {
            font-size: 18px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 78px;
                padding: 18px 10px;
            }

            .content {
                margin-left: 78px;
                width: calc(100% - 78px);
                padding: 18px;
            }

            .sidebar-brand,
            .sidebar-subtitle,
            .menu-text,
            .sidebar-footer,
            .sidebar-section-title,
            .sidebar-section-line {
                display: none;
            }

            .sidebar-header {
                justify-content: center;
            }

            .sidebar-menu {
                padding-right: 0;
                margin-top: 18px;
            }

            .sidebar-menu a {
                justify-content: center;
                padding: 11px 0;
                gap: 0;
            }

            .topbar {
                padding: 18px;
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

            @php
            $role = auth()->user()->hakAkses->nama_akses ?? '';
            @endphp

            <div class="sidebar-subtitle">{{ auth()->user()?->hakAkses?->nama_akses === 'Dosen'
    ? 'Dosen Panel'
    : 'Admin Panel' }}</div>

            <ul class="sidebar-menu">
                @if($role === 'Dosen')
                <li>
                    <a href="{{ route('dosen.dashboard') }}" class="{{ request()->routeIs('dosen.dashboard') ? 'active' : '' }}">
                        <span class="menu-icon">🏠</span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dosen.prestasi-mahasiswa.index') }}" class="{{ request()->routeIs('dosen.prestasi-mahasiswa.*') ? 'active' : '' }}">
                        <span class="menu-icon">📋</span>
                        <span class="menu-text">Data Prestasi Mahasiswa</span>
                    </a>
                </li>
                @elseif($role === 'Super Admin')
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <span class="menu-icon">🏠</span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-section-title">Manajemen Sistem</li>
                <div class="sidebar-section-line"></div>

                <li>
                    <a href="{{ route('admin.hak-akses.index') }}" class="{{ request()->routeIs('admin.hak-akses.*') ? 'active' : '' }}">
                        <span class="menu-icon">🔐</span>
                        <span class="menu-text">Hak Akses</span>
                    </a>
                </li>

                <li class="sidebar-section-title">Manajemen User</li>
                <div class="sidebar-section-line"></div>

                <li>
                    <a href="{{ route('admin.mahasiswa.index') }}" class="{{ request()->routeIs('admin.mahasiswa.*') ? 'active' : '' }}">
                        <span class="menu-icon">🎓</span>
                        <span class="menu-text">Data Mahasiswa</span>
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <span class="menu-icon">🏠</span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-section-title">Master Data</li>
                <div class="sidebar-section-line"></div>

                <li>
                    <a href="{{ route('admin.mahasiswa.index') }}" class="{{ request()->routeIs('admin.mahasiswa.*') ? 'active' : '' }}">
                        <span class="menu-icon">🎓</span>
                        <span class="menu-text">Data Mahasiswa</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.kategori-prestasi.index') }}" class="{{ request()->routeIs('admin.kategori-prestasi.*') ? 'active' : '' }}">
                        <span class="menu-icon">🏆</span>
                        <span class="menu-text">Kategori Prestasi</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.tingkat-prestasi.index') }}" class="{{ request()->routeIs('admin.tingkat-prestasi.*') ? 'active' : '' }}">
                        <span class="menu-icon">📊</span>
                        <span class="menu-text">Tingkat Prestasi</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.periode-klaim.index') }}" class="{{ request()->routeIs('admin.periode-klaim.*') ? 'active' : '' }}">
                        <span class="menu-icon">📅</span>
                        <span class="menu-text">Periode Klaim</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.jenis-reward.index') }}" class="{{ request()->routeIs('admin.jenis-reward.*') ? 'active' : '' }}">
                        <span class="menu-icon">🎁</span>
                        <span class="menu-text">Jenis Reward</span>
                    </a>
                </li>

                <li class="sidebar-section-title">Transaksi</li>
                <div class="sidebar-section-line"></div>

                <li>
                    <a href="{{ route('admin.prestasi-mahasiswa.index') }}" class="{{ request()->routeIs('admin.prestasi-mahasiswa.*') ? 'active' : '' }}">
                        <span class="menu-icon">✅</span>
                        <span class="menu-text">Verifikasi Prestasi</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.klaim-reward.index') }}" class="{{ request()->routeIs('admin.klaim-reward.*') ? 'active' : '' }}">
                        <span class="menu-icon">💰</span>
                        <span class="menu-text">Klaim Reward</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.pencairan-reward.index') }}" class="{{ request()->routeIs('admin.pencairan-reward.*') ? 'active' : '' }}">
                        <span class="menu-icon">💳</span>
                        <span class="menu-text">Pencairan Reward</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.laporan.index') }}" class="{{ request()->routeIs('admin.laporan.*') ? 'active' : '' }}">
                        <span class="menu-icon">📄</span>
                        <span class="menu-text">Laporan</span>
                    </a>
                </li>
                @endif
            </ul>

            <div class="sidebar-footer">
                <a href="{{ url('/') }}" class="btn btn-light w-100 mb-2">
                    Kembali ke Beranda
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-logout w-100">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="content">
            <div class="topbar d-flex justify-content-between align-items-center">
                <div>
                    @php
                    $dashboardRole = auth()->user()->hakAkses->nama_akses ?? '';
                    @endphp

                    @if($dashboardRole === 'Super Admin')
                    <h5 class="fw-bold mb-0">Dashboard Super Admin</h5>
                    <small class="text-muted">
                        Kelola manajemen sistem dan hak akses SIKAREMA.
                    </small>
                    @else
                    <h5 class="fw-bold mb-0">Dashboard Admin</h5>
                    <small class="text-muted">
                        Kelola sistem pengajuan prestasi dan klaim reward mahasiswa.
                    </small>
                    @endif
                </div>

                <div class="text-end d-none d-md-block">
                    <strong>{{ auth()->user()->name ?? 'Admin' }}</strong><br>
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

        sidebarToggle.addEventListener('click', function() {
            adminWrapper.classList.toggle('sidebar-collapsed');

            localStorage.setItem(
                'sidebar-collapsed',
                adminWrapper.classList.contains('sidebar-collapsed')
            );
        });
    </script>

</body>

</html>