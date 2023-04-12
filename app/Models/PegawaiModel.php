<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model
{
    protected $table = "pegawai";
    protected $fillable = [
        'kode_pegawai',
        'nama',
        'jk',
        'jabatan',
        'no_telp',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat'
       
    ];
    use HasFactory;
}
