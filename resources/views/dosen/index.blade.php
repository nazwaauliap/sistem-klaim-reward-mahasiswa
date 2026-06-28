@extends('layouts.admin')

@section('content')
<style>
    .dosen-table {
        min-width: 1200px;
    }

    .dosen-table th,
    .dosen-table td {
        white-space: nowrap;
        padding: 14px 16px;
        font-size: 14px;
        vertical-align: middle;
    }

    .dosen-table td.alamat {
        white-space: normal;
        min-width: 220px;
    }

    .table-wrapper {
        overflow-x: auto;
    }
</style>

<div class="mb-4">
    <h2 class="fw-bold">Data Dosen</h2>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card page-card">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Daftar Dosen</h5>

            <a href="{{ route('admin.dosen.create') }}" class="btn btn-main">
                + Tambah Dosen
            </a>
        </div>

        <div class="table-responsive table-wrapper">
            <table class="table table-hover table-bordered align-middle dosen-table">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>NIDN</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Program Studi</th>
                        <th>Fakultas</th>
                        <th>Status</th>
                        <th width="170">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dosens as $dosen)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dosen->nidn }}</td>
                        <td>{{ $dosen->nama }}</td>
                        <td>{{ $dosen->jenis_kelamin }}</td>
                        <td>{{ $dosen->tempat_lahir }}</td>
                        <td>{{ $dosen->tanggal_lahir }}</td>
                        <td>{{ $dosen->program_studi }}</td>
                        <td>{{ $dosen->fakultas }}</td>
                        <td>
                            <span class="badge bg-secondary px-3 py-2">
                                {{ $dosen->status_dosen }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.dosen.edit', $dosen->id_dosen) }}" class="btn btn-sm btn-warning me-1">
                                Edit
                            </a>
                            <form action="{{ route('admin.dosen.destroy', $dosen->id_dosen) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data dosen ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center text-muted py-4">
                            Belum ada data dosen.
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