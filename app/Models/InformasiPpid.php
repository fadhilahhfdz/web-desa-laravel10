<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiPpid extends Model
{
    use HasFactory;

    protected $fillable = [
        'daftar_informasi',
        'konten',
    ];
}
