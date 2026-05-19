@extends('layouts.admin')

@section('content')
<style>
    .tingkat-table th {
        white-space: nowrap;
        padding: 14px 16px;
        font-size: 14px;
        vertical-align: middle;
    }

    .tingkat-table td {
        padding: 14px 16px;
        font-size: 14px;
        vertical-align: middle;
    }

    .tingkat-table td.deskripsi {
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
    <h2 class="fw-bold">Tingkat Prestasi</h2>
    <p class="text-muted">Kelola tingkat prestasi mahasiswa pada SIKAREMA.</p>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card page-card">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Daftar Tingkat Prestasi</h5>

            <a href="{{ route('admin.tingkat-prestasi.create') }}" class="btn btn-main">
                + Tambah Tingkat
            </a>
        </div>

        <div class="table-responsive table-wrapper">
            <table class="table table-hover table-bordered align-middle tingkat-table">
                <thead class="table-primary">
                    <tr>
                        <th width="80">No</th>
                        <th>Nama Tingkat</th>
                        <th>Deskripsi</th>
                        <th width="170">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($tingkatPrestasis as $tingkat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tingkat->nama_tingkat }}</td>
                            <td class="deskripsi">{{ $tingkat->deskripsi ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin.tingkat-prestasi.edit', $tingkat->id_tingkat) }}" class="btn btn-sm btn-warning btn-action">
                                    Edit
                                </a>

                                <form action="{{ route('admin.tingkat-prestasi.destroy', $tingkat->id_tingkat) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus tingkat prestasi ini?')">
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
                            <td colspan="4" class="text-center text-muted py-4">
                                Belum ada data tingkat prestasi.
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