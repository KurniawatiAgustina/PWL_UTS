<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmModel extends Model
{
    use HasFactory;

    protected $table = "film";
    protected $fillable = [
        'kode_film',
        'gambar',
        'nama',
        'tgl_tayang',
        'jml_tayang',
        'rating',
        'harga',
    ];
}
