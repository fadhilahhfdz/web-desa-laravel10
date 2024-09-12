<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiDesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_desa',
        'deskripsi_desa',
        'hotline_desa',
        'email_desa',
        'thumbnail_video',
        'link_video'
    ];
}
