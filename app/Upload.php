<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $fillable = [
        'title', 'merk', 'kategori', 'harga', 'deskripsi', 'image', 'status',
    ];
}
