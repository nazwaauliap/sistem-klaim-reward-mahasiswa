<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    @php
        $roleTitle = auth()->user()->hakAkses->nama_akses ?? 'Admin';
    @endphp
    {{ $roleTitle }} - SIKAREMA
    </title>
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
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

        .admin-wrapper { display: flex; min-height: 100vh; }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0; left: 0;
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

.sidebar-brand-wrap{
    display:flex;
    justify-content:center;
    align-items:center;
    width:100%;
    height:60px;
}

.logo-full{
    width:180px;
    height:auto;
    display:block;
    transition:.3s;
}

.logo-mini{
    width:42px;
    height:42px;
    display:none;
    transition:.3s;
}

.sidebar-header{
    display:flex;
    align-items:center;
    justify-content:space-between;
    margin-bottom:12px;
}

.admin-wrapper.sidebar-collapsed .sidebar-header{
    flex-direction:column;
}

        .sidebar-logo-icon {
            width: 36px;
            height: 36px;
            min-width: 36px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            font-weight: 800;
            color: white;
            flex-shrink: 0;
        }

        .sidebar-brand {
    display: flex;
    align-items: center;
    padding: 20px 20px 10px;
}

        .sidebar-toggle {
            width: 38px; height: 38px;
            border-radius: 12px; border: none;
            background: rgba(255,255,255,0.18);
            color: white; font-size: 19px; font-weight: 700;
            transition: 0.25s ease;
        }
        .sidebar-toggle:hover { background: rgba(255,255,255,0.30); }

        .sidebar-subtitle { font-size: 12px; opacity: 0.85; margin-bottom: 14px; flex-shrink: 0; }

        .sidebar-menu {
            list-style: none; padding: 0 4px 0 0; margin: 0;
            flex: 1; overflow-y: auto; overflow-x: hidden;
        }
        .sidebar-menu::-webkit-scrollbar { width: 5px; }
        .sidebar-menu::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.35); border-radius: 999px; }
        .sidebar-menu::-webkit-scrollbar-track { background: transparent; }
        .sidebar-menu li { margin-bottom: 7px; }
        .sidebar-menu a {
            display: flex; align-items: center; gap: 11px;
            padding: 10px 13px; border-radius: 13px;
            color: white; text-decoration: none;
            font-weight: 600; font-size: 13.5px;
            transition: 0.25s ease; white-space: nowrap;
        }
        .sidebar-menu a:hover,
        .sidebar-menu a.active { background: rgba(255,255,255,0.20); transform: translateX(3px); }

        .sidebar-section-title {
            font-size: 10px; font-weight: 800; letter-spacing: 1px;
            text-transform: uppercase; color: rgba(255,255,255,0.68);
            padding: 14px 13px 4px; margin-top: 4px; margin-bottom: 0 !important;
            white-space: nowrap;
        }
        .sidebar-section-line { height: 1px; background: rgba(255,255,255,0.16); margin: 4px 13px 9px; }

        .menu-icon { width: 22px; min-width: 22px; text-align: center; font-size: 17px; }
        .menu-text { transition: opacity 0.2s ease; }

        .sidebar-footer { flex-shrink: 0; padding-top: 14px; }
        .sidebar-footer .btn { font-size: 13px; font-weight: 700; border-radius: 999px; padding: 9px 12px; }

        .btn-logout {
            background: rgba(239,68,68,0.95); color: white; border: none;
            border-radius: 999px; padding: 9px 12px; font-weight: 700;
            font-size: 13px; transition: 0.25s ease;
        }
        .btn-logout:hover { background: #dc2626; color: white; transform: translateY(-2px); }

        .content {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 26px;
            transition: margin-left 0.3s ease, width 0.3s ease;
        }

        .topbar {
            background: white; border-radius: 22px;
            padding: 20px 26px;
            box-shadow: 0 12px 28px rgba(15,23,42,0.08);
            margin-bottom: 28px;
        }

        .page-card,
        .feature-card { border: none; border-radius: 22px; box-shadow: 0 14px 32px rgba(15,23,42,0.08); }

        .feature-icon {
            width: 54px; height: 54px; border-radius: 16px;
            background: linear-gradient(135deg, var(--primary-blue), var(--green));
            color: white; display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 20px; margin-bottom: 16px;
        }

        .btn-main, .btn-mahasiswa {
            background: linear-gradient(90deg, var(--primary-blue), var(--green));
            color: white; border: none; border-radius: 999px;
            padding: 10px 22px; font-weight: 700; transition: 0.25s ease;
        }
        .btn-main:hover, .btn-mahasiswa:hover { color: white; opacity: 0.9; transform: translateY(-2px); }

        .btn-role { border-radius: 999px; padding: 10px 22px; font-weight: 700; }
        .section-padding { padding: 0; }
        .section-title { font-weight: 800; color: var(--dark-blue); }
        .section-subtitle { color: var(--text-muted); }
        .table-primary th { background: #dbeafe !important; color: var(--dark-blue); }

        /* Sidebar collapsed */
        .admin-wrapper.sidebar-collapsed .sidebar { width: 78px; padding: 18px 10px; }
        .admin-wrapper.sidebar-collapsed .content { margin-left: 78px; width: calc(100% - 78px); }
        .admin-wrapper.sidebar-collapsed .logo-full{
    display:none;
}

.admin-wrapper.sidebar-collapsed .logo-mini{
    display:block;
}
        .admin-wrapper.sidebar-collapsed .sidebar-brand,
        .admin-wrapper.sidebar-collapsed .sidebar-subtitle,
        .admin-wrapper.sidebar-collapsed .menu-text,
        .admin-wrapper.sidebar-collapsed .sidebar-footer,
        .admin-wrapper.sidebar-collapsed .sidebar-section-title,
        .admin-wrapper.sidebar-collapsed .sidebar-section-line { display: none; }
        .admin-wrapper.sidebar-collapsed .sidebar-header {
            flex-direction: column;
            justify-content: center;
            gap: 10px;
        }
        .admin-wrapper.sidebar-collapsed .sidebar-toggle { width: 44px; height: 44px; }
        .admin-wrapper.sidebar-collapsed .sidebar-menu { padding-right: 0; margin-top: 18px; }
        .admin-wrapper.sidebar-collapsed .sidebar-menu a { justify-content: center; padding: 11px 0; gap: 0; }
        .admin-wrapper.sidebar-collapsed .sidebar-menu a:hover,
        .admin-wrapper.sidebar-collapsed .sidebar-menu a.active { transform: none; }
        .admin-wrapper.sidebar-collapsed .menu-icon { font-size: 18px; }

        @media (max-width: 768px) {
            .sidebar { width: 78px; padding: 18px 10px; }
            .content { margin-left: 78px; width: calc(100% - 78px); padding: 18px; }
            .sidebar-brand, .sidebar-subtitle, .menu-text, .sidebar-footer,
            .sidebar-section-title, .sidebar-section-line { display: none; }
            .sidebar-header { flex-direction: column; justify-content: center; gap: 10px; }
            .sidebar-menu { padding-right: 0; margin-top: 18px; }
            .sidebar-menu a { justify-content: center; padding: 11px 0; gap: 0; }
            .topbar { padding: 18px; }
        }

        /* ── Stat Cards ──────────────────────────────────────────────── */
        .stat-card .card-body {
            padding: 1.25rem 1.35rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            min-width: 52px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.08);
        }

        .stat-icon-waiting { color: #0d6efd; background: rgba(13, 110, 253, 0.10); }
        .stat-icon-success { color: #198754; background: rgba(25, 135, 84, 0.10); }
        .stat-icon-warning { color: #e6a817; background: rgba(255, 193, 7, 0.14); }
        .stat-icon-danger  { color: #dc3545; background: rgba(220, 53, 69, 0.10); }

        .stat-card-text {
            flex: 1;
            min-width: 0;
            overflow: hidden;
        }

        .stat-number {
            font-size: 1.9rem;
            font-weight: 800;
            line-height: 1;
            white-space: nowrap;
        }

        .stat-card-title {
            font-size: 0.88rem;
            font-weight: 700;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-top: 0.2rem;
        }

        .stat-card-desc {
            font-size: 0.8rem;
            color: var(--text-muted);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-top: 0.15rem;
        }

        /* ── Utilities ───────────────────────────────────────────────── */
        .u-radius-20 { border-radius: 20px; }
        .u-card-shadow { box-shadow: 0 16px 38px rgba(15,23,42,0.08); }
        .u-card-body-p-4 { padding: 1.35rem 1.4rem; }
        .u-btn-main-padding { padding: 0.85rem 1.35rem; font-weight: 700; }

        .u-feature-icon-size {
            width: 56px; height: 56px; min-width: 56px;
            border-radius: 18px;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 20px; flex-shrink: 0;
        }

        .card-hover { transition: transform 0.18s ease, box-shadow 0.18s ease; }
        .card-hover:hover { transform: translateY(-6px); box-shadow: 0 22px 48px rgba(15,23,42,0.10); }

        .card-divider { height: 1px; background: rgba(226,232,240,0.85); margin: 1rem 0; }

        .dashboard-header { margin-bottom: 1.5rem; }
        .dashboard-header h2 { font-size: 1.75rem; letter-spacing: -.02em; margin-bottom: 0.4rem; }
        .dashboard-header p { max-width: 720px; color: var(--text-muted); margin-bottom: 0; }

        /* ── Review List ─────────────────────────────────────────────── */
        .dashboard-review-list { display: flex; flex-direction: column; gap: 0.75rem; }

        .review-item-card {
            border-radius: 14px; background: #f8f9fa;
            padding: 0.85rem 1rem;
            display: flex; align-items: center;
            justify-content: space-between; gap: 0.75rem;
        }

        .review-item-icon {
            width: 40px; height: 40px; min-width: 40px;
            border-radius: 50%;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 1rem; flex-shrink: 0;
        }

        /* ── Timeline ────────────────────────────────────────────────── */
        .timeline { position: relative; padding-left: 2.5rem; }
        .timeline::before {
            content: ''; position: absolute;
            left: 30px; top: 0; bottom: 0;
            width: 2px; background: rgba(226,232,240,0.9);
        }
        .timeline-item { position: relative; padding-bottom: 1.25rem; }
        .timeline-item:last-child { padding-bottom: 0; }
        .timeline-marker {
            position: absolute; left: -2px; top: 0;
            width: 44px; height: 44px;
            display: flex; align-items: center; justify-content: center;
        }
        .timeline-dot {
            width: 44px; height: 44px; border-radius: 50%;
            display: inline-flex; align-items: center; justify-content: center;
            border: 1px solid rgba(226,232,240,0.9); background: white;
        }
        .timeline-item .flex-fill { margin-left: 3.5rem; min-width: 0; overflow: hidden; }

        /* ── Table Card ──────────────────────────────────────────────── */
        .table-card table { border-collapse: separate; border-spacing: 0 0.75rem; }
        .table-card .table thead th {
            background: #eff6ff; border: none;
            color: var(--dark-blue); font-weight: 700;
            letter-spacing: 0.05em; text-transform: uppercase;
            padding: 1rem 1.1rem;
            border-bottom: 1px solid rgba(15,23,42,0.08);
        }
        .table-card .table tbody tr {
            background: white;
            box-shadow: 0 12px 24px rgba(15,23,42,0.04);
            transition: transform 0.16s ease, background-color 0.2s ease, box-shadow 0.2s ease;
        }
        .table-card .table tbody tr:hover {
            background: rgba(13,110,253,0.08);
            transform: translateY(-1px);
            box-shadow: 0 16px 30px rgba(15,23,42,0.07);
        }
        .table-card .table td { padding: 1rem; vertical-align: middle; border-top: none; background: transparent; }
        .table-card .table th:first-child { border-top-left-radius: 0.85rem; }
        .table-card .table th:last-child  { border-top-right-radius: 0.85rem; }
        .table-card .table tbody tr td:first-child { border-bottom-left-radius: 0.9rem; }
        .table-card .table tbody tr td:last-child  { border-bottom-right-radius: 0.9rem; }
        .table-card .badge-category { font-size: 0.72rem; padding: 0.35rem 0.65rem; border-radius: 0.85rem; }
        .table-card .btn-sm { padding: 0.45rem 0.85rem; font-size: 0.82rem; }
        .table-card .card-body { padding: 1.35rem 1.4rem; }
    </style>
</head>

<body>

    <div class="admin-wrapper">
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-brand-wrap">

                    <img
                        src="{{ asset('images/SIKAREMA.png') }}"
                        class="logo-full"
                        alt="SIKAREMA">

                    <img
                        src="{{ asset('images/mini-SIKAREMA.png') }}"
                        class="logo-mini"
                        alt="SIKAREMA">

                </div>
                <button type="button" id="sidebarToggle" class="sidebar-toggle">☰</button>
            </div>

            @php
            $role = auth()->user()->hakAkses->nama_akses ?? '';
            @endphp

            <div class="sidebar-subtitle">{{ auth()->user()?->hakAkses?->nama_akses === 'Dosen' ? 'Dosen Panel' : 'Admin Panel' }}</div>

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
                        <span class="menu-text">Prestasi Mahasiswa</span>
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
                        <span class="menu-icon">🎓</span><span class="menu-text">Data Mahasiswa</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.kategori-prestasi.index') }}" class="{{ request()->routeIs('admin.kategori-prestasi.*') ? 'active' : '' }}">
                        <span class="menu-icon">🏆</span><span class="menu-text">Kategori Prestasi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.tingkat-prestasi.index') }}" class="{{ request()->routeIs('admin.tingkat-prestasi.*') ? 'active' : '' }}">
                        <span class="menu-icon">📊</span><span class="menu-text">Tingkat Prestasi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.periode-klaim.index') }}" class="{{ request()->routeIs('admin.periode-klaim.*') ? 'active' : '' }}">
                        <span class="menu-icon">📅</span><span class="menu-text">Periode Klaim</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.jenis-reward.index') }}" class="{{ request()->routeIs('admin.jenis-reward.*') ? 'active' : '' }}">
                        <span class="menu-icon">🎁</span><span class="menu-text">Jenis Reward</span>
                    </a>
                </li>
                <li class="sidebar-section-title">Transaksi</li>
                <div class="sidebar-section-line"></div>
                <li>
                    <a href="{{ route('admin.prestasi-mahasiswa.index') }}" class="{{ request()->routeIs('admin.prestasi-mahasiswa.*') ? 'active' : '' }}">
                        <span class="menu-icon">✅</span><span class="menu-text">Verifikasi Prestasi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.klaim-reward.index') }}" class="{{ request()->routeIs('admin.klaim-reward.*') ? 'active' : '' }}">
                        <span class="menu-icon">💰</span><span class="menu-text">Klaim Reward</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.pencairan-reward.index') }}" class="{{ request()->routeIs('admin.pencairan-reward.*') ? 'active' : '' }}">
                        <span class="menu-icon">💳</span><span class="menu-text">Pencairan Reward</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.laporan.index') }}" class="{{ request()->routeIs('admin.laporan.*') ? 'active' : '' }}">
                        <span class="menu-icon">📄</span><span class="menu-text">Laporan</span>
                    </a>
                </li>
                @endif
            </ul>

            <div class="sidebar-footer">
                <a href="{{ url('/') }}" class="btn btn-light w-100 mb-2">Kembali ke Beranda</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-logout w-100">Logout</button>
                </form>
            </div>
        </aside>

        <main class="content">
        <div class="topbar d-flex justify-content-between align-items-center">
            <div>
                @php $dashboardRole = auth()->user()->hakAkses->nama_akses ?? ''; @endphp
                @if($dashboardRole === 'Super Admin')
                    <h5 class="fw-bold mb-0">Dashboard Super Admin</h5>
                    <small class="text-muted">Kelola manajemen sistem dan hak akses SIKAREMA.</small>
                @elseif($dashboardRole === 'Dosen')
                    <h5 class="fw-bold mb-0">Dashboard Dosen</h5>
                    <small class="text-muted">Kelola proses verifikasi prestasi mahasiswa.</small>
                @else
                    <h5 class="fw-bold mb-0">Dashboard Admin</h5>
                    <small class="text-muted">Kelola sistem pengajuan prestasi dan klaim reward mahasiswa.</small>
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
            localStorage.setItem('sidebar-collapsed', adminWrapper.classList.contains('sidebar-collapsed'));
        });

        // Persist sidebar scroll position across page navigations
        (function() {
            const KEY = 'sikarema.sidebar.scrollTop';
            const menu = document.querySelector('.sidebar .sidebar-menu');
            if (!menu) return;

            // Restore scroll position immediately (before paint) to avoid visible jump
            const saved = parseInt(sessionStorage.getItem(KEY) || '0', 10);
            if (saved > 0) {
                menu.scrollTop = saved;
            }

            // Save scroll position continuously while scrolling
            let saveTimeout = null;
            menu.addEventListener('scroll', function() {
                if (saveTimeout) clearTimeout(saveTimeout);
                saveTimeout = setTimeout(() => {
                    sessionStorage.setItem(KEY, String(menu.scrollTop));
                }, 80);
            }, { passive: true });

            // Save scroll position right before navigating away (covers clicks
            // that happen faster than the debounce above)
            menu.addEventListener('click', function(e) {
                const link = e.target.closest('a');
                if (link) {
                    sessionStorage.setItem(KEY, String(menu.scrollTop));
                }
            });

            // Also save on page unload as a safety net
            window.addEventListener('beforeunload', function() {
                sessionStorage.setItem(KEY, String(menu.scrollTop));
            });
        })();
    </script>

</body>
</html>