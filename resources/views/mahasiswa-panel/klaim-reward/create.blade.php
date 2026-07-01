@extends('layouts.mahasiswa')

@section('title', 'Ajukan Klaim Reward')

@section('content')

    <div class="mb-4">
        <a href="{{ route('mahasiswa.klaim-reward.index') }}" class="link-small">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar Klaim
        </a>
        <h2 class="hero-title mt-2 mb-1">Ajukan Klaim Reward</h2>
        <p class="hero-text mb-0">
            Ajukan klaim reward atas prestasi yang telah diverifikasi.
        </p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger rounded-3">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success rounded-3">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger rounded-3">
            {{ session('error') }}
        </div>
    @endif

    <div class="card page-card-v2">
        <div class="card-body p-4">
            <form action="{{ route('mahasiswa.klaim-reward.store') }}" method="POST">
                @csrf

                <div class="form-section-title mb-4">
                    <i class="bi bi-gift"></i> Form Pengajuan Klaim Reward
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-12">
                        <label for="id_prestasi" class="form-label-v2">Prestasi Terverifikasi</label>
                        <select name="id_prestasi" id="id_prestasi"
                            class="form-select @error('id_prestasi') is-invalid @enderror">
                            <option value="" disabled {{ old('id_prestasi') ? '' : 'selected' }}>Pilih Prestasi
                                Terverifikasi</option>
                            @foreach ($prestasiTerverifikasi as $prestasi)
                                <option value="{{ $prestasi->id_prestasi }}"
                                    {{ old('id_prestasi') == $prestasi->id_prestasi ? 'selected' : '' }}>
                                    {{ $prestasi->nama_kegiatan }} - Tingkat
                                    {{ $prestasi->tingkatPrestasi->nama_tingkat ?? '-' }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_prestasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-12">
                        <label for="id_periode" class="form-label-v2">Periode Klaim</label>
                        <select name="id_periode" id="id_periode"
                            class="form-select @error('id_periode') is-invalid @enderror">
                            <option value="" disabled {{ old('id_periode') ? '' : 'selected' }}>Pilih Periode Klaim
                            </option>
                            @foreach ($periodeDibuka as $periode)
                                <option value="{{ $periode->id_periode }}"
                                    {{ old('id_periode') == $periode->id_periode ? 'selected' : '' }}>
                                    {{ $periode->nama_periode }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_periode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-12">
                        <label for="id_reward" class="form-label-v2">Jenis Reward</label>
                        <select name="id_reward" id="id_reward"
                            class="form-select @error('id_reward') is-invalid @enderror">
                            <option value="" disabled {{ old('id_reward') ? '' : 'selected' }}>Pilih Reward</option>
                            @foreach ($jenisRewards as $reward)
                                <option value="{{ $reward->id_reward }}"
                                    {{ old('id_reward') == $reward->id_reward ? 'selected' : '' }}>
                                    {{ $reward->nama_reward }} - Rp {{ number_format($reward->nominal, 0, ',', '.') }}
                                    @if ($reward->tingkatPrestasi)
                                        (Tingkat {{ $reward->tingkatPrestasi->nama_tingkat }})
                                    @endif
                                </option>
                            @endforeach
                        </select>
                        @error('id_reward')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('mahasiswa.klaim-reward.index') }}"
                        class="btn btn-outline-secondary rounded-pill px-4">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-main rounded-pill px-4">
                        <i class="bi bi-send-check me-1"></i> Ajukan Klaim
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
