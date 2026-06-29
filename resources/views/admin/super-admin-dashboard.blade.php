@extends('layouts.admin')

@section('title', 'Super Admin')

@section('content')

<div class="mb-4">
    <h2 class="fw-bold">Dashboard Super Admin</h2>
    <p class="text-muted">
        Kelola pengguna, hak akses, dan data utama sistem SIKAREMA.
    </p>
</div>

<x-admin.flash-messages />

<!-- Statistik -->
<div class="stats-row mb-4">

    <div class="stats-tile">
        <div class="stat-icon">
            <i class="bi bi-people-fill"></i>👥
        </div>

        <div>
            <div class="stat-number">{{ $totalUsers }}</div>
            <div class="stat-label">Total User</div>
        </div>
    </div>

    <div class="stats-tile">
        <div class="stat-icon">
            <i class="bi bi-mortarboard-fill"></i>🪪
        </div>

        <div>
            <div class="stat-number">{{ $totalMahasiswa }}</div>
            <div class="stat-label">Mahasiswa</div>
        </div>
    </div>

    <div class="stats-tile">
        <div class="stat-icon">
            <i class="bi bi-person-workspace"></i>👨‍💻
        </div>

        <div>
            <div class="stat-number">{{ $totalAdminPrestasi }}</div>
            <div class="stat-label">Admin Prestasi</div>
        </div>
    </div>

    <div class="stats-tile">
        <div class="stat-icon">
            <i class="bi bi-shield-lock-fill"></i>🛡️
        </div>

        <div>
            <div class="stat-number">{{ $totalHakAkses }}</div>
            <div class="stat-label">Hak Akses</div>
        </div>
    </div>

</div>

<!-- Menu -->
<div class="row g-3">

    <div class="col-12 col-md-6">

        <div class="card page-card u-radius-20 u-card-shadow card-standard-height card-hover">

            <div class="card-body u-card-body-p-4 d-flex flex-column">

                <div class="feature-icon u-feature-icon-size">🔐
                    <i class="bi bi-shield-lock-fill"></i>
                </div>

                <h4 class="fw-bold mb-2">
                    Hak Akses
                </h4>

                <p class="text-muted small mb-4">
                    Mengelola role dan hak akses pengguna sesuai kewenangannya.
                </p>

                <a href="{{ route('admin.hak-akses.index') }}"
                    class="btn btn-main u-btn-main-padding mt-auto w-100">
                    Kelola Hak Akses
                </a>

            </div>

        </div>

    </div>

    <div class="col-12 col-md-6">

        <div class="card page-card u-radius-20 u-card-shadow card-standard-height card-hover">

            <div class="card-body u-card-body-p-4 d-flex flex-column">

                <div class="feature-icon u-feature-icon-size">
                    <i class="bi bi-mortarboard-fill"></i>🎓
                </div>

                <h4 class="fw-bold mb-2">
                    Data Mahasiswa
                </h4>

                <p class="text-muted small mb-4">
                    Mengelola seluruh data mahasiswa yang terdaftar dalam sistem.
                </p>

                <a href="{{ route('admin.mahasiswa.index') }}"
                    class="btn btn-main u-btn-main-padding mt-auto w-100">
                    Kelola Mahasiswa
                </a>

            </div>

        </div>

    </div>

</div>

@endsection