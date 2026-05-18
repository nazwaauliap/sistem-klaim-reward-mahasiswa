@extends('layouts.admin')

@section('content')
<section class="section-padding bg-white">
    <div class="container">
        <h2 class="section-title mb-1">Tambah Mahasiswa</h2>
        <p class="section-subtitle">Masukkan data mahasiswa baru.</p>

        <div class="card feature-card">
            <div class="card-body p-4">
                <form action="{{ route('mahasiswa.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" name="nim" class="form-control" value="{{ old('nim') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <input type="text" name="program_studi" class="form-control" value="{{ old('program_studi') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Angkatan</label>
                        <input type="text" name="angkatan" class="form-control" value="{{ old('angkatan') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No HP</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}">
                    </div>

                    <button type="submit" class="btn btn-role btn-mahasiswa">
                        Simpan
                    </button>

                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary rounded-pill px-4">
                        Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection