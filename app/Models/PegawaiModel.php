<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model
{
    protected $table = "pegawai";
    protected $fillable = [
        'nama', 
        'id_pegawai', 
        'JK', 
        'jabatan',
        'no_telp',
        'tempat_lahir', 
        'tanggal_lahir', 
        'alamat'
    ];
    use HasFactory;
}
