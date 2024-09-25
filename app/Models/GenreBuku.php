<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreBuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
    ];

    public function buku() {
        return $this->hasMany(Perpustakaan::class);
    }
}
