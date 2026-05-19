@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Edit Pencairan Reward</h2>
    <p class="text-muted">
        Perbarui data pencairan reward mahasiswa.
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
        <form action="{{ route('admin.pencairan-reward.update', $pencairanReward->id_pencairan) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Klaim Reward</label>
                <select name="id_klaim" class="form-select" required>
                    @foreach($klaimRewards as $klaim)
                        <option value="{{ $klaim->id_klaim }}" {{ old('id_klaim', $pencairanReward->id_klaim) == $klaim->id_klaim ? 'selected' : '' }}>
                            {{ $klaim->prestasiMahasiswa->mahasiswa->nama ?? '-' }}
                            - {{ $klaim->prestasiMahasiswa->nama_kegiatan ?? '-' }}
                            - Rp {{ number_format($klaim->jenisReward->nominal ?? 0, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nominal Dicairkan</label>
                <input type="number" name="nominal_dicairkan" class="form-control" value="{{ old('nominal_dicairkan', $pencairanReward->nominal_dicairkan) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Pencairan</label>
                <input type="date" name="tanggal_pencairan" class="form-control" value="{{ old('tanggal_pencairan', $pencairanReward->tanggal_pencairan) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status Pencairan</label>
                <select name="status_pencairan" class="form-select" required>
                    <option value="Diproses" {{ old('status_pencairan', $pencairanReward->status_pencairan) == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="Selesai" {{ old('status_pencairan', $pencairanReward->status_pencairan) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $pencairanReward->keterangan) }}</textarea>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-main">
                    Update Data
                </button>

                <a href="{{ route('admin.pencairan-reward.index') }}" class="btn btn-secondary rounded-pill px-4">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection