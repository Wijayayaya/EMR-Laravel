<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'no_rekam_medis', // Pastikan ada di fillable
        'tanggal_lahir',
        'jenis_kelamin',
        'no_telpon',
        'alamat',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pasien) {
            // Format: RM-tahun-bulan-hari-increment (RM-20231023-001)
            $prefix = 'RM-' . date('Ymd') . '-';
            $latest = Pasien::where('no_rekam_medis', 'like', $prefix . '%')
                        ->orderBy('no_rekam_medis', 'desc')
                        ->first();

            $nextNumber = 1;
            if ($latest) {
                $lastNumber = (int) substr($latest->no_rekam_medis, -3);
                $nextNumber = $lastNumber + 1;
            }

            $pasien->no_rekam_medis = $prefix . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        });
    }

    public function pemeriksaans()
    {
        return $this->hasMany(Pemeriksaan::class);
    }
}