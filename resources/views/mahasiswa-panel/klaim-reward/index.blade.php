@extends('layouts.mahasiswa')

@section('content')
<style>
    .klaim-table {
        min-width: 1100px;
    }

    .klaim-table th,
    .klaim-table td {
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
    <h2 class="fw-bold">Klaim Reward</h2>
    <p class="text-muted">
        Ajukan klaim reward untuk prestasi yang sudah terverifikasi dan sesuai periode yang dibuka.
    </p>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="card page-card">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Daftar Klaim Reward</h5>

            <a href="{{ route('mahasiswa.klaim-reward.create') }}" class="btn btn-main">
                + Ajukan Klaim
            </a>
        </div>

        <div class="table-responsive table-wrapper">
            <table class="table table-hover table-bordered align-middle klaim-table">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Prestasi</th>
                        <th>Tingkat</th>
                        <th>Periode</th>
                        <th>Jenis Reward</th>
                        <th>Nominal</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Catatan</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($klaimRewards as $klaim)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $klaim->prestasiMahasiswa->nama_kegiatan ?? '-' }}</td>
                            <td>{{ $klaim->prestasiMahasiswa->tingkatPrestasi->nama_tingkat ?? '-' }}</td>
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
                            <td>{{ $klaim->catatan ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">
                                Belum ada klaim reward yang diajukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a href="{{ route('mahasiswa.dashboard') }}" class="btn btn-secondary rounded-pill px-4 mt-3">
            Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection