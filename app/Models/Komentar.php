<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'komentar',
        'id_berita',
    ];

    public function berita() {
        return $this->belongsTo(Berita::class, 'id_berita', 'id');
    }
}
