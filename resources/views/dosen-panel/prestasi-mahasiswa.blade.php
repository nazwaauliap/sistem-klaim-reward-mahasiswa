@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Prestasi Mahasiswa</h2>
    <p class="text-muted">Lihat seluruh prestasi mahasiswa secara read-only.</p>
</div>

<div class="card page-card">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Mahasiswa</th>
                        <th>Kategori</th>
                        <th>Tingkat</th>
                        <th>Nama Kegiatan</th>
                        <th>Penyelenggara</th>
                        <th>Tanggal</th>
                        <th>Juara</th>
                        <th>Status</th>
                        <th>Sertifikat</th>
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
                        <td>{{ $prestasi->penyelenggara }}</td>
                        <td>{{ $prestasi->tanggal_kegiatan }}</td>
                        <td>{{ $prestasi->juara }}</td>
                        <td>
                                @if($prestasi->status_verifikasi == 'Terverifikasi')
                                    <span class="badge" style="background:var(--green);color:white;font-weight:700">Terverifikasi</span>
                                @elseif($prestasi->status_verifikasi == 'Ditolak')
                                    <span class="badge" style="background:var(--danger-color);color:white;font-weight:700">Ditolak</span>
                                @elseif($prestasi->status_verifikasi == 'Revisi')
                                    <span class="badge" style="background:var(--primary-blue);color:white;font-weight:700">Revisi</span>
                                @else
                                    <span class="badge bg-secondary">Menunggu</span>
                                @endif
                        </td>
                        <td>
                            @if($prestasi->file_sertifikat)
                            <a href="{{ asset('storage/' . $prestasi->file_sertifikat) }}" target="_blank" class="btn btn-sm btn-outline-info">Lihat</a>
                            @else
                            -
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center text-muted py-4">Belum ada data prestasi mahasiswa.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a href="{{ route('dosen.dashboard') }}" class="btn btn-secondary rounded-pill px-4 mt-3">Kembali ke Dashboard</a>
    </div>
</div>
@endsection