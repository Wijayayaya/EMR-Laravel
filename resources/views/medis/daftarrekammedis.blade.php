@extends('layouts.layout')

@section('title', 'Daftar Rekam Medis')

@section('content')
<div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar Rekam Medis</h5>
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No. RM</th>
                                <th>Nama Pasien</th>
                                <th>Tanggal Kunjungan</th>
                                <th>Dokter</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pemeriksaans as $pemeriksaan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pemeriksaan->pasien->no_rekam_medis }}</td>
                                <td>{{ $pemeriksaan->pasien->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($pemeriksaan->tanggal_kunjungan)->format('d/m/Y') }}</td>
                                <td>{{ $pemeriksaan->dokter }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('rekammedis.show', $pemeriksaan->id) }}" class="btn btn-sm btn-info">
                                            Detail
                                        </a>
                                        <a href="{{ route('edit.rekammedis', $pemeriksaan->id) }}" class="btn btn-sm btn-warning">
                                            Edit
                                        </a>
                                        <form action="{{ route('rekammedis.destroy', $pemeriksaan->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" 
                                                onclick="return confirm('Yakin menghapus data rekam medis?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
