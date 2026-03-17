<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';

    protected $fillable = [
        'name',
        'nim',
        'tahun_angkatan',
        'umur',
        'tanggal_lahir',
        'gender',
        'photo',
        'phone',
        'jenis',
    ];
    public $timestamps = false;
}
