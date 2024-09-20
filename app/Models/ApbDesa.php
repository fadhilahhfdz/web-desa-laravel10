<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApbDesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis',
        'kategori',
        'nominal'
    ];

    protected $table = 'apb_desas';

}
