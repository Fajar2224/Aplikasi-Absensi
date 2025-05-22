@extends('templates admin.layout')
@section('halaman_judul', 'Tambah Jadwal Mapel')
@section('konten')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Tambah Jadwal Mata Pelajaran</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('mapel.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_mapel" class="form-label">Nama Mapel</label>
                    <input type="text" name="nama_mapel" id="nama_mapel" class="form-control" value="{{ old('nama_mapel') }}" required>
                </div>
                <div class="mb-3">
                    <label for="jadwal_mapel" class="form-label">Jadwal Mapel</label>
                    <input type="text" name="jadwal_mapel" id="jadwal_mapel" class="form-control" value="{{ old('jadwal_mapel') }}" required>
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection