@extends('layouts.admin')

@section('title', 'Dosen')

@section('content')

    <div class="dashboard-header">
        <h2 class="fw-bold">Dashboard Dosen</h2>
        <p>Kelola proses verifikasi prestasi mahasiswa.</p>
    </div>

    <x-admin.flash-messages />

    {{-- ── Stat Cards ── --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-4">
        @php
            $stats = [
                ['icon' => 'bi-hourglass-split',  'cls' => 'stat-icon-waiting', 'val' => $menunggu,    'label' => 'Menunggu Review', 'desc' => 'Menunggu keputusan'],
                ['icon' => 'bi-check-circle-fill', 'cls' => 'stat-icon-success', 'val' => $disetujui,   'label' => 'Disetujui',       'desc' => 'Telah diverifikasi'],
                ['icon' => 'bi-pencil-fill',       'cls' => 'stat-icon-warning', 'val' => $perluRevisi, 'label' => 'Perlu Revisi',    'desc' => 'Perlu perbaikan'],
                ['icon' => 'bi-x-circle-fill',     'cls' => 'stat-icon-danger',  'val' => $ditolak,     'label' => 'Ditolak',         'desc' => 'Tidak memenuhi syarat'],
            ];
        @endphp
        @foreach ($stats as $s)
        <div class="col">
            <div class="card page-card u-radius-20 u-card-shadow card-hover stat-card h-100">
                <div class="card-body">
                    <div class="stat-icon {{ $s['cls'] }}">
                        <i class="bi {{ $s['icon'] }}"></i>
                    </div>
                    <div class="stat-card-text">
                        <div class="stat-number">{{ $s['val'] }}</div>
                        <div class="stat-card-title">{{ $s['label'] }}</div>
                        <div class="stat-card-desc">{{ $s['desc'] }}</div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- ── Verifikasi + Ringkasan ── --}}
    <div class="row g-3 mb-4">
        <div class="col-12 col-lg-4">
            <div class="card page-card u-radius-20 u-card-shadow card-hover h-100">
                <div class="card-body u-card-body-p-4 d-flex flex-column h-100">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="u-feature-icon-size bg-light text-primary">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Verifikasi Prestasi</h5>
                            <p class="text-muted small mb-0">Lihat daftar prestasi mahasiswa, lakukan review, dan verifikasi secara cepat.</p>
                        </div>
                    </div>

                    <div class="card-divider"></div>

                    <div class="mt-3">
                        <div class="text-uppercase small text-muted mb-1">Menunggu Review</div>
                        <div class="display-5 fw-bold mb-1">{{ $menunggu }}</div>
                        <p class="small text-muted mb-0">Jumlah prestasi yang saat ini menunggu keputusan Anda.</p>
                    </div>
                    <div class="mt-auto pt-3">
                        <a href="{{ route('dosen.prestasi-mahasiswa.index') }}"
                            class="btn btn-main u-btn-main-padding w-100">Mulai Review</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-8">
            <div class="card page-card u-radius-20 u-card-shadow card-hover table-card h-100">
                <div class="card-body u-card-body-p-4 d-flex flex-column h-100">
                    <div class="mb-3">
                        <h5 class="fw-bold mb-1">Ringkasan Prestasi Terbaru</h5>
                        <p class="text-muted small mb-0">10 prestasi terbaru yang memerlukan keputusan Anda sebagai Pembimbing Akademik.</p>
                    </div>

                    <div class="table-responsive mb-3">
                        <table class="table table-hover align-middle mb-0" style="min-width:520px">
                            <thead class="table-light">
                                <tr>
                                    <th style="width:18%">Mahasiswa</th>
                                    <th>Prestasi</th>
                                    <th style="width:145px">Status</th>
                                    <th style="width:110px">Tanggal</th>
                                    <th style="width:90px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestPrestasis as $prestasi)
                                    <tr>
                                        <td class="fw-medium">{{ $prestasi->mahasiswa->nama ?? '-' }}</td>
                                        <td>
                                            <div class="fw-bold">{{ $prestasi->nama_kegiatan }}</div>
                                            <span class="badge bg-secondary badge-category small mt-1 d-inline-block">
                                                {{ $prestasi->kategoriPrestasi->nama_kategori ?? '-' }}
                                            </span>
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
                                        <td class="small text-muted">{{ $prestasi->tanggal_kegiatan }}</td>
                                        <td>
                                            <a href="{{ route('dosen.prestasi-mahasiswa.show', $prestasi->id_prestasi) }}"
                                                class="btn btn-outline-primary btn-sm">Review</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">Belum ada prestasi terbaru.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-auto d-flex justify-content-end">
                        <a href="{{ route('dosen.prestasi-mahasiswa.index') }}" class="small text-primary">Lihat semua prestasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ── Review Hari Ini + Aktivitas ── --}}
    @php
        $toReview = collect($latestPrestasis ?? [])
            ->where('status_dosen', 'Menunggu')
            ->take(5);
    @endphp

    <div class="row g-3 mb-4">
        <div class="col-12 col-lg-5">
            <div class="card page-card u-radius-20 u-card-shadow card-hover h-100">
                <div class="card-body u-card-body-p-4 d-flex flex-column h-100">
                    <h5 class="fw-bold mb-1">Prestasi yang Perlu Direview Hari Ini</h5>
                    <p class="text-muted small mb-3">Maksimal 5 item yang sedang menunggu keputusan Anda.</p>

                    @if ($toReview->isEmpty())
                        <div class="text-center text-muted py-4">
                            <i class="bi bi-check2-all fs-2 d-block mb-2 text-success opacity-75"></i>
                            Tidak ada prestasi untuk direview hari ini.
                        </div>
                    @else
                        <div class="dashboard-review-list">
                            @foreach ($toReview as $item)
                                <div class="review-item-card">
                                    <div class="d-flex align-items-center gap-2 overflow-hidden">
                                        <div class="review-item-icon bg-white shadow-sm flex-shrink-0">
                                            <i class="bi bi-person-fill text-primary"></i>
                                        </div>
                                        <div class="overflow-hidden">
                                            <div class="fw-bold text-truncate">{{ $item->mahasiswa->nama ?? '-' }}</div>
                                            <div class="small text-muted text-truncate">{{ Str::limit($item->nama_kegiatan, 50) }}</div>
                                            <div class="small text-muted">{{ optional($item->created_at)->diffForHumans() ?? $item->tanggal_kegiatan }}</div>
                                        </div>
                                    </div>
                                    <a href="{{ route('dosen.prestasi-mahasiswa.show', $item->id_prestasi) }}"
                                        class="btn btn-sm btn-outline-primary flex-shrink-0">Review</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-7">
            <div class="card page-card u-radius-20 u-card-shadow card-hover h-100">
                <div class="card-body u-card-body-p-4 d-flex flex-column h-100">
                    <h5 class="fw-bold mb-1">Aktivitas Terbaru</h5>
                    <p class="text-muted small mb-3">Riwayat singkat pengajuan, revisi, dan rekomendasi.</p>

                    @php $activities = collect($latestPrestasis ?? [])->take(6); @endphp

                    @if ($activities->isEmpty())
                        <div class="text-center text-muted py-4">Belum ada aktivitas terbaru.</div>
                    @else
                        <div class="timeline">
                            @foreach ($activities as $act)
                                @php
                                    $time = optional($act->created_at)->diffForHumans() ?? $act->tanggal_kegiatan;
                                    switch ($act->status_dosen) {
                                        case 'Perlu Revisi': $msg = 'Permintaan revisi oleh mahasiswa'; $icon = 'bi-pencil-fill'; break;
                                        case 'Disetujui':    $msg = 'Direkomendasikan ke Admin';        $icon = 'bi-check-circle-fill'; break;
                                        case 'Ditolak':      $msg = 'Prestasi ditolak oleh Dosen';      $icon = 'bi-x-circle-fill'; break;
                                        default:             $msg = 'Pengajuan prestasi baru';           $icon = 'bi-clock-history';
                                    }
                                @endphp
                                <div class="timeline-item d-flex align-items-start gap-3">
                                    <div class="timeline-marker">
                                        <span class="timeline-dot">
                                            <i class="bi {{ $icon }} text-primary"></i>
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <div class="fw-bold text-truncate">{{ Str::limit($act->nama_kegiatan, 55) }}</div>
                                        <div class="small text-muted">{{ $msg }} — {{ $act->mahasiswa->nama ?? '-' }}</div>
                                    </div>
                                    <div class="text-end small text-muted flex-shrink-0 ms-2">{{ $time }}</div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection