@extends('layouts.admin')

@section('content')
<style>
    .report-hero {
        background: white;
        border-radius: 26px;
        padding: 30px;
        box-shadow: 0 14px 32px rgba(15, 23, 42, 0.08);
        margin-bottom: 26px;
        position: relative;
        overflow: hidden;
    }

    .report-hero::after {
        content: "";
        position: absolute;
        width: 190px;
        height: 190px;
        border-radius: 50%;
        background: rgba(18, 184, 134, 0.14);
        top: -70px;
        right: -50px;
    }

    .report-title-main {
        font-weight: 800;
        color: #0b315f;
        position: relative;
        z-index: 1;
    }

    .report-subtitle {
        color: #64748b;
        position: relative;
        z-index: 1;
        line-height: 1.7;
    }

    .filter-card {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 18px;
        position: relative;
        z-index: 1;
    }

    .nominal-box {
        background: linear-gradient(90deg, #0b5ed7, #12b886);
        color: white;
        border-radius: 22px;
        padding: 24px;
        box-shadow: 0 12px 28px rgba(11, 94, 215, 0.18);
        height: 100%;
    }

    .nominal-box small {
        opacity: 0.9;
        font-weight: 600;
    }

    .nominal-box h3 {
        font-weight: 800;
        margin-bottom: 0;
    }

    .section-label {
        font-weight: 800;
        color: #0b315f;
        margin-bottom: 14px;
    }

    .report-card {
        border: none;
        border-radius: 22px;
        box-shadow: 0 12px 28px rgba(15, 23, 42, 0.07);
        transition: 0.25s ease;
        height: 100%;
    }

    .report-card:hover {
        transform: translateY(-4px);
    }

    .report-card .card-body {
        padding: 24px;
    }

    .report-icon {
        width: 48px;
        height: 48px;
        border-radius: 16px;
        background: linear-gradient(135deg, #0b5ed7, #12b886);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-bottom: 16px;
    }

    .report-title {
        color: #64748b;
        font-size: 14px;
        margin-bottom: 6px;
    }

    .report-value {
        font-size: 28px;
        font-weight: 800;
        color: #0b315f;
        margin-bottom: 0;
    }

    .report-mini-text {
        font-size: 13px;
        color: #94a3b8;
        margin-top: 6px;
        margin-bottom: 0;
    }

    .status-panel {
        background: white;
        border: none;
        border-radius: 22px;
        box-shadow: 0 12px 28px rgba(15, 23, 42, 0.07);
        height: 100%;
    }

    .status-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 0;
        border-bottom: 1px solid #e2e8f0;
    }

    .status-row:last-child {
        border-bottom: none;
    }

    .status-number {
        font-weight: 800;
        color: #0b315f;
        font-size: 22px;
    }

    .table-card {
        border: none;
        border-radius: 22px;
        box-shadow: 0 12px 28px rgba(15, 23, 42, 0.07);
    }

    .laporan-table th,
    .laporan-table td {
        padding: 14px 16px;
        font-size: 14px;
        vertical-align: middle;
        white-space: nowrap;
    }

    .table-wrapper {
        overflow-x: auto;
    }
</style>

<div class="report-hero">
    <div class="row g-4 align-items-center">
        <div class="col-lg-7">
            <h2 class="report-title-main mb-2">Laporan Admin</h2>

            <p class="report-subtitle mb-3">
                Rekap data prestasi, klaim reward, dan pencairan reward pada sistem SIKAREMA.
                Laporan dapat difilter berdasarkan periode klaim.
            </p>

            @if($selectedPeriode)
                <span class="badge bg-success px-3 py-2">
                    Periode aktif laporan: {{ $selectedPeriode->nama_periode }}
                </span>
            @else
                <span class="badge bg-primary px-3 py-2">
                    Menampilkan semua periode
                </span>
            @endif
        </div>

        <div class="col-lg-5">
            <div class="filter-card">
                <form action="{{ route('admin.laporan.index') }}" method="GET">
                    <label class="form-label fw-semibold">Filter Periode Klaim</label>

                    <div class="d-flex gap-2">
                        <select name="periode" class="form-select">
                            <option value="">Semua Periode</option>

                            @foreach($periodeKlaims as $periode)
                                <option value="{{ $periode->id_periode }}" {{ $selectedPeriodeId == $periode->id_periode ? 'selected' : '' }}>
                                    {{ $periode->nama_periode }} - {{ $periode->status }}
                                </option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-main">
                            Filter
                        </button>
                    </div>

                    <a href="{{ route('admin.laporan.index') }}" class="btn btn-secondary rounded-pill px-4 mt-3">
                        Reset
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-8">
        <h5 class="section-label">Ringkasan Laporan</h5>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="report-icon">🎓</div>
                        <p class="report-title">Total Mahasiswa</p>
                        <h3 class="report-value">{{ $totalMahasiswa }}</h3>
                        <p class="report-mini-text">Data mahasiswa terdaftar</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="report-icon">🏆</div>
                        <p class="report-title">Total Prestasi</p>
                        <h3 class="report-value">{{ $totalPrestasi }}</h3>
                        <p class="report-mini-text">
                            {{ $selectedPeriode ? 'Prestasi pada periode terpilih' : 'Semua prestasi diajukan' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="report-icon">💰</div>
                        <p class="report-title">Total Klaim</p>
                        <h3 class="report-value">{{ $totalKlaim }}</h3>
                        <p class="report-mini-text">Klaim reward mahasiswa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <h5 class="section-label">Nominal Reward</h5>

        <div class="nominal-box">
            <small>Total Nominal Dicairkan</small>
            <h3 class="mt-2">Rp {{ number_format($totalNominalDicairkan, 0, ',', '.') }}</h3>
            <p class="mb-0 mt-3">
                Total dari data pencairan reward
                {{ $selectedPeriode ? 'pada periode ini.' : 'di semua periode.' }}
            </p>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="card status-panel">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-3">Status Prestasi</h5>

                <div class="status-row">
                    <span>Menunggu Verifikasi</span>
                    <span class="status-number">{{ $prestasiMenunggu }}</span>
                </div>

                <div class="status-row">
                    <span>Terverifikasi</span>
                    <span class="status-number">{{ $prestasiTerverifikasi }}</span>
                </div>

                <div class="status-row">
                    <span>Ditolak</span>
                    <span class="status-number">{{ $prestasiDitolak }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card status-panel">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-3">Status Klaim Reward</h5>

                <div class="status-row">
                    <span>Menunggu</span>
                    <span class="status-number">{{ $klaimMenunggu }}</span>
                </div>

                <div class="status-row">
                    <span>Disetujui</span>
                    <span class="status-number">{{ $klaimDisetujui }}</span>
                </div>

                <div class="status-row">
                    <span>Ditolak</span>
                    <span class="status-number">{{ $klaimDitolak }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card table-card mb-4">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Prestasi Terbaru</h5>

        <div class="table-responsive table-wrapper">
            <table class="table table-hover table-bordered align-middle laporan-table">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Mahasiswa</th>
                        <th>Kategori</th>
                        <th>Tingkat</th>
                        <th>Nama Kegiatan</th>
                        <th>Status Verifikasi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($prestasiTerbaru as $prestasi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $prestasi->mahasiswa->nama ?? '-' }}</td>
                            <td>{{ $prestasi->kategoriPrestasi->nama_kategori ?? '-' }}</td>
                            <td>{{ $prestasi->tingkatPrestasi->nama_tingkat ?? '-' }}</td>
                            <td>{{ $prestasi->nama_kegiatan }}</td>
                            <td>
                                @if($prestasi->status_verifikasi == 'Terverifikasi')
                                    <span class="badge bg-success px-3 py-2">Terverifikasi</span>
                                @elseif($prestasi->status_verifikasi == 'Ditolak')
                                    <span class="badge bg-danger px-3 py-2">Ditolak</span>
                                @elseif($prestasi->status_verifikasi == 'Revisi')
                                    <span class="badge bg-warning px-3 py-2">Revisi</span>
                                @else
                                    <span class="badge bg-secondary px-3 py-2">Menunggu</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Belum ada data prestasi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card table-card">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Klaim Reward Terbaru</h5>

        <div class="table-responsive table-wrapper">
            <table class="table table-hover table-bordered align-middle laporan-table">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Mahasiswa</th>
                        <th>Prestasi</th>
                        <th>Periode</th>
                        <th>Nominal</th>
                        <th>Status Klaim</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($klaimTerbaru as $klaim)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $klaim->prestasiMahasiswa->mahasiswa->nama ?? '-' }}</td>
                            <td>{{ $klaim->prestasiMahasiswa->nama_kegiatan ?? '-' }}</td>
                            <td>{{ $klaim->periodeKlaim->nama_periode ?? '-' }}</td>
                            <td>
                                Rp {{ number_format($klaim->jenisReward->nominal ?? 0, 0, ',', '.') }}
                            </td>
                            <td>
                                @if($klaim->status_klaim == 'Disetujui')
                                    <span class="badge bg-success px-3 py-2">Disetujui</span>
                                @elseif($klaim->status_klaim == 'Ditolak')
                                    <span class="badge bg-danger px-3 py-2">Ditolak</span>
                                @else
                                    <span class="badge bg-secondary px-3 py-2">Menunggu</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Belum ada data klaim reward.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection