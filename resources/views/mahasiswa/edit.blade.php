@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Edit Mahasiswa</h2>
    <p class="text-muted">Perbarui data mahasiswa sesuai dengan 15 kolom pada Tugas 1.</p>
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
        <form action="{{ route('admin.mahasiswa.update', $mahasiswa->id_mhs) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Mahasiswa</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $mahasiswa->tempat_lahir) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $mahasiswa->tanggal_lahir) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $mahasiswa->no_hp) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $mahasiswa->email) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Program Studi</label>
                    <input type="text" name="program_studi" class="form-control" value="{{ old('program_studi', $mahasiswa->program_studi) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Fakultas</label>
                    <input type="text" name="fakultas" class="form-control" value="{{ old('fakultas', $mahasiswa->fakultas) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Angkatan</label>
                    <input type="text" name="angkatan" class="form-control" value="{{ old('angkatan', $mahasiswa->angkatan) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Semester</label>
                    <input type="number" name="semester" class="form-control" value="{{ old('semester', $mahasiswa->semester) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Kelas</label>
                    <input type="text" name="kelas" class="form-control" value="{{ old('kelas', $mahasiswa->kelas) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Status Mahasiswa</label>
                    <select name="status_mahasiswa" class="form-select" required>
                        <option value="Aktif" {{ old('status_mahasiswa', $mahasiswa->status_mahasiswa) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Cuti" {{ old('status_maasiswa', $mahasiswa->status_mahasiswa) == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                        <option value="Lulus" {{ old('status_mahasiswa', $mahasiswa->status_mahasiswa) == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                        <option value="Nonaktif" {{ old('status_mahasiswa', $mahasiswa->status_mahasiswa) == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3">{{ old('alamat', $mahasiswa->alamat) }}</textarea>
                </div>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-main">
                    Update Data
                </button>

                <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-secondary rounded-pill px-4">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection