@extends('layouts.mahasiswa')

@section('title', 'Klaim Reward')

@section('content')

    <div class="mb-4">
        <a href="{{ route('mahasiswa.dashboard') }}" class="link-small">
            <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
        </a>
        <h2 class="hero-title mt-2 mb-1">Klaim Reward</h2>
        <p class="hero-text mb-0">
            Ajukan klaim reward atas prestasi yang telah diverifikasi.
        </p>
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
                <h5 class="section-block-title mb-0">Daftar Klaim Reward</h5>
                <a href="{{ route('mahasiswa.klaim-reward.create') }}" class="btn btn-main">
                    <i class="bi bi-plus-circle me-1"></i> Ajukan Klaim Reward
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Prestasi</th>
                            <th>Periode</th>
                            <th>Reward</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($klaimRewards as $klaim)
                            @php
                                $statusVal = $klaim->status_klaim ?? 'Menunggu';
                                $statusCls = match($statusVal) {
                                    'Disetujui' => 'bg-success',
                                    'Ditolak' => 'bg-danger',
                                    default => 'bg-warning text-dark',
                                };
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="fw-semibold" style="color: var(--dark-blue)">
                                        {{ $klaim->prestasiMahasiswa->nama_kegiatan ?? '-' }}
                                    </div>
                                    <div class="text-muted small">
                                        Tingkat {{ $klaim->prestasiMahasiswa->tingkatPrestasi->nama_tingkat ?? '-' }}
                                    </div>
                                </td>
                                <td>{{ $klaim->periodeKlaim->nama_periode ?? '-' }}</td>
                                <td>
                                    <div>{{ $klaim->jenisReward->nama_reward ?? '-' }}</div>
                                    <div class="text-muted small">
                                        Rp {{ number_format($klaim->jenisReward->nominal ?? 0, 0, ',', '.') }}
                                    </div>
                                </td>
                                <td>{{ $klaim->tanggal_pengajuan }}</td>
                                <td>
                                    <span class="badge badge-status {{ $statusCls }}">{{ $statusVal }}</span>
                                    @if($klaim->catatan)
                                        <div class="text-muted small mt-1">{{ $klaim->catatan }}</div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="bi bi-gift"></i>
                                        <p>Belum ada klaim reward yang diajukan.</p>
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