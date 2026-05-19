<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeriodeKlaim extends Model
{
    protected $primaryKey = 'id_periode';

    protected $fillable = [
        'nama_periode',
        'semester',
        'tahun_akademik',
        'periode_ke',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];

    public function klaimRewards()
    {
        return $this->hasMany(KlaimReward::class, 'id_periode', 'id_periode');
    }
}