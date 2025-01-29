<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    // public function index (){
    //     return view('medis.pasien');
    // }

    public function index()
    {
        return view('medis.pasien');
    }

    public function pasienbaru(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'no_telpon' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        // Nomor rekam medis akan dibuat otomatis oleh model
        $pasien = Pasien::create($validated);

        return redirect()->back()->with('success', 'Pasien berhasil ditambahkan');
    }

    
    public function daftarpasien (){
        return view('medis.daftarpasien');
    }
}
