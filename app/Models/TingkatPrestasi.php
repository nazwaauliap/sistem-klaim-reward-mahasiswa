<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TingkatPrestasi extends Model
{
    protected $primaryKey = 'id_tingkat';

    protected $fillable = [
        'nama_tingkat',
        'deskripsi',
    ];
}