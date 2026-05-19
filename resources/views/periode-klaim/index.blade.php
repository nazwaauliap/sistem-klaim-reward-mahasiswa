@extends('layouts.admin')

@section('content')
<style>
    .periode-table th {
        white-space: nowrap;
        padding: 14px 16px;
        font-size: 14px;
        vertical-align: middle;
    }

    .periode-table td {
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
    <h2 class="fw-bold">Periode Klaim</h2>
    <p class="text-muted">Kelola periode pembukaan klaim reward prestasi mahasiswa.</p>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card page-card">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Daftar Periode Klaim</h5>

            <a href="{{ route('admin.periode-klaim.create') }}" class="btn btn-main">
                + Tambah Periode
            </a>
        </div>

        <div class="table-responsive table-wrapper">
            <table class="table table-hover table-bordered align-middle periode-table">
                <thead class="table-primary">
                    <tr>
                        <th width="80">No</th>
                        <th>Nama Periode</th>
                        <th>Semester</th>
                        <th>Tahun Akademik</th>
                        <th>Periode Ke</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Status</th>
                        <th width="170">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($periodeKlaims as $periode)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $periode->nama_periode }}</td>
                            <td>{{ $periode->semester }}</td>
                            <td>{{ $periode->tahun_akademik }}</td>
                            <td>{{ $periode->periode_ke }}</td>
                            <td>{{ $periode->tanggal_mulai }}</td>
                            <td>{{ $periode->tanggal_selesai }}</td>
                            <td>
                                @if($periode->status == 'Dibuka')
                                    <span class="badge bg-success px-3 py-2">{{ $periode->status }}</span>
                                @elseif($periode->status == 'Ditutup')
                                    <span class="badge bg-danger px-3 py-2">{{ $periode->status }}</span>
                                @else
                                    <span class="badge bg-warning px-3 py-2">{{ $periode->status }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.periode-klaim.edit', $periode->id_periode) }}" class="btn btn-sm btn-warning btn-action">
                                    Edit
                                </a>

                                <form action="{{ route('admin.periode-klaim.destroy', $periode->id_periode) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus periode ini?')">
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
                                Belum ada data periode klaim.
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