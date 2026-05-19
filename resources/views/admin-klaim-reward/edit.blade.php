@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Proses Klaim Reward</h2>
    <p class="text-muted">
        Periksa data klaim reward mahasiswa, lalu ubah status klaimnya.
    </p>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan!</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card page-card">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Detail Klaim Reward</h5>

        <div class="row mb-3">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Mahasiswa</label>
                <input type="text" class="form-control"
                       value="{{ $klaimReward->prestasiMahasiswa->mahasiswa->nim ?? '-' }} - {{ $klaimReward->prestasiMahasiswa->mahasiswa->nama ?? '-' }}"
                       readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Nama Prestasi</label>
                <input type="text" class="form-control"
                       value="{{ $klaimReward->prestasiMahasiswa->nama_kegiatan ?? '-' }}"
                       readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Kategori Prestasi</label>
                <input type="text" class="form-control"
                       value="{{ $klaimReward->prestasiMahasiswa->kategoriPrestasi->nama_kategori ?? '-' }}"
                       readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Tingkat Prestasi</label>
                <input type="text" class="form-control"
                       value="{{ $klaimReward->prestasiMahasiswa->tingkatPrestasi->nama_tingkat ?? '-' }}"
                       readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Periode Klaim</label>
                <input type="text" class="form-control"
                       value="{{ $klaimReward->periodeKlaim->nama_periode ?? '-' }}"
                       readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Jenis Reward</label>
                <input type="text" class="form-control"
                       value="{{ $klaimReward->jenisReward->nama_reward ?? '-' }}"
                       readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Nominal Reward</label>
                <input type="text" class="form-control"
                       value="Rp {{ number_format($klaimReward->jenisReward->nominal ?? 0, 0, ',', '.') }}"
                       readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Tanggal Pengajuan</label>
                <input type="text" class="form-control"
                       value="{{ $klaimReward->tanggal_pengajuan }}"
                       readonly>
            </div>
        </div>

        <hr>

        <form action="{{ route('admin.klaim-reward.update', $klaimReward->id_klaim) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">Status Klaim</label>
                <select name="status_klaim" class="form-select" required>
                    <option value="Menunggu" {{ old('status_klaim', $klaimReward->status_klaim) == 'Menunggu' ? 'selected' : '' }}>
                        Menunggu
                    </option>
                    <option value="Disetujui" {{ old('status_klaim', $klaimReward->status_klaim) == 'Disetujui' ? 'selected' : '' }}>
                        Disetujui
                    </option>
                    <option value="Ditolak" {{ old('status_klaim', $klaimReward->status_klaim) == 'Ditolak' ? 'selected' : '' }}>
                        Ditolak
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Catatan</label>
                <textarea name="catatan" class="form-control" rows="3" placeholder="Masukkan catatan jika diperlukan">{{ old('catatan', $klaimReward->catatan) }}</textarea>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-main">
                    Simpan Status Klaim
                </button>

                <a href="{{ route('admin.klaim-reward.index') }}" class="btn btn-secondary rounded-pill px-4">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection