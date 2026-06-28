@extends('layouts.admin')

@section('content')
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