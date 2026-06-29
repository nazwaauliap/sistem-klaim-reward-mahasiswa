@extends('layouts.admin')

@section('content')
<style>
    .content { background: #F8FAFC; }

    .dashboard-title { font-size: 28px; line-height: 1.05; margin-bottom: 0.5rem; }
    .dashboard-lead { font-size: 14px; color: #64748B; margin-bottom: 1rem; }

    .hero-card {
        border-radius: 20px;
        padding: 28px;
        box-shadow: 0 16px 38px rgba(15,23,42,0.08);
        border: 1px solid rgba(226,232,240,0.75);
    }

    .hero-card h3 { font-size: 24px; margin-bottom: 0.4rem; }
    .hero-card p { color: #64748B; }

    .hero-stat {
        display: inline-flex;
        align-items: center;
        gap: 0.9rem;
        padding: 1rem 1rem;
        border-radius: 18px;
        background: #F8FAFC;
        border: 1px solid rgba(226,232,240,0.8);
        min-width: 220px;
        box-shadow: inset 0 0 0 1px rgba(226,232,240,0.9);
    }

    .hero-stat-icon {
        width: 56px;
        height: 56px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 18px;
        background-clip: padding-box;
        box-shadow: 0 10px 24px rgba(15,23,42,0.06);
        border: 1px solid rgba(15,23,42,0.05);
    }

    .hero-stats-wrap { gap: 1rem; flex-wrap: wrap; }
    .hero-stat .small { margin-bottom: 0.2rem; }

    .stat-card {
        border-radius: 20px;
        border: 1px solid rgba(226,232,240,0.9);
        box-shadow: 0 14px 36px rgba(15,23,42,0.06);
        min-height: 148px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        padding: 1.2rem;
    }
    .stat-card:hover {
        transform: translateY(-1px);
        box-shadow: 0 18px 44px rgba(15,23,42,0.08);
    }

    .stat-icon-wrap {
        width: 56px;
        height: 56px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 18px;
        padding: 14px;
        margin-right: 1rem;
        box-shadow: 0 10px 24px rgba(15,23,42,0.06);
        flex-shrink: 0;
        border: 1px solid rgba(15,23,42,0.05);
        background-clip: padding-box;
    }
    .stat-icon-svg { width: 24px; height: 24px; stroke-width: 1.6; }

    .icon-orange { background: linear-gradient(135deg, rgba(245,158,11,0.08), rgba(245,158,11,0.18)); color: var(--warning-color); }
    .icon-green { background: linear-gradient(135deg, rgba(16,185,129,0.08), rgba(16,185,129,0.18)); color: var(--green); }
    .icon-blue { background: linear-gradient(135deg, rgba(37,99,235,0.08), rgba(37,99,235,0.16)); color: var(--primary-blue); }
    .icon-red { background: linear-gradient(135deg, rgba(239,68,68,0.08), rgba(239,68,68,0.16)); color: var(--danger-color); }

    .stat-title { font-size: 11px; font-weight: 700; color: #64748B; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.6px; }
    .stat-number { font-size: 24px; font-weight: 800; color: #0F172A; margin-bottom: 10px; }
    .stat-desc { font-size: 13px; color: #64748B; margin-bottom: 0; }
    .stat-divider { width: 100%; height: 1px; background: #E5E7EB; opacity: 0.9; margin: 16px 0; border-radius: 2px; }
    .stat-action { font-size: 13px; }

    .table thead th {
        background: #F1F5F9;
        border-bottom: 1px solid rgba(148,163,184,0.24);
        color: #475569;
    }
    .table th,
    .table td {
        border-top: 1px solid rgba(148,163,184,0.16);
        padding: 0.72rem 0.85rem;
        vertical-align: middle;
    }
    .table-hover tbody tr:hover {
        background: rgba(226,232,240,0.22);
    }

    .status-badge {
        font-size: 13px;
        font-weight: 600;
        padding: 6px 14px;
        border-radius: 999px;
        display: inline-flex;
        align-items: center;
        line-height: 1.2;
        min-height: 28px;
        letter-spacing: 0.01em;
    }

    .btn-outline-primary.btn-sm,
    .btn-outline-primary {
        border-radius: 999px;
        padding: 0.5rem 1rem;
        transition: 0.2s ease;
    }

    .btn-outline-primary:hover {
        transform: translateY(-1px);
    }
    .status-badge.waiting { background:#fff4e6; color:#92400e; }
    .status-badge.approved { background:#d1fae5; color:#065f46; }
    .status-badge.rejected { background:#fee2e2; color:#991b1b; }
    .status-badge.revision { background:#e0f2fe; color:#075985; }

    .table td .status-badge {
        margin: 0;
    }

    .list-group-item {
        border: 1px solid rgba(226,232,240,0.8);
        border-radius: 18px;
        margin-bottom: 0.75rem;
        transition: transform 0.2s ease, background 0.2s ease;
    }

    .btn-cta { background: linear-gradient(90deg,var(--primary-blue),var(--green)); color: white; border: none; border-radius: 999px; padding: 8px 18px; font-weight: 700; }
    .btn-cta-outline { border-radius: 999px; padding: 6px 14px; font-weight: 700; border: 1px solid rgba(37,99,235,0.12); color: var(--primary-blue); background: transparent; }
    .table .badge { font-weight:700; padding:6px 10px; border-radius: 999px; }
    .table-hover tbody tr:hover { background: rgba(226,232,240,0.22); }

    .status-badge { font-weight: 700; padding: 6px 14px; border-radius: 999px; display: inline-flex; align-items: center; line-height: 1.2; min-height: 28px; letter-spacing: 0.01em; }
    .status-badge.waiting { background:#fff4e6; color:#92400e; }
    .status-badge.approved { background:#d1fae5; color:#065f46; }
    .status-badge.rejected { background:#fee2e2; color:#991b1b; }
    .status-badge.revision { background:#e0f2fe; color:#075985; }

    .table td .status-badge { margin: 0; }

    .list-group-item {
        border: 1px solid rgba(226,232,240,0.8);
        border-radius: 18px;
        margin-bottom: 0.75rem;
        transition: transform 0.2s ease, background 0.2s ease;
    }
    .list-group-item:last-child { margin-bottom: 0; }
    .list-group-item:hover { background: #f8fafc; transform: translateY(-1px); }
    .list-group-item .btn-outline-primary { border-radius: 999px; padding: 0.35rem 0.9rem; }
</style>

<div class="mb-4">
    <h2 class="fw-bold dashboard-title">Dashboard Dosen</h2>
    <p class="dashboard-lead">Sebagai Dosen Pembimbing Akademik, Anda bertugas melakukan peninjauan awal terhadap prestasi mahasiswa sebelum diteruskan kepada Admin Prestasi untuk proses verifikasi administrasi.</p>
</div>

<x-admin.flash-messages />

<!-- Hero Section -->
<div class="card page-card bg-white hero-card mb-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
        <div>
            <h3 class="fw-bold mb-2">Halo, {{ auth()->user()->name ?? 'Dosen' }} 👋</h3>
            <p class="text-muted mb-3">Anda dapat memproses prestasi mahasiswa yang menunggu review hari ini agar verifikasi lebih cepat.</p>

            <div class="d-flex flex-wrap hero-stats-wrap">
                <div class="hero-stat">
                    <div class="hero-stat-icon icon-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 6v6l4 2"/><circle cx="12" cy="12" r="9"/></svg>
                    </div>
                    <div>
                        <div class="small text-muted">Menunggu review</div>
                        <div class="fw-bold">{{ $menunggu }}</div>
                    </div>
                </div>
                <div class="hero-stat">
                    <div class="hero-stat-icon icon-green">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12l2 2 4-4"/><path d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/></svg>
                    </div>
                    <div>
                        <div class="small text-muted">Disetujui</div>
                        <div class="fw-bold">{{ $disetujui }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-md-end mt-2 mt-md-0">
            <a href="{{ route('dosen.prestasi-mahasiswa.index') }}" class="btn btn-main">Mulai Review</a>
        </div>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-12 col-md-6 col-lg-3">
        <div class="card stat-card bg-white p-3 d-flex flex-column">
            <div class="d-flex align-items-start">
                <div class="stat-icon-wrap icon-orange me-3">
                    <!-- Heroicon: Clock -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="stat-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 6v6l4 2"/><circle cx="12" cy="12" r="9"/></svg>
                </div>
                <div class="flex-fill">
                    <div class="text-uppercase" style="font-size:12px;font-weight:700;color:var(--text-muted)">Menunggu Review</div>
                    <div class="fw-bold" style="font-size:20px;color:var(--text-muted)">{{ $menunggu }}</div>
                    <div class="text-muted small">Jumlah prestasi yang menunggu peninjauan dosen.</div>
                </div>
            </div>
            <div class="mt-auto pt-2">
                <a href="{{ route('dosen.prestasi-mahasiswa.index') }}" class="small text-primary">Lihat</a>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
        <div class="card stat-card bg-white p-3 d-flex flex-column">
            <div class="d-flex align-items-start">
                <div class="stat-icon-wrap icon-green me-3">
                    <!-- Heroicon: Check Circle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="stat-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12l2 2 4-4"/><path d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/></svg>
                </div>
                <div class="flex-fill">
                    <div class="text-uppercase" style="font-size:12px;font-weight:700;color:var(--text-muted)">Disetujui</div>
                    <div class="fw-bold" style="font-size:20px;color:var(--text-muted)">{{ $disetujui }}</div>
                    <div class="text-muted small">Jumlah prestasi yang direkomendasikan ke Admin.</div>
                </div>
            </div>
            <div class="mt-auto pt-2">
                <a href="{{ route('dosen.prestasi-mahasiswa.index') }}" class="small text-primary">Lihat</a>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
        <div class="card stat-card bg-white p-3 d-flex flex-column">
            <div class="d-flex align-items-start">
                <div class="stat-icon-wrap icon-blue me-3">
                    <!-- Heroicon: Pencil Square -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="stat-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
                </div>
                <div class="flex-fill">
                    <div class="text-uppercase" style="font-size:12px;font-weight:700;color:var(--text-muted)">Perlu Revisi</div>
                    <div class="fw-bold" style="font-size:20px;color:var(--text-muted)">{{ $perluRevisi }}</div>
                    <div class="text-muted small">Prestasi yang perlu diperbaiki oleh mahasiswa.</div>
                </div>
            </div>
            <div class="mt-auto pt-2">
                <a href="{{ route('dosen.prestasi-mahasiswa.index') }}" class="small text-primary">Lihat</a>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
        <div class="card stat-card bg-white p-3 d-flex flex-column">
            <div class="d-flex align-items-start">
                <div class="stat-icon-wrap icon-red me-3">
                    <!-- Heroicon: X Circle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="stat-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 9l-6 6M9 9l6 6"/><circle cx="12" cy="12" r="9"/></svg>
                </div>
                <div class="flex-fill">
                    <div class="text-uppercase" style="font-size:12px;font-weight:700;color:var(--text-muted)">Ditolak</div>
                    <div class="fw-bold" style="font-size:20px;color:var(--text-muted)">{{ $ditolak }}</div>
                    <div class="text-muted small">Prestasi yang ditolak oleh Anda sebagai Dosen.</div>
                </div>
            </div>
            <div class="mt-auto pt-2">
                <a href="{{ route('dosen.prestasi-mahasiswa.index') }}" class="small text-primary">Lihat</a>
            </div>
        </div>
    </div>
</div>

<!-- Quick actions removed per request -->

<div class="card page-card bg-white p-3 shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="fw-bold mb-0">Ringkasan Prestasi Terbaru</h5>
                <p class="text-muted small mb-0">10 prestasi terbaru yang memerlukan keputusan Anda sebagai Pembimbing Akademik.</p>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width:60px">No</th>
                        <th>Mahasiswa</th>
                        <th>Prestasi</th>
                        <th>Kategori</th>
                        <th style="width:160px">Status Dosen</th>
                        <th style="width:140px">Tanggal</th>
                        <th style="width:140px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($latestPrestasis as $prestasi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $prestasi->mahasiswa->nama ?? '-' }}</td>
                        <td>{{ $prestasi->nama_kegiatan }}</td>
                        <td>{{ $prestasi->kategoriPrestasi->nama_kategori ?? '-' }}</td>
                        <td>
                            @if($prestasi->status_dosen === 'Disetujui')
                                <span class="status-badge approved">Disetujui</span>
                            @elseif($prestasi->status_dosen === 'Ditolak')
                                <span class="status-badge rejected">Ditolak</span>
                            @elseif($prestasi->status_dosen === 'Perlu Revisi')
                                <span class="status-badge revision">Perlu Revisi</span>
                            @else
                                <span class="status-badge waiting">Menunggu Review</span>
                            @endif
                        </td>
                        <td>{{ $prestasi->tanggal_kegiatan }}</td>
                        <td>
                            <a href="{{ route('dosen.prestasi-mahasiswa.show', $prestasi->id_prestasi) }}" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Belum ada prestasi terbaru.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Prestasi yang Perlu Direview Hari Ini -->
@php
    $toReview = collect($latestPrestasis ?? [])->where('status_dosen','Menunggu')->take(5);
@endphp

<div class="row g-3 my-4">
    <div class="col-12 col-lg-6">
        <div class="card page-card bg-white p-3 shadow-sm">
            <div class="card-body">
                <h5 class="fw-bold">Prestasi yang Perlu Direview Hari Ini</h5>
                <p class="text-muted small mb-3">Maksimal 5 item yang sedang menunggu keputusan Anda.</p>

                @if($toReview->isEmpty())
                    <div class="text-center text-muted py-4">Tidak ada prestasi untuk direview hari ini.</div>
                @else
                    <ul class="list-group list-group-flush">
                        @foreach($toReview as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="me-3">
                                <div class="fw-bold">{{ $item->mahasiswa->nama ?? '-' }}</div>
                                <div class="small text-muted">{{ Str::limit($item->nama_kegiatan, 60) }}</div>
                            </div>
                            <div class="text-end">
                                <div class="small text-muted">{{ optional($item->created_at)->diffForHumans() ?? $item->tanggal_kegiatan }}</div>
                                <a href="{{ route('dosen.prestasi-mahasiswa.show', $item->id_prestasi) }}" class="btn btn-sm btn-outline-primary mt-2">Review</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6">
        <div class="card page-card bg-white p-3 shadow-sm">
            <div class="card-body">
                <h5 class="fw-bold">Aktivitas Terbaru</h5>
                <p class="text-muted small mb-3">Riwayat singkat pengajuan, revisi, dan rekomendasi.</p>

                @php
                    $activities = collect($latestPrestasis ?? [])->take(6);
                @endphp

                @if($activities->isEmpty())
                    <div class="text-center text-muted py-4">Belum ada aktivitas terbaru.</div>
                @else
                    <div class="list-group list-group-flush">
                        @foreach($activities as $act)
                        @php
                            $time = optional($act->created_at)->diffForHumans() ?? $act->tanggal_kegiatan;
                            switch($act->status_dosen) {
                                case 'Perlu Revisi': $message = 'Permintaan revisi oleh mahasiswa'; break;
                                case 'Disetujui': $message = 'Direkomendasikan ke Admin'; break;
                                case 'Ditolak': $message = 'Prestasi ditolak oleh Dosen'; break;
                                default: $message = 'Pengajuan prestasi baru';
                            }
                        @endphp
                        <div class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fw-bold">{{ Str::limit($act->nama_kegiatan, 60) }}</div>
                                <div class="small text-muted">{{ $message }} — {{ $act->mahasiswa->nama ?? '-' }}</div>
                            </div>
                            <div class="small text-muted">{{ $time }}</div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection