@extends('layouts.admin')

@section('content')
<style>
    .kategori-table th {
        white-space: nowrap;
        padding: 14px 16px;
        font-size: 14px;
        vertical-align: middle;
    }

    .kategori-table td {
        padding: 14px 16px;
        font-size: 14px;
        vertical-align: middle;
    }

    .kategori-table td.deskripsi {
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
    <h2 class="fw-bold">Kategori Prestasi</h2>
    <p class="text-muted">Kelola kategori prestasi mahasiswa pada SIKAREMA.</p>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card page-card">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Daftar Kategori Prestasi</h5>

            <a href="{{ route('admin.kategori-prestasi.create') }}" class="btn btn-main">
                + Tambah Kategori
            </a>
        </div>

        <div class="table-responsive table-wrapper">
            <table class="table table-hover table-bordered align-middle kategori-table">
                <thead class="table-primary">
                    <tr>
                        <th width="80">No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th width="170">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($kategoriPrestasis as $kategori)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kategori->nama_kategori }}</td>
                            <td class="deskripsi">{{ $kategori->deskripsi ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin.kategori-prestasi.edit', $kategori->id_kategori) }}" class="btn btn-sm btn-warning btn-action">
                                    Edit
                                </a>

                                <form action="{{ route('admin.kategori-prestasi.destroy', $kategori->id_kategori) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
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
                                Belum ada data kategori prestasi.
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