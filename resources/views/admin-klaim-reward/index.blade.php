@extends('layouts.admin')

@section('content')
<style>
    .klaim-table {
        min-width: 1200px;
    }

    .klaim-table th {
        white-space: nowrap;
        padding: 14px 16px;
        font-size: 14px;
        vertical-align: middle;
    }

    .klaim-table td {
        padding: 14px 16px;
        font-size: 14px;
        vertical-align: middle;
        white-space: nowrap;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    .btn-action {
        min-width: 80px;
        margin-bottom: 4px;
    }
</style>

<div class="mb-4">
    <h2 class="fw-bold">Klaim Reward</h2>
    <p class="text-muted">
        Kelola pengajuan klaim reward mahasiswa yang prestasinya sudah terverifikasi.
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
            <h5 class="fw-bold mb-0">Daftar Klaim Reward</h5>
        </div>

        <div class="table-responsive table-wrapper">
            <table class="table table-hover table-bordered align-middle klaim-table">
                <thead class="table-primary">
                    <tr>
                        <th width="80">No</th>
                        <th>Mahasiswa</th>
                        <th>Prestasi</th>
                        <th>Periode</th>
                        <th>Jenis Reward</th>
                        <th>Nominal</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status Klaim</th>
                        <th width="170">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($klaimRewards as $klaim)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $klaim->prestasiMahasiswa->mahasiswa->nama ?? '-' }}</td>
                            <td>{{ $klaim->prestasiMahasiswa->nama_kegiatan ?? '-' }}</td>
                            <td>{{ $klaim->periodeKlaim->nama_periode ?? '-' }}</td>
                            <td>{{ $klaim->jenisReward->nama_reward ?? '-' }}</td>
                            <td>
                                Rp {{ number_format($klaim->jenisReward->nominal ?? 0, 0, ',', '.') }}
                            </td>
                            <td>{{ $klaim->tanggal_pengajuan }}</td>
                            <td>
                                @if($klaim->status_klaim == 'Disetujui')
                                    <span class="badge bg-success px-3 py-2">Disetujui</span>
                                @elseif($klaim->status_klaim == 'Ditolak')
                                    <span class="badge bg-danger px-3 py-2">Ditolak</span>
                                @else
                                    <span class="badge bg-secondary px-3 py-2">Menunggu</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.klaim-reward.edit', $klaim->id_klaim) }}" class="btn btn-sm btn-warning btn-action">
                                    Proses
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">
                                Belum ada data klaim reward.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary rounded-pill px-4 mt-3">
            Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection