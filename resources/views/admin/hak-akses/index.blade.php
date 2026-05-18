@extends('layouts.admin')

@section('content')
<style>
    .hak-akses-table th {
        white-space: nowrap;
        padding: 14px 16px;
        font-size: 14px;
        vertical-align: middle;
    }

    .hak-akses-table td {
        padding: 14px 16px;
        font-size: 14px;
        vertical-align: middle;
    }

    .hak-akses-table td.keterangan {
        white-space: normal;
        min-width: 350px;
        line-height: 1.6;
    }

    .table-wrapper {
        overflow-x: auto;
    }
</style>

<div class="mb-4">
    <h2 class="fw-bold">Hak Akses</h2>
    <p class="text-muted">
        Data hak akses digunakan untuk membedakan role pengguna pada SIKAREMA.
    </p>
</div>

<div class="card page-card">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Daftar Hak Akses</h5>
        </div>

        <div class="table-responsive table-wrapper">
            <table class="table table-hover table-bordered align-middle hak-akses-table">
                <thead class="table-primary">
                    <tr>
                        <th width="80">No</th>
                        <th>Nama Akses</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($hakAkses as $akses)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <span class="badge bg-primary px-3 py-2">
                                    {{ $akses->nama_akses }}
                                </span>
                            </td>
                            <td class="keterangan">
                                {{ $akses->keterangan ?? '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                Belum ada data hak akses.
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