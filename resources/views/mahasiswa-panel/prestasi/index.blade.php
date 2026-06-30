@extends('layouts.mahasiswa')

@section('title', 'Prestasi Saya')

@section('content')

    <div class="mb-4">
        <a href="{{ route('mahasiswa.dashboard') }}" class="link-small">
            <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
        </a>
        <h2 class="hero-title mt-2 mb-1">Prestasi Saya</h2>
        <p class="hero-text mb-0">Berikut daftar seluruh prestasi yang telah Anda ajukan.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger rounded-3">
            {{ session('error') }}
        </div>
    @endif

    <div class="card table-card-v2">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                <h5 class="section-block-title mb-0">Daftar Prestasi</h5>
                <a href="{{ route('mahasiswa.prestasi.create') }}" class="btn btn-main">
                    <i class="bi bi-plus-circle me-1"></i> Ajukan Prestasi
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Kategori</th>
                            <th>Tingkat</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($prestasiMahasiswas as $prestasi)
                            @php
                                $statusVal = $prestasi->status_verifikasi ?? 'Menunggu';
                                $statusCls = match($statusVal) {
                                    'Terverifikasi' => 'bg-success',
                                    'Ditolak' => 'bg-danger',
                                    'Revisi' => 'bg-secondary',
                                    default => 'bg-warning text-dark',
                                };
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="fw-semibold" style="color: var(--dark-blue)">
                                        {{ $prestasi->nama_kegiatan }}
                                    </div>
                                    <div class="text-muted small">{{ $prestasi->penyelenggara ?? '-' }}</div>
                                </td>
                                <td>{{ $prestasi->kategoriPrestasi->nama_kategori ?? '-' }}</td>
                                <td>{{ $prestasi->tingkatPrestasi->nama_tingkat ?? '-' }}</td>
                                <td>{{ $prestasi->tanggal_kegiatan }}</td>
                                <td>
                                    <span class="badge badge-status {{ $statusCls }}">{{ $statusVal }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="bi bi-inbox"></i>
                                        <p>Belum ada prestasi yang diajukan.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection