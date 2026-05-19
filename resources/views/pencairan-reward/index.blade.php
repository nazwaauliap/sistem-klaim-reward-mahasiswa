@extends('layouts.admin')

@section('content')
<style>
    .pencairan-table {
        min-width: 1200px;
    }

    .pencairan-table th,
    .pencairan-table td {
        padding: 14px 16px;
        font-size: 14px;
        vertical-align: middle;
        white-space: nowrap;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    .btn-action {
        min-width: 70px;
        margin-bottom: 4px;
    }
</style>

<div class="mb-4">
    <h2 class="fw-bold">Pencairan Reward</h2>
    <p class="text-muted">
        Kelola pencairan reward untuk klaim mahasiswa yang sudah disetujui.
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
            <h5 class="fw-bold mb-0">Daftar Pencairan Reward</h5>

            <a href="{{ route('admin.pencairan-reward.create') }}" class="btn btn-main">
                + Tambah Pencairan
            </a>
        </div>

        <div class="table-responsive table-wrapper">
            <table class="table table-hover table-bordered align-middle pencairan-table">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Mahasiswa</th>
                        <th>Prestasi</th>
                        <th>Periode</th>
                        <th>Nominal Dicairkan</th>
                        <th>Tanggal Pencairan</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th width="170">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($pencairanRewards as $pencairan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pencairan->klaimReward->prestasiMahasiswa->mahasiswa->nama ?? '-' }}</td>
                            <td>{{ $pencairan->klaimReward->prestasiMahasiswa->nama_kegiatan ?? '-' }}</td>
                            <td>{{ $pencairan->klaimReward->periodeKlaim->nama_periode ?? '-' }}</td>
                            <td>Rp {{ number_format($pencairan->nominal_dicairkan, 0, ',', '.') }}</td>
                            <td>{{ $pencairan->tanggal_pencairan }}</td>
                            <td>
                                @if($pencairan->status_pencairan == 'Selesai')
                                    <span class="badge bg-success px-3 py-2">Selesai</span>
                                @else
                                    <span class="badge bg-warning px-3 py-2">Diproses</span>
                                @endif
                            </td>
                            <td>{{ $pencairan->keterangan ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin.pencairan-reward.edit', $pencairan->id_pencairan) }}" class="btn btn-sm btn-warning btn-action">
                                    Edit
                                </a>

                                <form action="{{ route('admin.pencairan-reward.destroy', $pencairan->id_pencairan) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data pencairan ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger btn-action">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">
                                Belum ada data pencairan reward.
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