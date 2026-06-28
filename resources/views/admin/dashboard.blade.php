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
    .btn-main {
        padding: 0.85rem 1.35rem;
    }
    h4 {
        font-size: 1.1rem;
    }
    .fw-bold + .text-muted {
        margin-top: 0.2rem;
    }
    .row.g-4 {
        gap: 1.5rem;
    }
</style>
<div class="mb-4">
    <h2 class="fw-bold">Dashboard Admin</h2>
    <p class="text-muted">
        Kelola data utama, verifikasi prestasi, dan klaim reward mahasiswa.
    </p>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card page-card">
            <div class="card-body p-4">
                <div class="feature-icon">M</div>
                <h4 class="fw-bold">Data Mahasiswa</h4>
                <p class="text-muted">
                    Mengelola data mahasiswa sesuai data dari Tugas 1.
                </p>
                <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-main">
                    Kelola Mahasiswa
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card page-card">
            <div class="card-body p-4">
                <div class="feature-icon">H</div>
                <h4 class="fw-bold">Hak Akses</h4>
                <p class="text-muted">
                    Melihat role pengguna seperti Admin dan Mahasiswa.
                </p>
                <a href="{{ route('admin.hak-akses.index') }}" class="btn btn-main">
                    Lihat Hak Akses
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card page-card">
            <div class="card-body p-4">
                <div class="feature-icon">P</div>
                <h4 class="fw-bold">Prestasi</h4>
                <p class="text-muted">
                    Menu untuk verifikasi pengajuan prestasi mahasiswa.
                </p>
                <a href="#" class="btn btn-main">
                    Verifikasi
                </a>
            </div>
        </div>
    </div>
</div>
@endsection