<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriPrestasi extends Model
{
    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];
}