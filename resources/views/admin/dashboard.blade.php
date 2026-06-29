@extends('layouts.admin')

@section('title', 'Admin')

@section('content')

    <style>
        /* kept minimal: typography helper retained, other visual utilities moved to public/css/sikarema.css */
        h4 {
            font-size: 1.1rem;
        }

        .fw-bold+.text-muted {
            margin-top: 0.2rem;
        }
    </style>
    <div class="mb-4">
        <h2 class="fw-bold">Dashboard Admin</h2>
        <p class="text-muted">
            Kelola data utama, verifikasi prestasi, dan klaim reward mahasiswa.
        </p>
    </div>

    <x-admin.flash-messages />

    @php
        $totalUsers = \App\Models\User::count();
        $totalMahasiswa = \App\Models\Mahasiswa::count();
        $totalPrestasi = \App\Models\PrestasiMahasiswa::count();
        $totalKlaim = \App\Models\KlaimReward::count();
    @endphp

    <!-- Ringkasan Statistik -->
    <div class="stats-row">
        <div class="stats-tile">
            <div class="stat-icon">👥</div>
            <div>
                <div class="stat-number">{{ $totalUsers }}</div>
                <div class="stat-label">Total User</div>
            </div>
        </div>

        <div class="stats-tile">
            <div class="stat-icon">🎓</div>
            <div>
                <div class="stat-number">{{ $totalMahasiswa }}</div>
                <div class="stat-label">Total Mahasiswa</div>
            </div>
        </div>

        <div class="stats-tile">
            <div class="stat-icon">🏆</div>
            <div>
                <div class="stat-number">{{ $totalPrestasi }}</div>
                <div class="stat-label">Total Prestasi</div>
            </div>
        </div>

        <div class="stats-tile">
            <div class="stat-icon">💰</div>
            <div>
                <div class="stat-number">{{ $totalKlaim }}</div>
                <div class="stat-label">Total Klaim</div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card page-card u-radius-20 u-card-shadow card-standard-height card-hover">
                <div class="card-body u-card-body-p-4 d-flex flex-column">
                    <div class="feature-icon u-feature-icon-size">D<i class="bi bi-mortarboard-fill"></i></div>
                    <h4 class="fw-bold">Data Mahasiswa</h4>
                    <p class="text-muted small mb-4">
                        Mengelola data mahasiswa yang terdaftar dalam sistem SIKAREMA.
                    </p>
                    <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-main u-btn-main-padding mt-auto">
                        Kelola Mahasiswa
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
            <div class="card page-card u-radius-20 u-card-shadow card-standard-height card-hover">
                <div class="card-body u-card-body-p-4 d-flex flex-column">
                    <div class="feature-icon u-feature-icon-size">K<i class="bi bi-shield-lock-fill"></i></div>
                    <h4 class="fw-bold">Klaim Reward</h4>
                    <p class="text-muted small mb-4">
                        Memproses dan memverifikasi pengajuan klaim reward mahasiswa.
                    </p>
                    <a href="{{ route('admin.klaim-reward.index') }}" class="btn btn-main u-btn-main-padding mt-auto">
                        Lihat Klaim Reward
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
            <div class="card page-card u-radius-20 u-card-shadow card-standard-height card-hover">
                <div class="card-body u-card-body-p-4 d-flex flex-column">
                    <div class="feature-icon u-feature-icon-size">P<i class="bi bi-trophy-fill"></i></div>
                    <h4 class="fw-bold">Prestasi</h4>
                    <p class="text-muted small mb-4">
                        Menu untuk verifikasi pengajuan prestasi mahasiswa.
                    </p>
                    <a href="#" class="btn btn-main u-btn-main-padding mt-auto">
                        Verifikasi
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
