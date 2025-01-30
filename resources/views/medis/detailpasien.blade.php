@extends('layouts.layout')

@section('title', 'Detail Pasien')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Detail Pasien</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <dl class="row">
                            <dt class="col-sm-4">No. Rekam Medis</dt>
                            <dd class="col-sm-8">{{ $pasien->no_rekam_medis }}</dd>

                            <dt class="col-sm-4">Nama Pasien</dt>
                            <dd class="col-sm-8">{{ $pasien->nama }}</dd>

                            <dt class="col-sm-4">Tanggal Lahir</dt>
                            <dd class="col-sm-8">{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d/m/Y') }}</dd>
                        </dl>
                    </div>
                    <div class="col-md-6">
                        <dl class="row">
                            <dt class="col-sm-4">Jenis Kelamin</dt>
                            <dd class="col-sm-8">{{ $pasien->jenis_kelamin }}</dd>

                            <dt class="col-sm-4">No. Telepon</dt>
                            <dd class="col-sm-8">{{ $pasien->no_telpon }}</dd>

                            <dt class="col-sm-4">Alamat</dt>
                            <dd class="col-sm-8">{{ $pasien->alamat }}</dd>
                        </dl>
                    </div>
                </div>

                <h5 class="mt-4 mb-3">Riwayat Pemeriksaan</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tanggal Kunjungan</th>
                                <th>Dokter</th>
                                <th>Diagnosis</th>
                                <th>Berat Badan</th>
                                <th>Tinggi Badan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pasien->pemeriksaans as $pemeriksaan)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($pemeriksaan->tanggal_kunjungan)->format('d/m/Y') }}</td>
                                <td>{{ $pemeriksaan->dokter }}</td>
                                <td>{{ $pemeriksaan->diagnosis ?? '-' }}</td>
                                <td>{{ $pemeriksaan->berat_badan }} kg</td>
                                <td>{{ $pemeriksaan->tinggi_badan }} cm</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data pemeriksaan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    <a href="{{ route('daftar.pasien') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection