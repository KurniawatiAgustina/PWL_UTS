<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmModel extends Model
{
    use HasFactory;

    protected $table = "film";
    protected $fillable = [
        'nama',
        'id_film',
        'tgl_tayang',
        'rating',
        'jml_tayang',
        'harga',
    ];
}
