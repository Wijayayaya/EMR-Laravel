<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    // Menampilkan form tambah pasien
    public function create()
    {
        return view('medis.pasien');
    }

    // Menyimpan data pasien baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'no_telpon' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        Pasien::create($validated);

        return redirect()->route('daftar.pasien')
            ->with('success', 'Pasien berhasil ditambahkan');
    }

    // Menampilkan daftar pasien
    public function index()
    {
        $pasiens = Pasien::all();
        return view('medis.daftarpasien', compact('pasiens'));
    }

    // Menampilkan form edit pasien
    public function edit(Pasien $pasien)
    {
        return view('medis.editpasien', compact('pasien'));
    }

    // Update data pasien
    public function update(Request $request, Pasien $pasien)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'no_telpon' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        $pasien->update($validated);

        return redirect()->route('daftar.pasien')
            ->with('success', 'Data pasien berhasil diperbarui');
    }

    // Hapus data pasien
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('daftar.pasien')
            ->with('success', 'Pasien berhasil dihapus');
    }

    public function show(Pasien $pasien)
    {
        $pasien->load('pemeriksaans');
        return view('medis.detailpasien', compact('pasien'));
    }
}