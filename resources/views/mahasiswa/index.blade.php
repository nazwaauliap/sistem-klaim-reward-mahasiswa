@extends('layouts.admin')

@section('title', 'Mahasiswa')

@section('content')
<style>
    .mahasiswa-table {
        min-width: 1500px;
    }

    .mahasiswa-table th {
        white-space: nowrap;
        padding: 14px 16px;
        font-size: 14px;
        vertical-align: middle;
    }

    .mahasiswa-table td {
        padding: 14px 16px;
        font-size: 14px;
        vertical-align: middle;
        white-space: nowrap;
    }

    .mahasiswa-table td.alamat {
        white-space: normal;
        min-width: 220px;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    .btn-action {
        min-width: 70px;
        margin-bottom: 4px;
    }
</style>

<div class="mb-4">
    <h2 class="fw-bold">Data Mahasiswa</h2>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card page-card">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Daftar Mahasiswa</h5>

            <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-main">
                + Tambah Mahasiswa
            </a>
        </div>

        <div class="table-responsive table-wrapper">
            <table class="table table-hover table-bordered align-middle mahasiswa-table">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Email</th>
                        <th>Program Studi</th>
                        <th>Fakultas</th>
                        <th>Angkatan</th>
                        <th>Semester</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th width="170">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($mahasiswas as $mahasiswa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mahasiswa->nim }}</td>
                            <td>{{ $mahasiswa->nama }}</td>
                            <td>{{ $mahasiswa->jenis_kelamin }}</td>
                            <td>{{ $mahasiswa->tempat_lahir }}</td>
                            <td>{{ $mahasiswa->tanggal_lahir }}</td>
                            <td class="alamat">{{ $mahasiswa->alamat ?? '-' }}</td>
                            <td>{{ $mahasiswa->no_hp ?? '-' }}</td>
                            <td>{{ $mahasiswa->email ?? '-' }}</td>
                            <td>{{ $mahasiswa->program_studi }}</td>
                            <td>{{ $mahasiswa->fakultas }}</td>
                            <td>{{ $mahasiswa->angkatan }}</td>
                            <td>{{ $mahasiswa->semester }}</td>
                            <td>{{ $mahasiswa->kelas ?? '-' }}</td>
                            <td>
                                @if($mahasiswa->status_mahasiswa == 'Aktif')
                                    <span class="badge bg-success px-3 py-2">
                                        {{ $mahasiswa->status_mahasiswa }}
                                    </span>
                                @elseif($mahasiswa->status_mahasiswa == 'Cuti')
                                    <span class="badge bg-warning px-3 py-2">
                                        {{ $mahasiswa->status_mahasiswa }}
                                    </span>
                                @elseif($mahasiswa->status_mahasiswa == 'Lulus')
                                    <span class="badge bg-primary px-3 py-2">
                                        {{ $mahasiswa->status_mahasiswa }}
                                    </span>
                                @else
                                    <span class="badge bg-danger px-3 py-2">
                                        {{ $mahasiswa->status_mahasiswa }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.mahasiswa.edit', $mahasiswa->id_mhs) }}" class="btn btn-sm btn-warning btn-action">
                                    Edit
                                </a>

                                <form action="{{ route('admin.mahasiswa.destroy', $mahasiswa->id_mhs) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger btn-action">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="16" class="text-center text-muted py-4">
                                Belum ada data mahasiswa.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary rounded-pill px-4 mt-3">
            Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection