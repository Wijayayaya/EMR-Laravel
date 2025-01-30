@extends('layouts.layout')

@section('title', 'Edit Rekam Medis')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Rekam Medis</h5>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-warning alert-dismissible fade show">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <form action="{{ route('rekammedis.update', $pemeriksaan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Pasien</label>
                                <select name="pasien_id" class="form-select" required>
                                    @foreach($patients as $patient)
                                        <option value="{{ $patient->id }}" 
                                            {{ $patient->id == $pemeriksaan->pasien_id ? 'selected' : '' }}>
                                            {{ $patient->no_rekam_medis }} - {{ $patient->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Dokter</label>
                                <input type="text" class="form-control" name="dokter" 
                                    value="{{ $pemeriksaan->dokter }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Tanggal Kunjungan</label>
                                <input type="date" class="form-control" name="tanggal_kunjungan" 
                                    value="{{ \Carbon\Carbon::parse($pemeriksaan->tanggal_kunjungan)->format('d/m/Y') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Berat Badan (kg)</label>
                                <input type="number" step="0.1" class="form-control" name="berat_badan" 
                                    value="{{ $pemeriksaan->berat_badan }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Tinggi Badan (cm)</label>
                                <input type="number" step="0.1" class="form-control" name="tinggi_badan" 
                                    value="{{ $pemeriksaan->tinggi_badan }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Tekanan Darah</label>
                                <input type="text" class="form-control" name="tekanan_darah" 
                                    value="{{ $pemeriksaan->tekanan_darah }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Suhu Tubuh (°C)</label>
                                <input type="number" step="0.1" class="form-control" name="suhu_tubuh" 
                                    value="{{ $pemeriksaan->suhu_tubuh }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Detak Jantung (bpm)</label>
                                <input type="number" class="form-control" name="detak_jantung" 
                                    value="{{ $pemeriksaan->detak_jantung }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Keluhan Pasien</label>
                        <textarea class="form-control" name="keluhan_pasien" rows="3">{{ $pemeriksaan->keluhan_pasien }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Riwayat Penyakit</label>
                        <textarea class="form-control" name="riwayat_penyakit" rows="3">{{ $pemeriksaan->riwayat_penyakit }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Diagnosis</label>
                        <textarea class="form-control" name="diagnosis" rows="3">{{ $pemeriksaan->diagnosis }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update Rekam Medis</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection