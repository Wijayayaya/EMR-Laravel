
@extends('layouts.layout')

@section('title', 'Rekam Medis')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Form Rekam Medis Baru</h5>
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

                <form action="{{ route('rekammedis.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Pasien</label>
                                <select name="pasien_id" class="form-select" required>
                                    <option value="">Pilih Pasien</option>
                                    @foreach($patients as $patient)
                                        <option value="{{ $patient->id }}">
                                            {{ $patient->no_rekam_medis }} - {{ $patient->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Dokter</label>
                                <input type="text" class="form-control" name="dokter" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Tanggal Kunjungan</label>
                                <input type="date" class="form-control" name="tanggal_kunjungan" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Berat Badan (kg)</label>
                                <input type="number" step="0.1" class="form-control" name="berat_badan" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Tinggi Badan (cm)</label>
                                <input type="number" step="0.1" class="form-control" name="tinggi_badan" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Tekanan Darah</label>
                                <input type="text" class="form-control" name="tekanan_darah" placeholder="Contoh: 120/80" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Suhu Tubuh (°C)</label>
                                <input type="number" step="0.1" class="form-control" name="suhu_tubuh" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Detak Jantung (bpm)</label>
                                <input type="number" class="form-control" name="detak_jantung" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Keluhan Pasien</label>
                        <textarea class="form-control" name="keluhan_pasien" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Riwayat Penyakit</label>
                        <textarea class="form-control" name="riwayat_penyakit" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Diagnosis</label>
                        <textarea class="form-control" name="diagnosis" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan Rekam Medis</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
