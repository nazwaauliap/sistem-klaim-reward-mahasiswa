@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Tambah Prestasi Mahasiswa</h2>
    <p class="text-muted">
        Masukkan data prestasi mahasiswa untuk proses verifikasi.
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
        <form action="{{ route('admin.prestasi-mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Mahasiswa</label>
                    <select name="id_mhs" class="form-select" required>
                        <option value="">-- Pilih Mahasiswa --</option>
                        @foreach($mahasiswas as $mahasiswa)
                            <option value="{{ $mahasiswa->id_mhs }}" {{ old('id_mhs') == $mahasiswa->id_mhs ? 'selected' : '' }}>
                                {{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori Prestasi</label>
                    <select name="id_kategori" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoriPrestasis as $kategori)
                            <option value="{{ $kategori->id_kategori }}" {{ old('id_kategori') == $kategori->id_kategori ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tingkat Prestasi</label>
                    <select name="id_tingkat" class="form-select" required>
                        <option value="">-- Pilih Tingkat --</option>
                        @foreach($tingkatPrestasis as $tingkat)
                            <option value="{{ $tingkat->id_tingkat }}" {{ old('id_tingkat') == $tingkat->id_tingkat ? 'selected' : '' }}>
                                {{ $tingkat->nama_tingkat }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" class="form-control" value="{{ old('nama_kegiatan') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Penyelenggara</label>
                    <input type="text" name="penyelenggara" class="form-control" value="{{ old('penyelenggara') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Kegiatan</label>
                    <input type="date" name="tanggal_kegiatan" class="form-control" value="{{ old('tanggal_kegiatan') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Juara</label>
                    <input type="text" name="juara" class="form-control" value="{{ old('juara') }}" placeholder="Contoh: Juara 1" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">File Sertifikat</label>
                    <input type="file" name="file_sertifikat" class="form-control">
                    <small class="text-muted">Format: PDF, JPG, JPEG, PNG. Maksimal 2 MB.</small>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Status Verifikasi</label>
                    <select name="status_verifikasi" class="form-select" required>
                        <option value="Menunggu" {{ old('status_verifikasi') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="Terverifikasi" {{ old('status_verifikasi') == 'Terverifikasi' ? 'selected' : '' }}>Terverifikasi</option>
                        <option value="Ditolak" {{ old('status_verifikasi') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        <option value="Revisi" {{ old('status_verifikasi') == 'Revisi' ? 'selected' : '' }}>Revisi</option>
                    </select>
                </div>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-main">
                    Simpan Data
                </button>

                <a href="{{ route('admin.prestasi-mahasiswa.index') }}" class="btn btn-secondary rounded-pill px-4">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection