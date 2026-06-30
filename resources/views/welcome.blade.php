@extends('layouts.app')

@section('content')

{{-- ════════════════════════ 1. HERO ════════════════════════ --}}
<section id="beranda" class="hero-section">
    <div class="hero-bg-orb hero-bg-orb-1"></div>
    <div class="hero-bg-orb hero-bg-orb-2"></div>

    <div class="container">
        <div class="row align-items-center h-100 g-5">
            <div class="col-lg-6">
                <span class="eyebrow reveal"><span class="dot"></span> Platform Apresiasi Prestasi</span>

                <h1 class="hero-title reveal delay-1">
                    Apresiasi Prestasi,<br>
                    <span class="text-gradient">Raih Reward Terbaik.</span>
                </h1>

                <p class="hero-subtitle reveal delay-2">
                    SIKAREMA merupakan sistem informasi pengajuan prestasi dan klaim reward
                    mahasiswa yang cepat, transparan, dan terintegrasi.
                </p>

                <div class="d-flex flex-wrap gap-3 reveal delay-3">
                    <a href="#fitur" class="btn-hero-primary btn-ripple">
                        Jelajahi Fitur <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="{{ route('login') }}" class="btn-hero-outline">
                        Masuk ke Sistem <i class="bi bi-box-arrow-in-right"></i>
                    </a>
                </div>

                <div class="hero-badge-row reveal delay-4">
                    <span class="hero-badge-chip"><i class="bi bi-lightning-charge-fill"></i> Cepat</span>
                    <span class="hero-badge-chip"><i class="bi bi-eye-fill"></i> Transparan</span>
                    <span class="hero-badge-chip"><i class="bi bi-diagram-3-fill"></i> Terintegrasi</span>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="hero-visual-wrap reveal-zoom delay-2">
                    <div class="hero-visual-glow"></div>

                    @if(file_exists(public_path('images/dashboard-sikarema.png')))
                        <img src="{{ asset('images/dashboard-sikarema.png') }}" alt="Ilustrasi Prestasi dan Reward">
                    @else
                        <div class="hero-visual-fallback">
                            <i class="bi bi-trophy-fill"></i>
                        </div>
                    @endif

                    <div class="hero-floating-card hfc-1">
                        <i class="bi bi-patch-check-fill"></i> Terverifikasi
                    </div>
                    <div class="hero-floating-card hfc-2">
                        <i class="bi bi-gift-fill"></i> Reward Cair
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════ 2. TENTANG SIKAREMA ════════════════════════ --}}
<section class="section-pad" id="tentang">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 reveal">
                <div class="tentang-visual">
                    @if(file_exists(public_path('images/tampilan-dashboard-m.png')))
                        <img src="{{ asset('images/tampilan-dashboard-m.png') }}" alt="Pratinjau Dashboard SIKAREMA">
                    @else
                        <div class="tentang-visual-fallback">
                            <i class="bi bi-grid-1x2-fill"></i>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-6">
                <span class="eyebrow reveal"><span class="dot"></span> Tentang SIKAREMA</span>
                <h2 class="section-heading mb-3 reveal delay-1">
                    Satu Sistem untuk Seluruh Proses Prestasi dan Reward
                </h2>
                <p class="section-lede mb-4 reveal delay-2">
                    SIKAREMA menyatukan proses pengajuan, verifikasi berjenjang, hingga klaim
                    reward dalam satu platform, sehingga mahasiswa dan kampus dapat memantau
                    setiap tahap secara transparan dan real-time.
                </p>

                @php
                    $tentangHighlights = [
                        ['icon' => 'bi-file-earmark-arrow-up-fill', 'text' => 'Pengajuan Prestasi'],
                        ['icon' => 'bi-diagram-3-fill', 'text' => 'Verifikasi Berjenjang'],
                        ['icon' => 'bi-gift-fill', 'text' => 'Klaim Reward'],
                        ['icon' => 'bi-graph-up-arrow', 'text' => 'Monitoring Status'],
                    ];
                @endphp

                <div class="reveal delay-3">
                    @foreach ($tentangHighlights as $h)
                        <div class="highlight-pill">
                            <div class="highlight-pill-icon"><i class="bi {{ $h['icon'] }}"></i></div>
                            <div class="highlight-pill-text">{{ $h['text'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════ 3. FITUR UTAMA ════════════════════════ --}}
<section class="section-pad" id="fitur" style="background: white;">
    <div class="container">
        <div class="text-center mb-5">
            <span class="eyebrow reveal"><span class="dot"></span> Fitur Utama</span>
            <h2 class="section-heading reveal delay-1">Semua yang Dibutuhkan dalam Satu Sistem</h2>
            <p class="section-lede mx-auto mt-2 reveal delay-2">
                Dari pengajuan hingga pencairan reward, setiap proses dirancang
                agar mudah digunakan dan mudah dipantau.
            </p>
        </div>

        @php
            $fiturUtama = [
                ['icon' => 'bi-file-earmark-arrow-up-fill', 'cls' => 'fi-1', 'title' => 'Pengajuan Prestasi', 'desc' => 'Ajukan prestasi beserta dokumen pendukung secara online, kapan saja.'],
                ['icon' => 'bi-shield-check', 'cls' => 'fi-2', 'title' => 'Verifikasi Prestasi', 'desc' => 'Proses verifikasi berjenjang oleh dosen dan admin secara transparan.'],
                ['icon' => 'bi-gift-fill', 'cls' => 'fi-3', 'title' => 'Klaim Reward', 'desc' => 'Ajukan klaim reward untuk prestasi yang telah terverifikasi.'],
                ['icon' => 'bi-cash-coin', 'cls' => 'fi-4', 'title' => 'Pencairan Reward', 'desc' => 'Pantau status pencairan reward hingga dana diterima.'],
                ['icon' => 'bi-bar-chart-fill', 'cls' => 'fi-5', 'title' => 'Laporan', 'desc' => 'Laporan prestasi dan reward yang lengkap, akurat, dan terdokumentasi.'],
                ['icon' => 'bi-activity', 'cls' => 'fi-6', 'title' => 'Monitoring Status', 'desc' => 'Pantau status pengajuan secara real-time dari awal hingga akhir.'],
            ];
        @endphp

        <div class="row g-4">
            @foreach ($fiturUtama as $i => $f)
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card reveal delay-{{ ($i % 3) + 1 }}">
                        <div class="feature-icon-box {{ $f['cls'] }}">
                            <i class="bi {{ $f['icon'] }}"></i>
                        </div>
                        <h5>{{ $f['title'] }}</h5>
                        <p>{{ $f['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ════════════════════════ 4. MENGAPA MEMILIH SIKAREMA (zig-zag) ════════════════════════ --}}
<section id="keunggulan" class="advantage-section py-5">

    <div class="container">

        <div class="text-center mb-5">

            <div class="section-badge">
                <i class="bi bi-stars"></i>
                Keunggulan
            </div>

            <h2 class="advantage-title">
                Mengapa Memilih
                <span>SIKAREMA?</span>
            </h2>

            <p class="advantage-desc">
                <strong>SIKAREMA</strong> dirancang untuk mempermudah proses
                pengajuan prestasi, verifikasi hingga pencairan reward secara
                cepat, transparan, dan terintegrasi dalam satu sistem.
            </p>

        </div>

        <div class="row align-items-center g-5">

            <!-- IMAGE -->

            <div class="col-lg-6 reveal">


                <div class="advantage-image">

                    <img
                        src="{{ asset('images/tampilan-dashboard-a.png') }}"
                        alt="Dashboard SIKAREMA"
                        class="img-fluid">

                </div>

            </div>

            <!-- LIST -->

            <div class="col-lg-6">

                <div class="advantage-card">

                    <div class="advantage-icon bg-primary-soft">
                        <i class="bi bi-lightning-charge-fill text-primary"></i>
                    </div>

                    <div>

                        <h5>Cepat & Efisien</h5>

                        <p>
                            Pengajuan prestasi dilakukan secara online tanpa
                            proses manual yang rumit.
                        </p>

                    </div>

                </div>

                <div class="advantage-card">

                    <div class="advantage-icon bg-success-soft">
                        <i class="bi bi-shield-check text-success"></i>
                    </div>

                    <div>

                        <h5>Transparan</h5>

                        <p>
                            Seluruh tahapan verifikasi dan klaim reward dapat
                            dipantau secara realtime.
                        </p>

                    </div>

                </div>

                <div class="advantage-card">

                    <div class="advantage-icon bg-warning-soft">
                        <i class="bi bi-diagram-3 text-warning"></i>
                    </div>

                    <div>

                        <h5>Terintegrasi</h5>

                        <p>
                            Data mahasiswa, prestasi, dosen dan admin saling
                            terhubung dalam satu sistem.
                        </p>

                    </div>

                </div>

                <div class="advantage-card">

                    <div class="advantage-icon bg-danger-soft">
                        <i class="bi bi-award text-danger"></i>
                    </div>

                    <div>

                        <h5>Reward Tepat Sasaran</h5>

                        <p>
                            Reward hanya diberikan kepada prestasi yang telah
                            lolos seluruh proses verifikasi.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- ════════════════════════ 5. STATISTIK ════════════════════════ --}}
<section class="section-pad-sm">
    <div class="container">
        <div class="stat-section reveal-zoom">
            <div class="text-center mb-5">
                <span class="eyebrow" style="background: rgba(255,255,255,0.12); color: white;">
                    <span class="dot"></span> Statistik SIKAREMA
                </span>
                <h2 class="section-heading mt-2" style="color: white;">Dipercaya oleh Civitas Akademika</h2>
            </div>

            <div class="row align-items-center">
                <div class="col-6 col-lg-3">
                    <div class="stat-item">
                        <div class="stat-counter" data-count="1000" data-suffix="+">0</div>
                        <div class="stat-label">Mahasiswa</div>
                    </div>
                </div>
                <div class="col-lg-auto d-none d-lg-block"><div class="stat-divider"></div></div>

                <div class="col-6 col-lg-3">
                    <div class="stat-item">
                        <div class="stat-counter" data-count="250" data-suffix="+">0</div>
                        <div class="stat-label">Prestasi</div>
                    </div>
                </div>
                <div class="col-lg-auto d-none d-lg-block"><div class="stat-divider"></div></div>

                <div class="col-6 col-lg-3 mt-4 mt-lg-0">
                    <div class="stat-item">
                        <div class="stat-counter" data-count="100" data-suffix="+">0</div>
                        <div class="stat-label">Reward</div>
                    </div>
                </div>
                <div class="col-lg-auto d-none d-lg-block"><div class="stat-divider"></div></div>

                <div class="col-6 col-lg-2 mt-4 mt-lg-0">
                    <div class="stat-item">
                        <div class="stat-counter" data-count="99" data-suffix="%">0</div>
                        <div class="stat-label">Kepuasan</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════ 6. ALUR SISTEM ════════════════════════ --}}
