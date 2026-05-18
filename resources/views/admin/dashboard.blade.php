@extends('layouts.admin')

@section('content')
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