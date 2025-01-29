@extends('layouts.layout')

@section('title', 'Pasien')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Tambah Data Pasien</h5>
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

                <form action="" method="POST">
                    @csrf
                    
                    <!-- Nama Pasien -->
                    <div class="mb-3">
                        <label for="nama" class="form-label fw-bold">Nama Pasien</label>
                        <input type="text" class="form-control" name="nama" 
                               placeholder="Masukkan nama lengkap pasien" required>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" required>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="mb-3">
                        <label for="no_telpon" class="form-label fw-bold">Nomor Telepon</label>
                        <input type="tel" class="form-control" name="no_telpon" 
                               placeholder="Contoh: 081234567890" required>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label fw-bold">Alamat Lengkap</label>
                        <textarea class="form-control" name="alamat" rows="3" 
                                  placeholder="Masukkan alamat lengkap pasien" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">Simpan Data Pasien</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
