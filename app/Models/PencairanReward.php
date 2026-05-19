<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PencairanReward extends Model
{
    protected $primaryKey = 'id_pencairan';

    protected $fillable = [
        'id_klaim',
        'nominal_dicairkan',
        'tanggal_pencairan',
        'status_pencairan',
        'keterangan',
    ];

    public function klaimReward()
    {
        return $this->belongsTo(KlaimReward::class, 'id_klaim', 'id_klaim');
    }
}