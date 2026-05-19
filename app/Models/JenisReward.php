<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisReward extends Model
{
    protected $primaryKey = 'id_reward';

    protected $fillable = [
        'id_tingkat',
        'nama_reward',
        'nominal',
        'keterangan',
    ];

    public function tingkatPrestasi()
    {
        return $this->belongsTo(TingkatPrestasi::class, 'id_tingkat', 'id_tingkat');
    }

    public function klaimRewards()
    {
        return $this->hasMany(KlaimReward::class, 'id_reward', 'id_reward');
    }
}