<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_dukuh',
        'laki_laki',
        'perempuan',
    ];

    protected $table = 'penduduks';

    public function dukuh() {
        return $this->belongsTo(Dukuh::class, 'id_dukuh');
    }
}
