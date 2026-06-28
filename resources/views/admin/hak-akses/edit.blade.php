@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Edit Hak Akses</h2>
    <p class="text-muted">Perbarui detail hak akses sistem.</p>
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
        <form action="{{ route('admin.hak-akses.update', $hakAkses) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Akses</label>
                <input type="text" name="nama_akses" class="form-control" value="{{ old('nama_akses', $hakAkses->nama_akses) }}" placeholder="Contoh: Super Admin" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3" placeholder="Masukkan keterangan hak akses">{{ old('keterangan', $hakAkses->keterangan) }}</textarea>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-main">
                    Perbarui Data
                </button>

                <a href="{{ route('admin.hak-akses.index') }}" class="btn btn-secondary rounded-pill px-4">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection