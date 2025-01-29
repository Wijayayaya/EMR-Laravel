<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'no_rekam_medis',
        'tanggal_lahir',
        'jenis_kelamin',
        'no_telpon',
        'alamat',
    ];
}
