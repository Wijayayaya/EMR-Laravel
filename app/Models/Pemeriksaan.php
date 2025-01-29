<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'dokter',
        'berat_badan',
        'tekanan_darah',
        'suhu_tubuh',
        'keluhan_pasien',
        'tanggal_kunjungan',
        'tinggi_badan',
        'detak_jantung',
        'riwayat_penyakit',
        'diagnosis',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}