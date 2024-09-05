<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'author',
        'konten',
        'id_kategori',
    ];

    // public function komentar() {
    //     return $this->hasMany(KomentarController::class);
    // }

    public function kategori() {
        return $this->belongsTo(KategoriBerita::class, 'id_kategori', 'id');
    }

    public function komentar() {
        return $this->hasMany(Komentar::class, 'id_berita', 'id');
    }
}
