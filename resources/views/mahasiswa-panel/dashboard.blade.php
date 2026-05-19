@extends('layouts.mahasiswa')

@section('content')
<div class="hero-mahasiswa">
    <span class="badge-soft">Dashboard Mahasiswa</span>

    <div class="row align-items-center mt-3">
        <div class="col-md-8">
            <h2 class="hero-title mb-3">
                Selamat Datang di SIKAREMA
            </h2>

            <p class="hero-text mb-4">
                Ajukan prestasi yang pernah kamu raih, pantau status verifikasi dari admin,
                dan siapkan klaim reward jika prestasimu sudah terverifikasi.
            </p>

            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('mahasiswa.prestasi.create') }}" class="btn btn-main">
                    Ajukan Prestasi
                </a>

                <a href="{{ route('mahasiswa.prestasi.index') }}" class="btn btn-outline-main">
                    Lihat Prestasi Saya
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="hero-brand-simple">
                <h1>SIKAREMA</h1>
                <p>Prestasi & Reward Mahasiswa</p>
            </div>
        </div>
    </div>
</div>

<div class="period-banner">
    <div class="period-track">
        <span>🎉 KLAIM REWARD PERIODE GENAP 2025/2026 SEDANG DIBUKA</span>
        <span>📌 SEGERA AJUKAN KLAIM UNTUK PRESTASI YANG SUDAH TERVERIFIKASI</span>
        <span>⏰ PASTIKAN DATA PRESTASI DAN BERKAS SUDAH LENGKAP</span>
        <span>🏆 SIKAREMA MEMBANTU PENGAJUAN PRESTASI DAN KLAIM REWARD MAHASISWA</span>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body p-4">
                <div class="stat-icon">🏆</div>
                <h3 class="fw-bold mb-1">{{ $totalPrestasi }}</h3>
                <p class="text-muted mb-0">Total Prestasi Diajukan</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body p-4">
                <div class="stat-icon">⏳</div>
                <h3 class="fw-bold mb-1">{{ $menunggu }}</h3>
                <p class="text-muted mb-0">Menunggu Verifikasi</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body p-4">
                <div class="stat-icon">✅</div>
                <h3 class="fw-bold mb-1">{{ $terverifikasi }}</h3>
                <p class="text-muted mb-0">Prestasi Terverifikasi</p>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card menu-card">
            <div class="card-body">
                <div class="action-icon">🏅</div>
                <h4 class="action-card-title">Ajukan Prestasi</h4>
                <p class="action-card-text">
                    Masukkan data prestasi, kategori, tingkat prestasi, juara, dan unggah
                    sertifikat untuk diverifikasi oleh admin.
                </p>

                <a href="{{ route('mahasiswa.prestasi.create') }}" class="btn btn-main">
                    Ajukan Sekarang
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card menu-card">
            <div class="card-body">
                <div class="action-icon">📂</div>
                <h4 class="action-card-title">Prestasi Saya</h4>
                <p class="action-card-text">
                    Lihat daftar prestasi yang sudah kamu ajukan beserta status verifikasinya:
                    Menunggu, Terverifikasi, Ditolak, atau Revisi.
                </p>

                <a href="{{ route('mahasiswa.prestasi.index') }}" class="btn btn-main">
                    Lihat Prestasi
                </a>
            </div>
        </div>
    </div>
</div>
@endsection