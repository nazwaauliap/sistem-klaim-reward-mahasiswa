@extends('layouts.admin')

@section('content')
<style>
    .page-card {
        border-radius: 20px;
        box-shadow: 0 16px 38px rgba(15, 23, 42, 0.08);
    }
    .page-card .card-body {
        padding: 1.35rem 1.4rem;
    }
    .feature-icon {
        width: 56px;
        height: 56px;
        border-radius: 18px;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.08);
    }
    h4 {
        font-size: 1.1rem;
    }
    .row.g-4 {
        gap: 1.5rem;
    }
</style>
<div class="mb-4">
    <h2 class="fw-bold">Dashboard Super Admin</h2>
    <p class="text-muted">
        Ringkasan statistik sistem dan manajemen hak akses.
    </p>
</div>

<div class="row g-4">
    <div class="col-md-3">
        <div class="card page-card">
            <div class="card-body p-4">
                <div class="feature-icon">👤</div>
                <h4 class="fw-bold">Total User</h4>
                <p class="text-muted">
                    Jumlah seluruh user yang terdaftar pada sistem.
                </p>
                <h2 class="fw-bold">{{ $totalUsers }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card page-card">
            <div class="card-body p-4">
                <div class="feature-icon">🎓</div>
                <h4 class="fw-bold">Total Mahasiswa</h4>
                <p class="text-muted">
                    Jumlah akun mahasiswa yang terhubung ke data mahasiswa.
                </p>
                <h2 class="fw-bold">{{ $totalMahasiswa }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card page-card">
            <div class="card-body p-4">
                <div class="feature-icon">🛠️</div>
                <h4 class="fw-bold">Total Admin Prestasi</h4>
                <p class="text-muted">
                    Jumlah akun Admin yang mengelola operasional prestasi.
                </p>
                <h2 class="fw-bold">{{ $totalAdminPrestasi }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card page-card">
            <div class="card-body p-4">
                <div class="feature-icon">🔐</div>
                <h4 class="fw-bold">Total Hak Akses</h4>
                <p class="text-muted">
                    Jumlah role hak akses yang tersedia di sistem.
                </p>
                <h2 class="fw-bold">{{ $totalHakAkses }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection