@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="mb-4">
            <h2 class="section-title mb-1">Hak Akses</h2>
            <p class="section-subtitle mb-0">
                Data hak akses digunakan untuk membedakan role pengguna pada SIKAREMA.
            </p>
        </div>

        <div class="card feature-card">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
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
                                    <td>{{ $akses->keterangan ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">
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
    </div>
</section>
@endsection