<section class="section-pad" id="alur" style="background: white;">
    <div class="container">
        <div class="text-center mb-5">
            <span class="eyebrow reveal"><span class="dot"></span> Alur Sistem</span>
            <h2 class="section-heading reveal delay-1">Alur Pengajuan Prestasi dan Klaim Reward</h2>
        </div>

        @php
            $alurSteps = [
                ['icon' => 'bi-file-earmark-plus-fill', 'title' => 'Mahasiswa Mengajukan Prestasi', 'text' => 'Lengkapi data dan unggah dokumen pendukung.'],
                ['icon' => 'bi-shield-check', 'title' => 'Dosen Memverifikasi', 'text' => 'Dosen memeriksa kevalidan data dan dokumen.'],
                ['icon' => 'bi-person-check-fill', 'title' => 'Admin Memvalidasi', 'text' => 'Admin menentukan kelayakan reward.'],
                ['icon' => 'bi-gift-fill', 'title' => 'Mahasiswa Klaim Reward', 'text' => 'Ajukan klaim sesuai periode yang dibuka.'],
                ['icon' => 'bi-check-circle-fill', 'title' => 'Reward Dicairkan', 'text' => 'Reward diterima sesuai ketentuan berlaku.'],
            ];
        @endphp

        <div class="timeline-wrap">
            <div class="timeline-line"></div>
            <div class="row g-4">
                @foreach ($alurSteps as $i => $step)
                    <div class="col-md-4 col-lg">
                        <div class="timeline-step reveal delay-{{ $i + 1 }}">
                            <div class="timeline-num-circle">{{ $i + 1 }}</div>
                            <div class="timeline-card">
                                <div class="timeline-card-icon"><i class="bi {{ $step['icon'] }}"></i></div>
                                <div class="timeline-card-title">{{ $step['title'] }}</div>
                                <p class="timeline-card-text">{{ $step['text'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════ 7. FAQ ════════════════════════ --}}
<section class="section-pad" id="faq">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="text-center mb-5">
                    <span class="eyebrow reveal"><span class="dot"></span> FAQ</span>
                    <h2 class="section-heading reveal delay-1">Pertanyaan yang Sering Diajukan</h2>
                </div>

                <div class="accordion faq-accordion reveal delay-2" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Bagaimana cara mengajukan prestasi di SIKAREMA?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Mahasiswa cukup login ke sistem, membuka menu Ajukan Prestasi,
                                mengisi data kegiatan, dan mengunggah dokumen pendukung seperti sertifikat.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Berapa lama proses verifikasi prestasi?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Proses verifikasi melalui dua tahap, yaitu dosen dan admin. Lama proses
                                bergantung pada kelengkapan dokumen yang diunggah mahasiswa.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Kapan saya bisa mengajukan klaim reward?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Klaim reward hanya dapat diajukan untuk prestasi yang sudah terverifikasi,
                                dan selama periode klaim sedang dibuka oleh admin.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                Apakah saya bisa memantau status pengajuan saya?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Bisa. Setiap prestasi dan klaim reward yang diajukan dapat dipantau
                                statusnya secara real-time melalui dashboard mahasiswa.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════ 8. CTA ════════════════════════ --}}
<section class="section-pad-sm">
    <div class="container">
        <div class="cta-section reveal-zoom">
            <h2 class="cta-heading">Siap Mengajukan Prestasi?</h2>
            <p class="cta-text">
                Mulai ajukan prestasimu sekarang dan dapatkan apresiasi yang layak melalui SIKAREMA.
            </p>
            <a href="{{ route('login') }}" class="btn-cta btn-ripple">
                Masuk ke Sistem <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

@endsection