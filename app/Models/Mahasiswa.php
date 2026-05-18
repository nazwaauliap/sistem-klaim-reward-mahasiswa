<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $primaryKey = 'id_mhs';

    protected $fillable = [
        'nim',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_hp',
        'email',
        'program_studi',
        'fakultas',
        'angkatan',
        'semester',
        'kelas',
        'status_mahasiswa',
    ];
}