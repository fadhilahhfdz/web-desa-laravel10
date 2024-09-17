<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dukuh extends Model
{
    use HasFactory;

    protected $table = 'dukuhs';

    protected $fillable = [
        'nama_dukuh',
        'rt',
        'rw',
    ];

    public function penduduk() {
        return $this->hasOne(Penduduk::class, 'id_dukuh');
    }
}
