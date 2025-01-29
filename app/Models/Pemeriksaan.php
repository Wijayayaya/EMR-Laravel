<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

     protected $fillable = [
        'no_rekam_medis',
        'dokter',
        'berat_badan',
        'tekanan_darah',
        'suhu_tubuh',
        'keluhan_pasien',
        'nama_pasien',
        'tanggal_kunjungan',
        'tinggi_badan',
        'detak_jantung',
        'riwayat_penyakit',
        'diagnosis',
    ];
}