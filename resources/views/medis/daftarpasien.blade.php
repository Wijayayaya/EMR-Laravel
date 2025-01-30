@extends('layouts.layout')

@section('title', 'Daftar Pasien')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar Pasien</h5>
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
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pasiens as $pasien)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pasien->no_rekam_medis }}</td>
                                <td>{{ $pasien->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d/m/Y') }}</td>
                                <td>{{ $pasien->jenis_kelamin }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('edit.pasien', $pasien->id) }}" class="btn btn-sm btn-warning">
                                            Edit
                                        </a>
                                        <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" 
                                                onclick="return confirm('Yakin menghapus data pasien?')">
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
@endsection
