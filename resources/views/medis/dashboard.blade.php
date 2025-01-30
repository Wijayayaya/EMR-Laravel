@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid p-4">
    <h1 class="mb-4">Dashboard Sistem Rekam Medis</h1>
    
    <div class="row">
        
    <!-- Statistik -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Pasien</h5>
                    <h2 class="text-primary">{{ $totalPatients }}</h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Pemeriksaan</h5>
                    <h2 class="text-success">{{ $totalPemeriksaans }}</h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Dokter Aktif</h5>
                    <h2 class="text-info">{{ $totalDokter }}</h2>
                </div>
            </div>
        </div>
    </div>
    
        <!-- Tabel Pasien Terbaru -->
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header bg-primary">
                    <h5 class="card-title mb-0 text-white">Pasien Terdaftar Terbaru</h5>
                </div>
                <div class="card-body">
                    @if($recentPatients->isEmpty())
                        <div class="alert alert-info">Belum ada pasien terdaftar</div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No. RM</th>
                                        <th>Nama Pasien</th>
                                        <th>Tanggal Daftar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentPatients as $pasien)
                                    <tr>
                                        <td>{{ $pasien->no_rekam_medis }}</td>
                                        <td>{{ $pasien->nama }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pasien->created_at)->format('d/m/Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('daftar.pasien') }}" class="btn btn-sm btn-primary float-end">
                            Lihat Semua Pasien <i class="fas fa-arrow-right"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Tabel Pemeriksaan Terbaru -->
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header bg-success">
                    <h5 class="card-title mb-0 text-white">Pemeriksaan Terbaru</h5>
                </div>
                <div class="card-body">
                    @if($recentPemeriksaans->isEmpty())
                        <div class="alert alert-info">Belum ada pemeriksaan tercatat</div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nama Pasien</th>
                                        <th>Dokter</th>
                                        <th>Diagnosis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentPemeriksaans as $pemeriksaan)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($pemeriksaan->tanggal_kunjungan)->format('d/m/Y') }}</td>
                                        <td>{{ $pemeriksaan->pasien->nama }}</td>
                                        <td>{{ $pemeriksaan->dokter }}</td>
                                        <td>{{ Str::limit($pemeriksaan->diagnosis, 20) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('daftar.rekammedis') }}" class="btn btn-sm btn-success float-end">
                            Lihat Semua Pemeriksaan <i class="fas fa-arrow-right"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
