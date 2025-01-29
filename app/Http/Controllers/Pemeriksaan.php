<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class Pemeriksaan extends Controller
{
public function create()
    {
        $patients = Pasien::all();
        return view('pemeriksaan.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter' => 'required|string|max:255',
            'berat_badan' => 'required|numeric',
            'tekanan_darah' => 'required|string',
            // ... tambahkan validasi untuk field lainnya
        ]);

        Pemeriksaan::create($validated);

        return redirect()->route('pemeriksaan.index')
            ->with('success', 'Data pemeriksaan berhasil disimpan');
    }

    public function show(Pasien $pasien)
    {
        $pasien->load('pemeriksaans');
        return view('rekam_medis.show', compact('pasien'));
    }
}
