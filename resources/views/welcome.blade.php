@extends('layouts.app')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="badge-campus">
                    Sistem Kampus Digital
                </span>

                <h1 class="hero-title mt-4 mb-3">
                    SIKAREMA
                </h1>

                <h3 class="hero-subtitle mb-3">
                    Sistem Pengajuan Prestasi dan Klaim Reward Mahasiswa
                </h3>

                <p class="hero-text">
                    SIKAREMA membantu mahasiswa dalam mengajukan data prestasi,
                    memantau proses verifikasi, dan melakukan klaim reward prestasi
                    sesuai periode yang dibuka oleh kampus.
                </p>

                <div class="mt-4 d-flex flex-wrap gap-3">
                    <a href="#" class="btn btn-role btn-mahasiswa">Login Mahasiswa</a>
                    <a href="#" class="btn btn-role btn-admin">Login Admin</a>
                </div>
            </div>

            <div class="col-lg-5" id="alur">
                <div class="card alur-card">
                    <div class="alur-header">
                        <h4 class="mb-0 fw-bold">Alur Klaim Reward</h4>
                    </div>

                    <div class="card-body p-4">
                        <div class="step-item">
                            <div class="step-number">1</div>
                            <div>
                                <div class="step-title">Ajukan Prestasi</div>
                                <p class="step-text">
                                    Mahasiswa menginput data prestasi dan mengunggah bukti sertifikat.
                                </p>
                            </div>
                        </div>

                        <div class="step-item">
                            <div class="step-number">2</div>
                            <div>
                                <div class="step-title">Verifikasi Admin</div>
                                <p class="step-text">
                                    Admin mengecek kelengkapan dan kevalidan data prestasi.
                                </p>
                            </div>
                        </div>

                        <div class="step-item">
                            <div class="step-number">3</div>
                            <div>
                                <div class="step-title">Klaim Reward</div>
                                <p class="step-text">
                                    Prestasi yang sudah terverifikasi dapat diajukan untuk klaim reward.
                                </p>
                            </div>
                        </div>

                        <div class="step-item">
                            <div class="step-number">4</div>
                            <div>
                                <div class="step-title">Pencairan Reward</div>
                                <p class="step-text">
                                    Admin memproses klaim reward sesuai periode yang sedang dibuka.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 g-4">
            <div class="col-md-4">
                <div class="card feature-card">
                    <div class="card-body p-4">
                        <div class="feature-icon">P</div>
                        <h4 class="fw-bold text-primary">Prestasi</h4>
                        <p class="text-muted mb-0">
                            Pengajuan prestasi mahasiswa menjadi lebih mudah, rapi, dan terdokumentasi.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card">
                    <div class="card-body p-4">
                        <div class="feature-icon">V</div>
                        <h4 class="fw-bold text-primary">Verifikasi</h4>
                        <p class="text-muted mb-0">
                            Admin dapat memeriksa data prestasi mahasiswa secara lebih terstruktur.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card">
                    <div class="card-body p-4">
                        <div class="feature-icon">R</div>
                        <h4 class="fw-bold text-primary">Reward</h4>
                        <p class="text-muted mb-0">
                            Klaim reward hanya dapat dilakukan saat periode klaim sedang dibuka.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-white" id="fitur">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Fitur Utama SIKAREMA</h2>
            <p class="section-subtitle">
                Tampilan sistem dibedakan berdasarkan hak akses admin dan mahasiswa.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card feature-card">
                    <div class="card-body p-4">
                        <div class="feature-icon">A</div>
                        <h4 class="fw-bold">Dashboard Admin</h4>
                        <p class="text-muted">
                            Admin dapat mengelola data mahasiswa, kategori prestasi,
                            tingkat prestasi, periode klaim, verifikasi prestasi,
                            dan proses klaim reward.
                        </p>
                        <ul class="text-muted mb-0">
                            <li>Kelola data master</li>
                            <li>Verifikasi prestasi mahasiswa</li>
                            <li>Proses klaim dan pencairan reward</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card feature-card">
                    <div class="card-body p-4">
                        <div class="feature-icon">M</div>
                        <h4 class="fw-bold">Dashboard Mahasiswa</h4>
                        <p class="text-muted">
                            Mahasiswa dapat mengajukan prestasi, melihat status verifikasi,
                            mengajukan klaim reward, dan memantau riwayat klaim.
                        </p>
                        <ul class="text-muted mb-0">
                            <li>Ajukan prestasi</li>
                            <li>Lihat status verifikasi</li>
                            <li>Klaim reward saat periode dibuka</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="info-strip mt-5">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3 class="fw-bold mb-2">Klaim Reward Berdasarkan Periode</h3>
                    <p class="mb-md-0">
                        Mahasiswa hanya dapat mengajukan klaim reward jika prestasi sudah terverifikasi
                        dan periode klaim sedang dibuka oleh admin.
                    </p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <a href="#" class="btn btn-light btn-role text-primary">Mulai Ajukan</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection