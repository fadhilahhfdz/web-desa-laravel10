<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaktuLayanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'hari',
        'jam_buka',
        'jam_tutup',
    ];
}
