@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Edit Periode Klaim</h2>
    <p class="text-muted">Perbarui data periode klaim reward prestasi mahasiswa.</p>
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
        <form action="{{ route('admin.periode-klaim.update', $periodeKlaim->id_periode) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Periode</label>
                    <input type="text" name="nama_periode" class="form-control" value="{{ old('nama_periode', $periodeKlaim->nama_periode) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Semester</label>
                    <select name="semester" class="form-select" required>
                        <option value="Ganjil" {{ old('semester', $periodeKlaim->semester) == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                        <option value="Genap" {{ old('semester', $periodeKlaim->semester) == 'Genap' ? 'selected' : '' }}>Genap</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tahun Akademik</label>
                    <input type="text" name="tahun_akademik" class="form-control" value="{{ old('tahun_akademik', $periodeKlaim->tahun_akademik) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Periode Ke</label>
                    <select name="periode_ke" class="form-select" required>
                        <option value="1" {{ old('periode_ke', $periodeKlaim->periode_ke) == '1' ? 'selected' : '' }}>Periode 1</option>
                        <option value="2" {{ old('periode_ke', $periodeKlaim->periode_ke) == '2' ? 'selected' : '' }}>Periode 2</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai', $periodeKlaim->tanggal_mulai) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai', $periodeKlaim->tanggal_selesai) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="Belum Dibuka" {{ old('status', $periodeKlaim->status) == 'Belum Dibuka' ? 'selected' : '' }}>Belum Dibuka</option>
                        <option value="Dibuka" {{ old('status', $periodeKlaim->status) == 'Dibuka' ? 'selected' : '' }}>Dibuka</option>
                        <option value="Ditutup" {{ old('status', $periodeKlaim->status) == 'Ditutup' ? 'selected' : '' }}>Ditutup</option>
                    </select>
                </div>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-main">
                    Update Data
                </button>

                <a href="{{ route('admin.periode-klaim.index') }}" class="btn btn-secondary rounded-pill px-4">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection