<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrestasiMahasiswa extends Model
{
    protected $primaryKey = 'id_prestasi';

    protected $fillable = [
        'id_mhs',
        'id_kategori',
        'id_tingkat',
        'nama_kegiatan',
        'penyelenggara',
        'tanggal_kegiatan',
        'juara',
        'file_sertifikat',
        'status_verifikasi',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mhs', 'id_mhs');
    }

    public function kategoriPrestasi()
    {
        return $this->belongsTo(KategoriPrestasi::class, 'id_kategori', 'id_kategori');
    }

    public function tingkatPrestasi()
    {
        return $this->belongsTo(TingkatPrestasi::class, 'id_tingkat', 'id_tingkat');
    }

    public function klaimRewards()
    {
        return $this->hasMany(KlaimReward::class, 'id_prestasi', 'id_prestasi');
    }
    
}