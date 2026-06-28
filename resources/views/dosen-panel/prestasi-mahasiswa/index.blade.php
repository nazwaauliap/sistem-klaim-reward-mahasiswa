@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Daftar Prestasi Mahasiswa</h2>
    <p class="text-muted">Lihat daftar prestasi dan buka detail untuk verifikasi.</p>
</div>

<div class="card page-card">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Mahasiswa</th>
                        <th>Judul Prestasi</th>
                        <th>Kategori</th>
                        <th>Tingkat</th>
                        <th>Status Dosen</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prestasiMahasiswas as $prestasi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $prestasi->mahasiswa->nama ?? '-' }}</td>
                        <td>{{ $prestasi->nama_kegiatan }}</td>
                        <td>{{ $prestasi->kategoriPrestasi->nama_kategori ?? '-' }}</td>
                        <td>{{ $prestasi->tingkatPrestasi->nama_tingkat ?? '-' }}</td>
                        <td>
                            @if($prestasi->status_dosen === 'Disetujui')
                            <span class="badge" style="background:var(--green);color:white;font-weight:700">Disetujui</span>
                            @elseif($prestasi->status_dosen === 'Ditolak')
                            <span class="badge" style="background:var(--danger-color);color:white;font-weight:700">Ditolak</span>
                            @elseif($prestasi->status_dosen === 'Perlu Revisi')
                            <span class="badge" style="background:var(--primary-blue);color:white;font-weight:700">Perlu Revisi</span>
                            @else
                            <span class="badge bg-secondary">Menunggu</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('dosen.prestasi-mahasiswa.show', $prestasi->id_prestasi) }}" class="btn btn-sm btn-outline-primary">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Belum ada data prestasi mahasiswa.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection