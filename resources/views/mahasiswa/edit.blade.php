@extends('layouts.admin')

@section('content')
<section class="section-padding bg-white">
    <div class="container">
        <h2 class="section-title mb-1">Edit Mahasiswa</h2>
        <p class="section-subtitle">Perbarui data mahasiswa.</p>

        <div class="card feature-card">
            <div class="card-body p-4">
                <form action="{{ route('mahasiswa.update', $mahasiswa->id_mhs) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <input type="text" name="program_studi" class="form-control" value="{{ old('program_studi', $mahasiswa->program_studi) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Angkatan</label>
                        <input type="text" name="angkatan" class="form-control" value="{{ old('angkatan', $mahasiswa->angkatan) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $mahasiswa->email) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No HP</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $mahasiswa->no_hp) }}">
                    </div>

                    <button type="submit" class="btn btn-role btn-mahasiswa">
                        Update
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