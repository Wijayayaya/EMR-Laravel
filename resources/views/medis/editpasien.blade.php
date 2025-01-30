@extends('layouts.layout')

@section('title', 'Edit Pasien')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Data Pasien</h5>
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

                <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama" class="form-label fw-bold">Nama Pasien</label>
                        <input type="text" class="form-control" name="nama" value="{{ $pasien->nama }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="{{ $pasien->tanggal_lahir }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin" required>
                            <option value="Laki-laki" {{ $pasien->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $pasien->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="no_telpon" class="form-label fw-bold">Nomor Telepon</label>
                        <input type="tel" class="form-control" name="no_telpon" value="{{ $pasien->no_telpon }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label fw-bold">Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3" required>{{ $pasien->alamat }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update Data Pasien</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection