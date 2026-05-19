<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KlaimReward extends Model
{
    protected $primaryKey = 'id_klaim';

    protected $fillable = [
        'id_prestasi',
        'id_periode',
        'id_reward',
        'tanggal_pengajuan',
        'status_klaim',
        'catatan',
    ];

    public function prestasiMahasiswa()
    {
        return $this->belongsTo(PrestasiMahasiswa::class, 'id_prestasi', 'id_prestasi');
    }

    public function periodeKlaim()
    {
        return $this->belongsTo(PeriodeKlaim::class, 'id_periode', 'id_periode');
    }

    public function jenisReward()
    {
        return $this->belongsTo(JenisReward::class, 'id_reward', 'id_reward');
    }

    public function pencairanReward()
    {
        return $this->hasOne(PencairanReward::class, 'id_klaim', 'id_klaim');
    }
}