@extends('layouts.mahasiswa')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Ajukan Klaim Reward</h2>
    <p class="text-muted">
        Pilih prestasi yang sudah terverifikasi untuk diajukan klaim reward.
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

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="card page-card">
    <div class="card-body p-4">
        <form action="{{ route('mahasiswa.klaim-reward.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Prestasi Terverifikasi</label>
                <select name="id_prestasi" class="form-select" required>
                    <option value="">-- Pilih Prestasi --</option>

                    @foreach($prestasiTerverifikasi as $prestasi)
                        <option value="{{ $prestasi->id_prestasi }}" {{ old('id_prestasi') == $prestasi->id_prestasi ? 'selected' : '' }}>
                            {{ $prestasi->mahasiswa->nama ?? '-' }} - {{ $prestasi->nama_kegiatan }} - {{ $prestasi->tingkatPrestasi->nama_tingkat ?? '-' }}
                        </option>
                    @endforeach
                </select>

                @if($prestasiTerverifikasi->isEmpty())
                    <small class="text-danger">
                        Belum ada prestasi terverifikasi yang dapat diajukan klaim.
                    </small>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Periode Klaim</label>
                <select name="id_periode" class="form-select" required>
                    <option value="">-- Pilih Periode Klaim --</option>

                    @foreach($periodeDibuka as $periode)
                        <option value="{{ $periode->id_periode }}" {{ old('id_periode') == $periode->id_periode ? 'selected' : '' }}>
                            {{ $periode->nama_periode }} | {{ $periode->tanggal_mulai }} s/d {{ $periode->tanggal_selesai }}
                        </option>
                    @endforeach
                </select>

                @if($periodeDibuka->isEmpty())
                    <small class="text-danger">
                        Saat ini belum ada periode klaim yang dibuka.
                    </small>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Reward</label>
                <select name="id_reward" class="form-select" required>
                    <option value="">-- Pilih Jenis Reward --</option>

                    @foreach($jenisRewards as $reward)
                        <option value="{{ $reward->id_reward }}" {{ old('id_reward') == $reward->id_reward ? 'selected' : '' }}>
                            {{ $reward->nama_reward }} - {{ $reward->tingkatPrestasi->nama_tingkat ?? '-' }} - Rp {{ number_format($reward->nominal, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="alert alert-info">
                Pastikan prestasi yang dipilih sudah berstatus <strong>Terverifikasi</strong> dan periode klaim sedang <strong>Dibuka</strong>.
            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-main">
                    Ajukan Klaim Reward
                </button>

                <a href="{{ route('mahasiswa.klaim-reward.index') }}" class="btn btn-secondary rounded-pill px-4">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection