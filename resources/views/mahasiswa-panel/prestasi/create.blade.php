@extends('layouts.mahasiswa')

@section('title', 'Ajukan Prestasi')

@section('content')

    <div class="mb-4">
        <a href="{{ route('mahasiswa.dashboard') }}" class="link-small">
            <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
        </a>
        <h2 class="hero-title mt-2 mb-1">Ajukan Prestasi</h2>
        <p class="hero-text mb-0">Lengkapi data prestasi dengan benar untuk diajukan verifikasi.</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger rounded-3">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card page-card-v2">
        <div class="card-body p-4">
            <form action="{{ route('mahasiswa.prestasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-section-title">
                    <i class="bi bi-clipboard-data"></i> Data Prestasi
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="id_kategori" class="form-label-v2">Kategori Prestasi</label>
                        <select name="id_kategori" id="id_kategori" class="form-select @error('id_kategori') is-invalid @enderror">
                            <option value="" selected disabled>Pilih Kategori</option>
                            @foreach($kategoriPrestasis as $kategori)
                                <option value="{{ $kategori->id_kategori }}" {{ old('id_kategori') == $kategori->id_kategori ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="id_tingkat" class="form-label-v2">Tingkat Prestasi</label>
                        <select name="id_tingkat" id="id_tingkat" class="form-select @error('id_tingkat') is-invalid @enderror">
                            <option value="" selected disabled>Pilih Tingkat</option>
                            @foreach($tingkatPrestasis as $tingkat)
                                <option value="{{ $tingkat->id_tingkat }}" {{ old('id_tingkat') == $tingkat->id_tingkat ? 'selected' : '' }}>
                                    {{ $tingkat->nama_tingkat }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_tingkat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="nama_kegiatan" class="form-label-v2">Nama Kegiatan / Prestasi</label>
                        <input type="text" name="nama_kegiatan" id="nama_kegiatan"
                               class="form-control @error('nama_kegiatan') is-invalid @enderror"
                               value="{{ old('nama_kegiatan') }}"
                               placeholder="Masukkan nama kegiatan atau prestasi">
                        @error('nama_kegiatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="penyelenggara" class="form-label-v2">Penyelenggara</label>
                        <input type="text" name="penyelenggara" id="penyelenggara"
                               class="form-control @error('penyelenggara') is-invalid @enderror"
                               value="{{ old('penyelenggara') }}"
                               placeholder="Masukkan nama penyelenggara">
                        @error('penyelenggara')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="tanggal_kegiatan" class="form-label-v2">Tanggal Kegiatan</label>
                        <input type="date" name="tanggal_kegiatan" id="tanggal_kegiatan"
                               class="form-control @error('tanggal_kegiatan') is-invalid @enderror"
                               value="{{ old('tanggal_kegiatan') }}">
                        @error('tanggal_kegiatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="juara" class="form-label-v2">Juara / Capaian</label>
                        <input type="text" name="juara" id="juara"
                               class="form-control @error('juara') is-invalid @enderror"
                               value="{{ old('juara') }}"
                               placeholder="Contoh: Juara 1, Finalis, dsb.">
                        @error('juara')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="file_sertifikat" class="form-label-v2">Dokumen Bukti / Sertifikat</label>
                        <input type="file" name="file_sertifikat" id="file_sertifikat"
                               class="form-control @error('file_sertifikat') is-invalid @enderror"
                               accept=".pdf,.jpg,.jpeg,.png">
                        <div class="form-text">Format PDF, JPG, atau PNG. Maksimal 2MB.</div>
                        @error('file_sertifikat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('mahasiswa.dashboard') }}" class="btn btn-outline-secondary rounded-pill px-4">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-main">
                        <i class="bi bi-send-check me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection