<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'komentar',
    ];

    // public function berita() {
    //     return $this->belongsTo(BeritaController::class);
    // }
}
