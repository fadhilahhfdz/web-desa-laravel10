<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpustakaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'publisher',
        'cover',
        'id_genre',
        'status',
        'konten',
    ];

    public function genre() {
        return $this->belongsTo(GenreBuku::class, 'id_genre', 'id');
    }

    public function komentar() {
        return $this->hasMany(KomentarBuku::class, 'id_buku', 'id');
    }
}
