@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Verifikasi Prestasi Mahasiswa</h2>
    <p class="text-muted">
        Periksa data prestasi mahasiswa, lalu ubah status verifikasinya.
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
        <h5 class="fw-bold mb-4">Detail Pengajuan Prestasi</h5>

        <div class="row mb-3">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Mahasiswa</label>
                <input type="text" class="form-control" value="{{ $prestasiMahasiswa->mahasiswa->nim ?? '-' }} - {{ $prestasiMahasiswa->mahasiswa->nama ?? '-' }}" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Kategori Prestasi</label>
                <input type="text" class="form-control" value="{{ $prestasiMahasiswa->kategoriPrestasi->nama_kategori ?? '-' }}" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Tingkat Prestasi</label>
                <input type="text" class="form-control" value="{{ $prestasiMahasiswa->tingkatPrestasi->nama_tingkat ?? '-' }}" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Nama Kegiatan</label>
                <input type="text" class="form-control" value="{{ $prestasiMahasiswa->nama_kegiatan }}" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Penyelenggara</label>
                <input type="text" class="form-control" value="{{ $prestasiMahasiswa->penyelenggara }}" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Tanggal Kegiatan</label>
                <input type="text" class="form-control" value="{{ $prestasiMahasiswa->tanggal_kegiatan }}" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Juara</label>
                <input type="text" class="form-control" value="{{ $prestasiMahasiswa->juara }}" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">File Sertifikat</label><br>

                @if($prestasiMahasiswa->file_sertifikat)
                    <a href="{{ asset('storage/' . $prestasiMahasiswa->file_sertifikat) }}" target="_blank" class="btn btn-sm btn-info">
                        Lihat Sertifikat
                    </a>
                @else
                    <span class="text-muted">Tidak ada file sertifikat.</span>
                @endif
            </div>
        </div>

        <hr>

        <form action="{{ route('admin.prestasi-mahasiswa.update', $prestasiMahasiswa->id_prestasi) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">Status Verifikasi</label>
                <select name="status_verifikasi" class="form-select" required>
                    <option value="Menunggu" {{ old('status_verifikasi', $prestasiMahasiswa->status_verifikasi) == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Terverifikasi" {{ old('status_verifikasi', $prestasiMahasiswa->status_verifikasi) == 'Terverifikasi' ? 'selected' : '' }}>Terverifikasi</option>
                    <option value="Ditolak" {{ old('status_verifikasi', $prestasiMahasiswa->status_verifikasi) == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    <option value="Revisi" {{ old('status_verifikasi', $prestasiMahasiswa->status_verifikasi) == 'Revisi' ? 'selected' : '' }}>Revisi</option>
                </select>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-main">
                    Simpan Verifikasi
                </button>

                <a href="{{ route('admin.prestasi-mahasiswa.index') }}" class="btn btn-secondary rounded-pill px-4">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection