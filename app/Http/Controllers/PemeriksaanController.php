<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeriksaan;
use App\Models\Pasien;

class PemeriksaanController extends Controller
{
    // Menampilkan form tambah rekam medis
    public function create()
    {
        $patients = Pasien::all();
        return view('medis.rekammedis', compact('patients'));
    }

    // Menyimpan data rekam medis
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter' => 'required|string|max:255',
            'berat_badan' => 'required|numeric',
            'tekanan_darah' => 'required|string',
            'suhu_tubuh' => 'required|numeric',
            'keluhan_pasien' => 'nullable|string',
            'tanggal_kunjungan' => 'required|date',
            'tinggi_badan' => 'required|numeric',
            'detak_jantung' => 'required|integer',
            'riwayat_penyakit' => 'nullable|string',
            'diagnosis' => 'nullable|string',
        ]);

        Pemeriksaan::create($validated);

        return redirect()->route('daftar.rekammedis')
            ->with('success', 'Rekam medis berhasil ditambahkan');
    }

    // Menampilkan daftar rekam medis
    public function index()
    {
        $pemeriksaans = Pemeriksaan::with('pasien')->get();
        return view('medis.daftarrekammedis', compact('pemeriksaans'));
    }

    // Menampilkan form edit rekam medis
    public function edit(Pemeriksaan $pemeriksaan)
    {
        $patients = Pasien::all();
        return view('medis.editrekammedis', compact('pemeriksaan', 'patients'));
    }

    // Update data rekam medis
    public function update(Request $request, Pemeriksaan $pemeriksaan)
    {
        $validated = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter' => 'required|string|max:255',
            'berat_badan' => 'required|numeric',
            'tekanan_darah' => 'required|string',
            'suhu_tubuh' => 'required|numeric',
            'keluhan_pasien' => 'nullable|string',
            'tanggal_kunjungan' => 'required|date',
            'tinggi_badan' => 'required|numeric',
            'detak_jantung' => 'required|integer',
            'riwayat_penyakit' => 'nullable|string',
            'diagnosis' => 'nullable|string',
        ]);

        $pemeriksaan->update($validated);

        return redirect()->route('daftar.rekammedis')
            ->with('success', 'Rekam medis berhasil diperbarui');
    }

    // Hapus data rekam medis
    public function destroy(Pemeriksaan $pemeriksaan)
    {
        $pemeriksaan->delete();
        return redirect()->route('daftar.rekammedis')
            ->with('success', 'Rekam medis berhasil dihapus');
    }
}