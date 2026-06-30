@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<div class="dashboard-header">
    <h2 class="fw-bold">Dashboard Admin</h2>
    <p>Kelola data utama, verifikasi prestasi, dan klaim reward mahasiswa.</p>
</div>

{{-- ======================= --}}
{{-- Stat Cards --}}
{{-- ======================= --}}
<div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-3 mb-4">

    @php
        $adminStats = [
            [
                'icon'  => 'bi-mortarboard-fill',
                'cls'   => 'stat-icon-success',
                'val'   => $totalMahasiswa ?? 0,
                'label' => 'Total Mahasiswa',
                'desc'  => 'Jumlah seluruh mahasiswa terdaftar'
            ],
            [
                'icon'  => 'bi-trophy-fill',
                'cls'   => 'stat-icon-warning',
                'val'   => $totalPrestasi ?? 0,
                'label' => 'Total Prestasi',
                'desc'  => 'Jumlah prestasi yang diajukan'
            ],
            [
                'icon'  => 'bi-gift-fill',
                'cls'   => 'stat-icon-danger',
                'val'   => $totalKlaim ?? 0,
                'label' => 'Total Klaim',
                'desc'  => 'Jumlah klaim reward yang diajukan'
            ],
        ];
    @endphp

    @foreach($adminStats as $stat)
        <div class="col">
            <div class="card page-card u-radius-20 u-card-shadow card-hover stat-card h-100">
                <div class="card-body">
                    <div class="stat-icon {{ $stat['cls'] }}">
                        <i class="bi {{ $stat['icon'] }}"></i>
                    </div>

                    <div class="stat-card-text">
                        <div class="stat-number">
                            {{ $stat['val'] }}
                        </div>

                        <div class="stat-card-title">
                            {{ $stat['label'] }}
                        </div>

                        <div class="stat-card-desc">
                            {{ $stat['desc'] }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

</div>

{{-- ======================= --}}
{{-- Feature Cards --}}
{{-- ======================= --}}
<div class="row g-3">

    {{-- Data Mahasiswa --}}
    <div class="col-md-4">
        <div class="card page-card u-radius-20 u-card-shadow card-hover h-100">
            <div class="card-body u-card-body-p-4 d-flex flex-column align-items-center text-center py-4">

                <div class="admin-feature-icon bg-primary-soft mb-3">
                    <i class="bi bi-people-fill text-primary"></i>
                </div>

                <h5 class="fw-bold mb-2">
                    Data Mahasiswa
                </h5>

                <p class="text-muted small mb-4">
                    Mengelola data mahasiswa sesuai data dari sistem.
                </p>

                <a href="{{ route('admin.mahasiswa.index') }}"
                   class="btn btn-main u-btn-main-padding w-100 mt-auto"
                   style="background: linear-gradient(90deg,#198754)">
                    Kelola Mahasiswa
                    <i class="bi bi-chevron-right ms-1"></i>
                </a>

            </div>
        </div>
    </div>

    {{-- Verifikasi Prestasi --}}
    <div class="col-md-4">
        <div class="card page-card u-radius-20 u-card-shadow card-hover h-100">
            <div class="card-body u-card-body-p-4 d-flex flex-column align-items-center text-center py-4">

                <div class="admin-feature-icon bg-warning-soft mb-3">
                    <i class="bi bi-trophy-fill text-warning"></i>
                </div>

                <h5 class="fw-bold mb-2">
                    Prestasi
                </h5>

                <p class="text-muted small mb-4">
                    Verifikasi pengajuan prestasi mahasiswa.
                </p>

                <a href="{{ route('admin.prestasi-mahasiswa.index') }}"
                   class="btn btn-main u-btn-main-padding w-100 mt-auto"
                   style="background: linear-gradient(90deg,#e6a817,#f59e0b)">

                    Verifikasi
                    <i class="bi bi-chevron-right ms-1"></i>

                </a>

            </div>
        </div>
    </div>

    {{-- Klaim Reward --}}
    <div class="col-md-4">
        <div class="card page-card u-radius-20 u-card-shadow card-hover h-100">
            <div class="card-body u-card-body-p-4 d-flex flex-column align-items-center text-center py-4">

                <div class="admin-feature-icon bg-danger-soft mb-3">
                    <i class="bi bi-gift-fill text-danger"></i>
                </div>

                <h5 class="fw-bold mb-2">
                    Klaim Reward
                </h5>

                <p class="text-muted small mb-4">
                    Kelola proses verifikasi klaim reward mahasiswa.
                </p>

                <a href="{{ route('admin.klaim-reward.index') }}"
                   class="btn btn-main u-btn-main-padding w-100 mt-auto"
                   style="background: linear-gradient(90deg,#dc3545,#ef4444)">

                    Kelola Klaim
                    <i class="bi bi-chevron-right ms-1"></i>

                </a>

            </div>
        </div>
    </div>

</div>

@endsection