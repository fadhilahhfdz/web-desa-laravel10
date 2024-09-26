<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarBuku extends Model    
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'komentar',
        'id_buku',
    ];

    public function buku() {
        return $this->belongsTo(Perpustakaan::class, 'id_buku', 'id');
    }
}
