<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeriksaan;
use App\Models\Pasien;

class home extends Controller
{
    public function index (){
        $data = [
        'recentPatients' => Pasien::latest()->take(5)->get(),
        'recentPemeriksaans' => Pemeriksaan::with('pasien')->latest()->take(5)->get(),
        'totalPatients' => Pasien::count(),
        'totalPemeriksaans' => Pemeriksaan::count(),
        'totalDokter' => Pemeriksaan::distinct('dokter')->count('dokter')
    ];

    return view('medis.dashboard', $data);
    }
    
}
