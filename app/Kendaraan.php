<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $fillable = [
        'title', 'merk', 'kategori', 'harga', 'image', 'status', 'deskripsi',
    ];
}