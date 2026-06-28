@extends('layouts.admin')

@section('content')
<style>
    .hak-akses-table th {
        white-space: nowrap;
        padding: 14px 16px;
        font-size: 14px;
        vertical-align: middle;
    }

    .hak-akses-table td {
        padding: 14px 16px;
        font-size: 14px;
        vertical-align: middle;
    }

    .hak-akses-table td.keterangan {
        white-space: normal;
        min-width: 350px;
        line-height: 1.6;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    .role-badge {
        display: inline-block;
        min-width: 120px;
        text-align: center;
        padding: 8px 12px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 700;
        color: #ffffff;
    }

    .role-mahasiswa {
        background: #2563eb;
    }

    .role-dosen {
        background: #0f766e;
    }

    .role-admin {
        background: #b45309;
    }

    .role-super-admin {
        background: #15803d;
    }

    .role-lainnya {
        background: #6b7280;
    }

    .rule-badge {
        display: inline-block;
        min-width: 120px;
        text-align: center;
        padding: 7px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        color: #ffffff;
    }

    .rule-pengguna {
        background: #1d4ed8;
    }

    .rule-monitoring {
        background: #0f766e;
    }

    .rule-operasional {
        background: #92400e;
    }

    .rule-full {
        background: #166534;
    }

    .rule-lainnya {
        background: #4b5563;
    }

    .rule-box {
        background: #f8f9fa;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        padding: 18px;
        margin-top: 24px;
    }

    .rule-box h6 {
        font-weight: 700;
        margin-bottom: 14px;
    }

    .rule-table td {
        vertical-align: top;
        line-height: 1.6;
        font-size: 14px;
    }

    .role-info {
        border-radius: 14px;
        padding: 16px 18px;
        margin-bottom: 22px;
        font-size: 14px;
        line-height: 1.6;
    }

    .role-info.admin {
        background: #fff7e6;
        border: 1px solid #f59e0b;
        color: #78350f;
    }

    .role-info.super-admin {
        background: #eafaf1;
        border: 1px solid #22c55e;
        color: #14532d;
    }
</style>

@php
$role = auth()->user()->hakAkses->nama_akses ?? '';
$isSuperAdmin = $role === 'Super Admin';
@endphp

<div class="mb-4">
    <h2 class="fw-bold">
        Hak Akses
    </h2>
    <p class="text-muted">
        Data hak akses digunakan untuk membedakan role pengguna pada sistem SIKAREMA.
    </p>
</div>

@if($isSuperAdmin)
<div class="role-info super-admin">
    Anda login sebagai <strong>Super Admin</strong>. Role ini memiliki akses tertinggi dalam sistem.
    Super Admin dapat mengakses seluruh fitur Admin dan memiliki kewenangan terhadap pengaturan hak akses.
</div>
@else
<div class="role-info admin">
    Anda login sebagai <strong>Admin</strong>. Role ini dapat melihat tabel hak akses,
    tetapi tidak memiliki kewenangan untuk mengubah data hak akses.
</div>
@endif

<div class="card page-card">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="fw-bold mb-1">Daftar Hak Akses</h5>
            </div>

            <div class="d-flex gap-2 align-items-center">
                @if($isSuperAdmin)
                <a href="{{ route('admin.hak-akses.create') }}" class="btn btn-primary rounded-pill px-4">
                    Tambah Hak Akses
                </a>
                @endif

                @if($isSuperAdmin)
                <span class="role-badge role-super-admin">Full Access</span>
                @else
                <span class="role-badge role-lainnya">Read Only</span>
                @endif
            </div>
        </div>

        <div class="table-responsive table-wrapper">
            <table class="table table-hover table-bordered align-middle hak-akses-table">
                <thead class="table-primary">
                    <tr>
                        <th width="80">No</th>
                        <th>Nama Akses</th>
                        <th>Keterangan</th>
                        <th width="180">Kategori Rules</th>
                        @if($isSuperAdmin)
                        <th width="190">Aksi</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @forelse($hakAkses as $akses)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($akses->nama_akses === 'Mahasiswa')
                            <span class="role-badge role-mahasiswa">
                                {{ $akses->nama_akses }}
                            </span>
                            @elseif($akses->nama_akses === 'Dosen')
                            <span class="role-badge role-dosen">
                                {{ $akses->nama_akses }}
                            </span>
                            @elseif($akses->nama_akses === 'Admin')
                            <span class="role-badge role-admin">
                                {{ $akses->nama_akses }}
                            </span>
                            @elseif($akses->nama_akses === 'Super Admin')
                            <span class="role-badge role-super-admin">
                                {{ $akses->nama_akses }}
                            </span>
                            @else
                            <span class="role-badge role-lainnya">
                                {{ $akses->nama_akses }}
                            </span>
                            @endif
                        </td>
                        <td class="keterangan">
                            {{ $akses->keterangan ?? '-' }}
                        </td>
                        <td>
                            @if($akses->nama_akses === 'Mahasiswa')
                            <span class="rule-badge rule-pengguna">
                                Pengguna
                            </span>
                            @elseif($akses->nama_akses === 'Dosen')
                            <span class="rule-badge rule-monitoring">
                                Monitoring
                            </span>
                            @elseif($akses->nama_akses === 'Admin')
                            <span class="rule-badge rule-operasional">
                                Operasional
                            </span>
                            @elseif($akses->nama_akses === 'Super Admin')
                            <span class="rule-badge rule-full">
                                Akses Penuh
                            </span>
                            @else
                            <span class="rule-badge rule-lainnya">
                                Lainnya
                            </span>
                            @endif
                        </td>
                        @if($isSuperAdmin)
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.hak-akses.edit', $akses) }}" class="btn btn-sm btn-warning px-3">
                                    Ubah
                                </a>

                                <form action="{{ route('admin.hak-akses.destroy', $akses) }}" method="POST" onsubmit="return confirm('Hapus hak akses ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger px-3">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="{{ $isSuperAdmin ? 5 : 4 }}" class="text-center text-muted py-4">
                            Belum ada data hak akses.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="rule-box">
            <h6>Jabaran Rules Hak Akses</h6>

            <div class="table-responsive">
                <table class="table table-bordered table-sm rule-table mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="180">Level User</th>
                            <th>Rules Hak Akses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Mahasiswa</strong></td>
                            <td>
                                Mahasiswa dapat login ke halaman mahasiswa, mengajukan prestasi,
                                melihat data prestasi yang diajukan, melihat status verifikasi,
                                dan mengajukan klaim reward apabila prestasi telah memenuhi ketentuan.
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Dosen</strong></td>
                            <td>
                                Dosen dicatat sebagai level user untuk kebutuhan pemantauan data prestasi mahasiswa.
                                Pada tahap ini, halaman dosen belum dikembangkan karena pengerjaan masih difokuskan
                                pada master data mahasiswa, hak akses, halaman mahasiswa, dan halaman admin.
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Admin</strong></td>
                            <td>
                                Admin bertugas mengelola data operasional sistem, seperti data mahasiswa,
                                kategori prestasi, tingkat prestasi, periode klaim, jenis reward,
                                prestasi mahasiswa, klaim reward, pencairan reward, dan laporan.
                                Admin juga dapat melihat tabel hak akses, tetapi tidak dapat mengubah data hak akses.
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Super Admin</strong></td>
                            <td>
                                Super Admin memiliki kewenangan tertinggi dalam sistem. Super Admin dapat melakukan
                                seluruh fungsi Admin dan memiliki kewenangan terhadap pengaturan sistem,
                                termasuk pengelolaan hak akses.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary rounded-pill px-4 mt-4">
            Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection