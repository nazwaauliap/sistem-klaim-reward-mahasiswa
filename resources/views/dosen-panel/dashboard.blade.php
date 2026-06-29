@extends('layouts.admin')

@section('title', 'Dosen')

@section('content')

    <div class="dashboard-header">
        <h2 class="fw-bold">Dashboard Dosen</h2>
        <p>Kelola proses verifikasi prestasi mahasiswa.</p>
    </div>

    <x-admin.flash-messages />

    <div class="stats-row mb-4">
        <div class="stats-tile">
            <div class="stat-icon"><i class="bi bi-hourglass-split"></i></div>
            <div>
                <div class="stat-number">{{ $menunggu }}</div>
                <div class="stat-label">Menunggu Review</div>
            </div>
        </div>
        <div class="stats-tile">
            <div class="stat-icon"><i class="bi bi-check-circle-fill"></i></div>
            <div>
                <div class="stat-number">{{ $disetujui }}</div>
                <div class="stat-label">Disetujui</div>
            </div>
        </div>
        <div class="stats-tile">
            <div class="stat-icon"><i class="bi bi-pencil-fill"></i></div>
            <div>
                <div class="stat-number">{{ $perluRevisi }}</div>
                <div class="stat-label">Perlu Revisi</div>
            </div>
        </div>
        <div class="stats-tile">
            <div class="stat-icon"><i class="bi bi-x-circle-fill"></i></div>
            <div>
                <div class="stat-number">{{ $ditolak }}</div>
                <div class="stat-label">Ditolak</div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-12 col-lg-4">
            <div class="card page-card u-radius-20 u-card-shadow card-standard-height card-hover">
                <div class="card-body u-card-body-p-4 d-flex flex-column">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div
                            class="u-feature-icon-size bg-light text-primary d-inline-flex align-items-center justify-content-center">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Verifikasi Prestasi</h5>
                            <p class="text-muted small mb-0">Lihat daftar prestasi mahasiswa dan mulai proses verifikasi
                                dengan tampilan ringkas dan terstruktur.</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="text-uppercase small text-muted mb-1">Menunggu Review</div>
                        <div class="h1 fw-bold mb-3">{{ $menunggu }}</div>
                    </div>
                    <div class="mt-auto">
                        <a href="{{ route('dosen.prestasi-mahasiswa.index') }}"
                            class="btn btn-main u-btn-main-padding">Mulai Review</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <div class="card page-card u-radius-20 u-card-shadow card-standard-height card-hover table-card shadow-sm">
                <div class="card-body u-card-body-p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5 class="fw-bold mb-0">Ringkasan Prestasi Terbaru</h5>
                            <p class="text-muted small mb-0">10 prestasi terbaru yang memerlukan keputusan Anda sebagai
                                Pembimbing Akademik.</p>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Mahasiswa</th>
                                    <th>Prestasi</th>
                                    <th class="table-width-160">Status</th>
                                    <th class="table-width-140">Tanggal</th>
                                    <th class="table-width-140">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestPrestasis as $prestasi)
                                    <tr>
                                        <td>{{ $prestasi->mahasiswa->nama ?? '-' }}</td>
                                        <td>
                                            <div class="fw-bold">{{ $prestasi->nama_kegiatan }}</div>
                                            <span
                                                class="badge bg-secondary small mt-1">{{ $prestasi->kategoriPrestasi->nama_kategori ?? '-' }}</span>
                                        </td>
                                        <td>
                                            @if ($prestasi->status_dosen === 'Disetujui')
                                                <span class="badge bg-success">Disetujui</span>
                                            @elseif($prestasi->status_dosen === 'Ditolak')
                                                <span class="badge bg-danger">Ditolak</span>
                                            @elseif($prestasi->status_dosen === 'Perlu Revisi')
                                                <span class="badge bg-secondary">Revisi</span>
                                            @else
                                                <span class="badge bg-warning text-dark">Menunggu Review</span>
                                            @endif
                                        </td>
                                        <td>{{ $prestasi->tanggal_kegiatan }}</td>
                                        <td>
                                            <a href="{{ route('dosen.prestasi-mahasiswa.show', $prestasi->id_prestasi) }}"
                                                class="btn btn-outline-primary btn-sm">Review</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">Belum ada prestasi terbaru.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Prestasi yang Perlu Direview Hari Ini -->
    @php
        $toReview = collect($latestPrestasis ?? [])
            ->where('status_dosen', 'Menunggu')
            ->take(5);
    @endphp

    <div class="row g-3 my-4">
        <div class="col-12 col-lg-5">
            <div class="card page-card u-radius-20 u-card-shadow shadow-sm">
                <div class="card-body u-card-body-p-4">
                    <h5 class="fw-bold">Prestasi yang Perlu Direview Hari Ini</h5>
                    <p class="text-muted small mb-3">Maksimal 5 item yang sedang menunggu keputusan Anda.</p>

                    @if ($toReview->isEmpty())
                        <div class="text-center text-muted py-4">Tidak ada prestasi untuk direview hari ini.</div>
                    @else
                        <div class="list-group list-group-flush">
                            @foreach ($toReview as $item)
                                <div class="list-group-item rounded-3 mb-2 border-0 bg-light py-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            class="bg-white rounded-circle d-flex align-items-center justify-content-center p-3 shadow-sm">
                                            <i class="bi bi-hourglass-split text-primary"></i>
                                        </div>
                                        <div class="flex-fill">
                                            <div class="fw-bold">{{ $item->mahasiswa->nama ?? '-' }}</div>
                                            <div class="small text-muted">{{ Str::limit($item->nama_kegiatan, 60) }}</div>
                                            <div class="small text-muted mt-1">
                                                {{ optional($item->created_at)->diffForHumans() ?? $item->tanggal_kegiatan }}
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <a href="{{ route('dosen.prestasi-mahasiswa.show', $item->id_prestasi) }}"
                                                class="btn btn-sm btn-outline-primary">Review</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-7">
            <div class="card page-card u-radius-20 u-card-shadow shadow-sm">
                <div class="card-body u-card-body-p-4">
                    <h5 class="fw-bold">Aktivitas Terbaru</h5>
                    <p class="text-muted small mb-3">Riwayat singkat pengajuan, revisi, dan rekomendasi.</p>

                    @php
                        $activities = collect($latestPrestasis ?? [])->take(6);
                    @endphp

                    @if ($activities->isEmpty())
                        <div class="text-center text-muted py-4">Belum ada aktivitas terbaru.</div>
                    @else
                        <div class="timeline">
                            @foreach ($activities as $act)
                                @php
                                    $time = optional($act->created_at)->diffForHumans() ?? $act->tanggal_kegiatan;
                                    switch ($act->status_dosen) {
                                        case 'Perlu Revisi':
                                            $message = 'Permintaan revisi oleh mahasiswa';
                                            $icon = 'bi-pencil-fill';
                                            break;
                                        case 'Disetujui':
                                            $message = 'Direkomendasikan ke Admin';
                                            $icon = 'bi-check-circle-fill';
                                            break;
                                        case 'Ditolak':
                                            $message = 'Prestasi ditolak oleh Dosen';
                                            $icon = 'bi-x-circle-fill';
                                            break;
                                        default:
                                            $message = 'Pengajuan prestasi baru';
                                            $icon = 'bi-clock-history';
                                    }
                                @endphp
                                <div class="d-flex align-items-start gap-3 mb-3">
                                    <div
                                        class="bg-light rounded-circle d-flex align-items-center justify-content-center p-3 shadow-sm">
                                        <i class="bi {{ $icon }} text-primary"></i>
                                    </div>
                                    <div class="flex-fill">
                                        <div class="fw-bold">{{ Str::limit($act->nama_kegiatan, 60) }}</div>
                                        <div class="small text-muted">{{ $message }} —
                                            {{ $act->mahasiswa->nama ?? '-' }}</div>
                                    </div>
                                    <div class="text-end small text-muted">{{ $time }}</div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
