<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // Tambahkan baris ini untuk mengatur kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama',
        'nim',
    ];
}