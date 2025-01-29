@extends('layouts.layout')

@section('title', 'Daftar Pasien')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar Rekam Medis Pasien</h5>
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>No. Rekam Medis</th>
                                <th>Nama Pasien</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Jumlah Pemeriksaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pasiens as $pasien)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pasien->no_rekam_medis }}</td>
                                <td>{{ $pasien->nama }}</td>
                                <td>{{ $pasien->tanggal_lahir->format('d/m/Y') }}</td>
                                <td>{{ $pasien->jenis_kelamin }}</td>
                                <td>{{ $pasien->pemeriksaans->count() }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('pasien.show', $pasien->id) }}" 
                                           class="btn btn-sm btn-info" 
                                           title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('pasien.edit', $pasien->id) }}" 
                                           class="btn btn-sm btn-warning" 
                                           title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger" 
                                                    title="Hapus Data"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                @if($pasiens->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $pasiens->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
