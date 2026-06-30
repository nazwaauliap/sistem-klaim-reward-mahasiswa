@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<div class="dashboard-header">
    <h2 class="fw-bold">Dashboard Admin</h2>
    <p>Kelola data utama, verifikasi prestasi, dan klaim reward mahasiswa.</p>
</div>

{{-- Stat Cards --}}
<div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-4">
    @php
        $adminStats = [
            ['icon' => 'bi-people-fill',     'cls' => 'stat-icon-waiting', 'val' => $totalUser ?? 0,      'label' => 'Total User',      'desc' => 'Jumlah seluruh pengguna sistem'],
            ['icon' => 'bi-mortarboard-fill', 'cls' => 'stat-icon-success', 'val' => $totalMahasiswa ?? 0, 'label' => 'Total Mahasiswa', 'desc' => 'Jumlah seluruh mahasiswa terdaftar'],
            ['icon' => 'bi-trophy-fill',      'cls' => 'stat-icon-warning', 'val' => $totalPrestasi ?? 0,  'label' => 'Total Prestasi',  'desc' => 'Jumlah prestasi yang diajukan'],
            ['icon' => 'bi-gift-fill',        'cls' => 'stat-icon-danger',  'val' => $totalKlaim ?? 0,     'label' => 'Total Klaim',     'desc' => 'Jumlah klaim reward yang diajukan'],
        ];
    @endphp
    @foreach ($adminStats as $s)
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
    <div class="col-md-4">
        <div class="card page-card u-radius-20 u-card-shadow card-hover h-100">
            <div class="card-body u-card-body-p-4 d-flex flex-column align-items-center text-center py-4">
                <div class="admin-feature-icon bg-primary-soft mb-3">
                    <i class="bi bi-people-fill text-primary"></i>
                </div>
                <h5 class="fw-bold mb-2">Data Mahasiswa</h5>
                <p class="text-muted small mb-4">Mengelola data mahasiswa sesuai data dari sistem.</p>
                <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-main u-btn-main-padding w-100 mt-auto">
                    Kelola Mahasiswa <i class="bi bi-chevron-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card page-card u-radius-20 u-card-shadow card-hover h-100">
            <div class="card-body u-card-body-p-4 d-flex flex-column align-items-center text-center py-4">
                <div class="admin-feature-icon bg-success-soft mb-3">
                    <i class="bi bi-shield-lock-fill text-success"></i>
                </div>
                <h5 class="fw-bold mb-2">Hak Akses</h5>
                <p class="text-muted small mb-4">Melihat dan mengelola hak akses pengguna sistem.</p>
                <a href="{{ route('admin.hak-akses.index') }}" class="btn btn-main u-btn-main-padding w-100 mt-auto" style="background: linear-gradient(90deg,#198754,#12b886)">
                    Lihat Hak Akses <i class="bi bi-chevron-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card page-card u-radius-20 u-card-shadow card-hover h-100">
            <div class="card-body u-card-body-p-4 d-flex flex-column align-items-center text-center py-4">
                <div class="admin-feature-icon bg-warning-soft mb-3">
                    <i class="bi bi-trophy-fill text-warning"></i>
                </div>
                <h5 class="fw-bold mb-2">Prestasi</h5>
                <p class="text-muted small mb-4">Verifikasi pengajuan prestasi mahasiswa.</p>
                <a href="{{ route('admin.prestasi-mahasiswa.index') }}" class="btn btn-main u-btn-main-padding w-100 mt-auto" style="background: linear-gradient(90deg,#e6a817,#f59e0b)">
                    Verifikasi <i class="bi bi-chevron-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection