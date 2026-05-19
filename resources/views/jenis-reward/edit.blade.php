@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Edit Jenis Reward</h2>
    <p class="text-muted">Perbarui data jenis reward berdasarkan tingkat prestasi.</p>
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
        <form action="{{ route('admin.jenis-reward.update', $jenisReward->id_reward) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Tingkat Prestasi</label>
                <select name="id_tingkat" class="form-select" required>
                    @foreach($tingkatPrestasis as $tingkat)
                        <option value="{{ $tingkat->id_tingkat }}" {{ old('id_tingkat', $jenisReward->id_tingkat) == $tingkat->id_tingkat ? 'selected' : '' }}>
                            {{ $tingkat->nama_tingkat }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Reward</label>
                <input type="text" name="nama_reward" class="form-control" value="{{ old('nama_reward', $jenisReward->nama_reward) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nominal Reward</label>
                <input type="number" name="nominal" class="form-control" value="{{ old('nominal', $jenisReward->nominal) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $jenisReward->keterangan) }}</textarea>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-main">
                    Update Data
                </button>

                <a href="{{ route('admin.jenis-reward.index') }}" class="btn btn-secondary rounded-pill px-4">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection