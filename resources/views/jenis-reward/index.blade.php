@extends('layouts.admin')

@section('content')
<style>
    .reward-table th {
        white-space: nowrap;
        padding: 14px 16px;
        font-size: 14px;
        vertical-align: middle;
    }

    .reward-table td {
        padding: 14px 16px;
        font-size: 14px;
        vertical-align: middle;
    }

    .reward-table td.keterangan {
        white-space: normal;
        min-width: 300px;
        line-height: 1.6;
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
    <h2 class="fw-bold">Jenis Reward</h2>
    <p class="text-muted">Kelola jenis dan nominal reward berdasarkan tingkat prestasi.</p>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card page-card">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Daftar Jenis Reward</h5>

            <a href="{{ route('admin.jenis-reward.create') }}" class="btn btn-main">
                + Tambah Reward
            </a>
        </div>

        <div class="table-responsive table-wrapper">
            <table class="table table-hover table-bordered align-middle reward-table">
                <thead class="table-primary">
                    <tr>
                        <th width="80">No</th>
                        <th>Tingkat Prestasi</th>
                        <th>Nama Reward</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                        <th width="170">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($jenisRewards as $reward)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $reward->tingkatPrestasi->nama_tingkat ?? '-' }}</td>
                            <td>{{ $reward->nama_reward }}</td>
                            <td>Rp {{ number_format($reward->nominal, 0, ',', '.') }}</td>
                            <td class="keterangan">{{ $reward->keterangan ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin.jenis-reward.edit', $reward->id_reward) }}" class="btn btn-sm btn-warning btn-action">
                                    Edit
                                </a>

                                <form action="{{ route('admin.jenis-reward.destroy', $reward->id_reward) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jenis reward ini?')">
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
                            <td colspan="6" class="text-center text-muted py-4">
                                Belum ada data jenis reward.
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