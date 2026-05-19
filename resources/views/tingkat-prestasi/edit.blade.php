@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Edit Tingkat Prestasi</h2>
    <p class="text-muted">Perbarui data tingkat prestasi mahasiswa.</p>
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
        <form action="{{ route('admin.tingkat-prestasi.update', $tingkatPrestasi->id_tingkat) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Tingkat</label>
                <input type="text" name="nama_tingkat" class="form-control" value="{{ old('nama_tingkat', $tingkatPrestasi->nama_tingkat) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $tingkatPrestasi->deskripsi) }}</textarea>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-main">
                    Update Data
                </button>

                <a href="{{ route('admin.tingkat-prestasi.index') }}" class="btn btn-secondary rounded-pill px-4">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection