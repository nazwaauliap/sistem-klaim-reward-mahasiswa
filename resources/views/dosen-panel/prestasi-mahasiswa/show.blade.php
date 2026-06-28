@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Detail Prestasi Mahasiswa</h2>
    <p class="text-muted">Review prestasi, lihat bukti, dan berikan keputusan dosen.</p>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="card page-card">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-3">Biodata Mahasiswa</h5>
                <dl class="row">
                    <dt class="col-sm-4">Nama</dt>
                    <dd class="col-sm-8">{{ $prestasiMahasiswa->mahasiswa->nama ?? '-' }}</dd>

                    <dt class="col-sm-4">NIM</dt>
                    <dd class="col-sm-8">{{ $prestasiMahasiswa->mahasiswa->nim ?? '-' }}</dd>

                    <dt class="col-sm-4">Program Studi</dt>
                    <dd class="col-sm-8">{{ $prestasiMahasiswa->mahasiswa->program_studi ?? '-' }}</dd>

                    <dt class="col-sm-4">Fakultas</dt>
                    <dd class="col-sm-8">{{ $prestasiMahasiswa->mahasiswa->fakultas ?? '-' }}</dd>

                    <dt class="col-sm-4">Semester</dt>
                    <dd class="col-sm-8">{{ $prestasiMahasiswa->mahasiswa->semester ?? '-' }}</dd>
                </dl>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card page-card">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-3">Detail Prestasi</h5>
                <dl class="row">
                    <dt class="col-sm-4">Nama Kegiatan</dt>
                    <dd class="col-sm-8">{{ $prestasiMahasiswa->nama_kegiatan }}</dd>

                    <dt class="col-sm-4">Kategori</dt>
                    <dd class="col-sm-8">{{ $prestasiMahasiswa->kategoriPrestasi->nama_kategori ?? '-' }}</dd>

                    <dt class="col-sm-4">Tingkat</dt>
                    <dd class="col-sm-8">{{ $prestasiMahasiswa->tingkatPrestasi->nama_tingkat ?? '-' }}</dd>

                    <dt class="col-sm-4">Penyelenggara</dt>
                    <dd class="col-sm-8">{{ $prestasiMahasiswa->penyelenggara }}</dd>

                    <dt class="col-sm-4">Tanggal</dt>
                    <dd class="col-sm-8">{{ $prestasiMahasiswa->tanggal_kegiatan }}</dd>

                    <dt class="col-sm-4">Juara</dt>
                    <dd class="col-sm-8">{{ $prestasiMahasiswa->juara }}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<div class="card page-card mb-4">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-3">Bukti Sertifikat</h5>
        @if($prestasiMahasiswa->file_sertifikat)
        <a href="{{ asset('storage/' . $prestasiMahasiswa->file_sertifikat) }}" target="_blank" class="btn btn-main">
            Lihat Sertifikat
        </a>
        @else
        <p class="text-muted">Belum ada file sertifikat.</p>
        @endif
    </div>
</div>

<div class="card page-card mb-4">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-3">Verifikasi Dosen</h5>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('dosen.prestasi-mahasiswa.update', $prestasiMahasiswa->id_prestasi) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="status_dosen" class="form-label">Status Dosen</label>
                <select name="status_dosen" id="status_dosen" class="form-select">
                    <option value="Menunggu" {{ $prestasiMahasiswa->status_dosen === 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Perlu Revisi" {{ $prestasiMahasiswa->status_dosen === 'Perlu Revisi' ? 'selected' : '' }}>Perlu Revisi</option>
                    <option value="Disetujui" {{ $prestasiMahasiswa->status_dosen === 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="Ditolak" {{ $prestasiMahasiswa->status_dosen === 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="catatan_dosen" class="form-label">Catatan Dosen</label>
                <textarea name="catatan_dosen" id="catatan_dosen" class="form-control" rows="4">{{ old('catatan_dosen', $prestasiMahasiswa->catatan_dosen) }}</textarea>
            </div>

            <button type="submit" class="btn btn-main">Simpan</button>
            <a href="{{ route('dosen.prestasi-mahasiswa.index') }}" class="btn btn-secondary ms-2">Kembali</a>
        </form>
    </div>
</div>
@endsection