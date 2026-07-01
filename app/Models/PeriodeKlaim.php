<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function scopeDibuka($query)
    {
        return $query->where('status', 'Dibuka')
            ->whereDate('tanggal_mulai', '<=', today())
            ->whereDate('tanggal_selesai', '>=', today());
    }

    public function isOpen()
    {
        return $this->status === 'Dibuka'
            && $this->tanggal_mulai->lte(today())
            && $this->tanggal_selesai->gte(today());
    }

    public function klaimRewards()
    {
        return $this->hasMany(KlaimReward::class, 'id_periode', 'id_periode');
    }
}
