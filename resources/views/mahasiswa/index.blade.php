@extends('layouts.admin')

@section('content')
<section class="section-padding bg-white">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="section-title mb-1">Data Mahasiswa</h2>
                <p class="section-subtitle mb-0">Kelola data mahasiswa pada sistem SIKAREMA.</p>
            </div>

            <a href="{{ route('mahasiswa.create') }}" class="btn btn-role btn-mahasiswa">
                + Tambah Mahasiswa
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card feature-card">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Program Studi</th>
                                <th>Angkatan</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th width="180">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mahasiswas as $mahasiswa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mahasiswa->nim }}</td>
                                    <td>{{ $mahasiswa->nama }}</td>
                                    <td>{{ $mahasiswa->program_studi }}</td>
                                    <td>{{ $mahasiswa->angkatan }}</td>
                                    <td>{{ $mahasiswa->email ?? '-' }}</td>
                                    <td>{{ $mahasiswa->no_hp ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('mahasiswa.edit', $mahasiswa->id_mhs) }}" class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <form action="{{ route('mahasiswa.destroy', $mahasiswa->id_mhs) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">
                                        Belum ada data mahasiswa.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection