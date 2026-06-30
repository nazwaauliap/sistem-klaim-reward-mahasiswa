@extends('layouts.admin')

@section('title', 'Super Admin')

@section('content')

<div class="dashboard-header">
    <h2 class="fw-bold">Dashboard Super Admin</h2>
    <p>Ringkasan statistik sistem dan manajemen hak akses.</p>
</div>

{{-- Stat Cards --}}
<div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-4">
    @php
        $superStats = [
            ['icon' => 'bi-person-fill',      'cls' => 'stat-icon-waiting', 'val' => $totalUsers ?? 0,         'label' => 'Total User',          'desc' => 'Seluruh user terdaftar di sistem'],
            ['icon' => 'bi-mortarboard-fill',  'cls' => 'stat-icon-success', 'val' => $totalMahasiswa ?? 0,     'label' => 'Total Mahasiswa',      'desc' => 'Akun mahasiswa yang terhubung'],
            ['icon' => 'bi-tools',             'cls' => 'stat-icon-warning', 'val' => $totalAdminPrestasi ?? 0, 'label' => 'Admin Prestasi',       'desc' => 'Admin pengelola operasional'],
            ['icon' => 'bi-shield-lock-fill',  'cls' => 'stat-icon-danger',  'val' => $totalHakAkses ?? 0,      'label' => 'Total Hak Akses',      'desc' => 'Role yang tersedia di sistem'],
        ];
    @endphp
    @foreach ($superStats as $s)
    <div class="col">
        <div class="card page-card u-radius-20 u-card-shadow card-hover stat-card h-100">
            <div class="card-body">
                <div class="stat-icon {{ $s['cls'] }}">
                    <i class="bi {{ $s['icon'] }}"></i>
                </div>
                <div class="stat-card-text">
                    <div class="stat-number">{{ $s['val'] }}</div>
                    <div class="stat-card-title">{{ $s['label'] }}</div>
                    <div class="stat-card-desc">{{ $s['desc'] }}</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- Feature Cards --}}
<div class="row g-3">
    <div class="col-md-6">
        <div class="card page-card u-radius-20 u-card-shadow card-hover h-100">
            <div class="card-body u-card-body-p-4 d-flex flex-column align-items-center text-center py-4">
                <div class="admin-feature-icon bg-primary-soft mb-3">
                    <i class="bi bi-people-fill text-primary"></i>
                </div>
                <h5 class="fw-bold mb-2">Manajemen Pengguna</h5>
                <p class="text-muted small mb-4">Kelola seluruh akun pengguna yang terdaftar di sistem SIKAREMA.</p>
                <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-main u-btn-main-padding w-100 mt-auto">
                    Kelola Pengguna <i class="bi bi-chevron-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card page-card u-radius-20 u-card-shadow card-hover h-100">
            <div class="card-body u-card-body-p-4 d-flex flex-column align-items-center text-center py-4">
                <div class="admin-feature-icon bg-success-soft mb-3">
                    <i class="bi bi-shield-lock-fill text-success"></i>
                </div>
                <h5 class="fw-bold mb-2">Hak Akses</h5>
                <p class="text-muted small mb-4">Atur dan kelola role hak akses pengguna sistem.</p>
                <a href="{{ route('admin.hak-akses.index') }}" class="btn btn-main u-btn-main-padding w-100 mt-auto" style="background: linear-gradient(90deg,#198754,#12b886)">
                    Kelola Hak Akses <i class="bi bi-chevron-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection