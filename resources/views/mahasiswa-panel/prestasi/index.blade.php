@extends('layouts.mahasiswa')

@section('content')
<style>
    .prestasi-table {
        min-width: 1100px;
    }

    .prestasi-table th,
    .prestasi-table td {
        padding: 14px 16px;
        font-size: 14px;
        vertical-align: middle;
        white-space: nowrap;
    }

    .table-wrapper {
        overflow-x: auto;
    }
</style>

<div class="mb-4">
    <h2 class="fw-bold">Prestasi Saya</h2>
    <p class="text-muted">
        Daftar prestasi yang sudah diajukan dan status verifikasinya.
    </p>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card page-card">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Daftar Pengajuan Prestasi</h5>

            <a href="{{ route('mahasiswa.prestasi.create') }}" class="btn btn-main">
                + Ajukan Prestasi
            </a>
        </div>

        <div class="table-responsive table-wrapper">
            <table class="table table-hover table-bordered align-middle prestasi-table">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Mahasiswa</th>
                        <th>Kategori</th>
                        <th>Tingkat</th>
                        <th>Nama Kegiatan</th>
                        <th>Juara</th>
                        <th>Sertifikat</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($prestasiMahasiswas as $prestasi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $prestasi->mahasiswa->nama ?? '-' }}</td>
                            <td>{{ $prestasi->kategoriPrestasi->nama_kategori ?? '-' }}</td>
                            <td>{{ $prestasi->tingkatPrestasi->nama_tingkat ?? '-' }}</td>
                            <td>{{ $prestasi->nama_kegiatan }}</td>
                            <td>{{ $prestasi->juara }}</td>
                            <td>
                                @if($prestasi->file_sertifikat)
                                    <a href="{{ asset('storage/' . $prestasi->file_sertifikat) }}" target="_blank" class="btn btn-sm btn-info">
                                        Lihat
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if($prestasi->status_verifikasi == 'Terverifikasi')
                                    <span class="badge bg-success px-3 py-2">Terverifikasi</span>
                                @elseif($prestasi->status_verifikasi == 'Ditolak')
                                    <span class="badge bg-danger px-3 py-2">Ditolak</span>
                                @elseif($prestasi->status_verifikasi == 'Revisi')
                                    <span class="badge bg-warning px-3 py-2">Revisi</span>
                                @else
                                    <span class="badge bg-secondary px-3 py-2">Menunggu</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                Belum ada prestasi yang diajukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection