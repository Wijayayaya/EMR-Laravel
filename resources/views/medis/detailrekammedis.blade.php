@extends('layouts.layout')

@section('title', 'Detail Rekam Medis')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Detail Rekam Medis</h5>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5>Informasi Pasien</h5>
                        <dl class="row">
                            <dt class="col-sm-4">No. RM</dt>
                            <dd class="col-sm-8">{{ $pemeriksaan->pasien->no_rekam_medis }}</dd>

                            <dt class="col-sm-4">Nama Pasien</dt>
                            <dd class="col-sm-8">{{ $pemeriksaan->pasien->nama }}</dd>

                            <dt class="col-sm-4">Tanggal Lahir</dt>
                            <dd class="col-sm-8">{{ \Carbon\Carbon::parse($pemeriksaan->pasien->tanggal_lahir)->format('d/m/Y') }}</dd>
                        </dl>
                    </div>
                    
                    <div class="col-md-6">
                        <h5>Informasi Pemeriksaan</h5>
                        <dl class="row">
                            <dt class="col-sm-4">Tanggal Kunjungan</dt>
                            <dd class="col-sm-8">{{ \Carbon\Carbon::parse($pemeriksaan->tanggal_kunjungan)->format('d/m/Y') }}</dd>

                            <dt class="col-sm-4">Dokter</dt>
                            <dd class="col-sm-8">{{ $pemeriksaan->dokter }}</dd>

                            <dt class="col-sm-4">Petugas Input</dt>
                            <dd class="col-sm-8">{{ \Carbon\Carbon::parse($pemeriksaan->created_at)->format('d/m/Y H:i') }}</dd>
                        </dl>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="card-title mb-0">Vital Sign</h6>
                            </div>
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-6">Berat Badan</dt>
                                    <dd class="col-sm-6">{{ $pemeriksaan->berat_badan }} kg</dd>

                                    <dt class="col-sm-6">Tinggi Badan</dt>
                                    <dd class="col-sm-6">{{ $pemeriksaan->tinggi_badan }} cm</dd>

                                    <dt class="col-sm-6">Tekanan Darah</dt>
                                    <dd class="col-sm-6">{{ $pemeriksaan->tekanan_darah }}</dd>

                                    <dt class="col-sm-6">Suhu Tubuh</dt>
                                    <dd class="col-sm-6">{{ $pemeriksaan->suhu_tubuh }} °C</dd>

                                    <dt class="col-sm-6">Detak Jantung</dt>
                                    <dd class="col-sm-6">{{ $pemeriksaan->detak_jantung }} bpm</dd>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="card-title mb-0">Catatan Medis</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <h6>Keluhan Pasien</h6>
                                    <p class="text-muted">{{ $pemeriksaan->keluhan_pasien ?? '-' }}</p>
                                </div>

                                <div class="mb-4">
                                    <h6>Riwayat Penyakit</h6>
                                    <p class="text-muted">{{ $pemeriksaan->riwayat_penyakit ?? '-' }}</p>
                                </div>

                                <div class="mb-4">
                                    <h6>Diagnosis</h6>
                                    <p class="text-muted">{{ $pemeriksaan->diagnosis ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('daftar.rekammedis') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection