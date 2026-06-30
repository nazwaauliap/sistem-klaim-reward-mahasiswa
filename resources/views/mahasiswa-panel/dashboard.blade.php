@extends('layouts.mahasiswa')

@section('title', 'Mahasiswa')

@section('content')

    {{-- ════════════════════════ HERO SECTION ════════════════════════ --}}
    <div class="hero-mahasiswa">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <span class="badge-soft mb-3 d-inline-block">Dashboard Mahasiswa</span>

                <h2 class="hero-title mb-2">
                    Halo, {{ Auth::user()->name ?? 'Mahasiswa' }} <span class="wave">👋</span>
                </h2>

                <p class="hero-text mb-3">
                    Selamat datang kembali di SIKAREMA. Kelola prestasi, pantau proses verifikasi,
                    dan ajukan reward dalam satu sistem.
                </p>

                <div class="hero-meta">
                    <div class="hero-meta-item">
                        <i class="bi bi-mortarboard-fill"></i>
                        <span>{{ Auth::user()->mahasiswa->program_studi ?? 'Program Studi' }}</span>
                    </div>
                    <div class="hero-meta-divider"></div>
                    <div class="hero-meta-item">
                        <i class="bi bi-layers-fill"></i>
                        <span>Semester {{ Auth::user()->mahasiswa->semester ?? '-' }}</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="hero-illustration">
                    @if(file_exists(public_path('images/trophy-illustration.png')))
                        <img src="{{ asset('images/trophy-illustration.png') }}" alt="Ilustrasi Prestasi">
                    @else
                        <div class="hero-illustration-icon">
                            <i class="bi bi-trophy-fill"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- ════════════════════════ BANNER ════════════════════════ --}}
    <div class="period-banner">
        <div class="period-track">
            <span><i class="bi bi-stars"></i> KLAIM REWARD PERIODE GENAP 2025/2026 SEDANG DIBUKA</span>
            <span><i class="bi bi-send-check-fill"></i> SEGERA AJUKAN KLAIM UNTUK PRESTASI YANG SUDAH TERVERIFIKASI</span>
            <span><i class="bi bi-clock-fill"></i> PASTIKAN DATA PRESTASI DAN BERKAS SUDAH LENGKAP</span>
            <span><i class="bi bi-award-fill"></i> SIKAREMA MEMBANTU PENGAJUAN PRESTASI DAN KLAIM REWARD MAHASISWA</span>
        </div>
    </div>

    {{-- ════════════════════════ STATISTIK ════════════════════════ --}}
    <div class="row row-cols-2 row-cols-md-4 g-3 mb-4">
        @php
            $statItems = [
                [
                    'icon' => 'bi-trophy-fill', 'cls' => 'stat-icon-primary',
                    'val' => $totalPrestasi ?? 0, 'label' => 'Total Prestasi',
                    'sub' => null, 'subCls' => 'stat-sub-positive',
                ],
                [
                    'icon' => 'bi-hourglass-split', 'cls' => 'stat-icon-warning',
                    'val' => $menunggu ?? 0, 'label' => 'Menunggu Verifikasi',
                    'sub' => ($menunggu ?? 0) > 0 ? 'Perlu ditindaklanjuti' : null, 'subCls' => 'stat-sub-warning',
                ],
                [
                    'icon' => 'bi-patch-check-fill', 'cls' => 'stat-icon-success',
                    'val' => $terverifikasi ?? 0, 'label' => 'Terverifikasi',
                    'sub' => ($terverifikasi ?? 0) > 0 ? 'Selamat! 🎉' : null, 'subCls' => 'stat-sub-success',
                ],
                [
                    'icon' => 'bi-gift-fill', 'cls' => 'stat-icon-purple',
                    'val' => $klaimReward ?? 0, 'label' => 'Klaim Reward',
                    'sub' => ($klaimReward ?? 0) == 0 ? 'Ajukan sekarang!' : null, 'subCls' => 'stat-sub-purple',
                ],
            ];
        @endphp
        @foreach ($statItems as $s)
        <div class="col">
            <div class="card stat-card-v2 h-100">
                <div class="card-body">
                    <div class="stat-icon-v2 {{ $s['cls'] }}">
                        <i class="bi {{ $s['icon'] }}"></i>
                    </div>
                    <div class="stat-text-v2">
                        <div class="stat-number-v2">{{ $s['val'] }}</div>
                        <div class="stat-label-v2">{{ $s['label'] }}</div>
                        @if ($s['sub'])
                            <div class="stat-sub-v2 {{ $s['subCls'] }}">{{ $s['sub'] }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- ════════════════════════ QUICK ACTION ════════════════════════ --}}
    <div class="section-block">
        <h5 class="section-block-title mb-3">Menu Cepat</h5>

        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <a href="{{ route('mahasiswa.prestasi.create') }}" class="quick-action-card qa-card-primary">
                    <div class="quick-action-icon qa-icon-primary">
                        <i class="bi bi-plus-circle-fill"></i>
                    </div>
                    <div class="quick-action-text">
                        <div class="quick-action-title">Ajukan Prestasi</div>
                        <div class="quick-action-desc">Tambahkan prestasi baru untuk diverifikasi</div>
                    </div>
                    <i class="bi bi-chevron-right quick-action-arrow"></i>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('mahasiswa.prestasi.index') }}" class="quick-action-card qa-card-success">
                    <div class="quick-action-icon qa-icon-success">
                        <i class="bi bi-folder2-open"></i>
                    </div>
                    <div class="quick-action-text">
                        <div class="quick-action-title">Prestasi Saya</div>
                        <div class="quick-action-desc">Lihat status seluruh prestasi yang diajukan</div>
                    </div>
                    <i class="bi bi-chevron-right quick-action-arrow"></i>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('mahasiswa.klaim-reward.index') }}" class="quick-action-card qa-card-purple">
                    <div class="quick-action-icon qa-icon-purple">
                        <i class="bi bi-gift-fill"></i>
                    </div>
                    <div class="quick-action-text">
                        <div class="quick-action-title">Klaim Reward</div>
                        <div class="quick-action-desc">Ajukan klaim reward atas prestasimu</div>
                    </div>
                    <i class="bi bi-chevron-right quick-action-arrow"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row g-4">
        {{-- ════════════════════════ PRESTASI TERBARU ════════════════════════ --}}
        <div class="col-lg-7">
            <div class="card page-card-v2 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="section-block-title mb-0">Prestasi Terbaru</h5>
                        <a href="{{ route('mahasiswa.prestasi.index') }}" class="link-small">
                            Lihat Semua <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    @php
                        $recentPrestasi = $prestasiTerbaru ?? collect();
                    @endphp

                    @if ($recentPrestasi->isEmpty())
                        <div class="empty-state">
                            <i class="bi bi-inbox"></i>
                            <p>Belum ada prestasi yang diajukan.</p>
                        </div>
                    @else
                        <div class="d-flex flex-column gap-2">
                            @foreach ($recentPrestasi->take(3) as $item)
                                @php
                                    $statusVal = $item->status_verifikasi ?? 'Menunggu';
                                    $statusCls = match($statusVal) {
                                        'Terverifikasi' => 'bg-success',
                                        'Ditolak' => 'bg-danger',
                                        'Revisi' => 'bg-secondary',
                                        default => 'bg-warning text-dark',
                                    };
                                    $thumbCls = match($item->kategoriPrestasi->nama_kategori ?? '') {
                                        'Akademik' => 'stat-icon-primary',
                                        default => 'stat-icon-warning',
                                    };
                                @endphp
                                <div class="prestasi-item-card">
                                    <div class="prestasi-item-thumb {{ $thumbCls }}">
                                        <i class="bi bi-award-fill"></i>
                                    </div>
                                    <div class="prestasi-item-main">
                                        <div class="prestasi-item-title">{{ $item->nama_kegiatan ?? '-' }}</div>
                                        <div class="prestasi-item-meta">
                                            <span>{{ $item->kategoriPrestasi->nama_kategori ?? '-' }}</span>
                                            <span>&middot;</span>
                                            <span>Tingkat {{ $item->tingkatPrestasi->nama_tingkat ?? '-' }}</span>
                                        </div>
                                        <div class="prestasi-item-meta mt-1">
                                            <span class="prestasi-item-date">
                                                <i class="bi bi-calendar3"></i>{{ $item->tanggal_kegiatan ?? '-' }}
                                            </span>
                                        </div>
                                    </div>
                                    <span class="badge badge-status {{ $statusCls }}">{{ $statusVal }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- ════════════════════════ AKTIVITAS TERBARU ════════════════════════ --}}
        <div class="col-lg-5">
            <div class="card page-card-v2 h-100">
                <div class="card-body p-4">
                    <h5 class="section-block-title mb-3">Aktivitas Terbaru</h5>

                    @php
                        $recentActivity = $aktivitasTerbaru ?? collect();
                    @endphp

                    @if ($recentActivity->isEmpty())
                        <div class="empty-state">
                            <i class="bi bi-clock-history"></i>
                            <p>Belum ada aktivitas terbaru.</p>
                        </div>
                    @else
                        <div class="timeline-v2">
                            @foreach ($recentActivity->take(5) as $act)
                                @php
                                    $dotCls = match($act->type ?? 'default') {
                                        'success' => 'dot-success',
                                        'warning' => 'dot-warning',
                                        'info' => 'dot-info',
                                        'purple' => 'dot-purple',
                                        default => 'dot-primary',
                                    };
                                    $dotIcon = match($act->type ?? 'default') {
                                        'success' => 'bi-check',
                                        'warning' => 'bi-clock',
                                        'purple' => 'bi-gift',
                                        default => 'bi-dot',
                                    };
                                @endphp
                                <div class="timeline-v2-item">
                                    <span class="timeline-v2-dot {{ $dotCls }}">
                                        <i class="bi {{ $dotIcon }}"></i>
                                    </span>
                                    <div class="timeline-v2-content">
                                        <div>
                                            <div class="timeline-v2-text">{{ $act->message ?? '-' }}</div>
                                            @if(!empty($act->sub))
                                                <div class="timeline-v2-sub">{{ $act->sub }}</div>
                                            @endif
                                        </div>
                                        <div class="timeline-v2-time">{{ $act->time ?? '-' }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection