<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApbDesa extends Model
{
    use HasFactory;
    use HasFormatRupiah;
    
    protected $fillable = [
        'jenis',
        'kategori',
        'nominal'
    ];

    protected $table = 'apb_desas';

}
