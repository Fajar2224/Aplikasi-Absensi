@extends('templates admin.layout')
@section('halaman_judul', 'Edit Data Guru')
@section('konten')
<div class="row mt-5">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h5>Form Edit Data Guru</h5>
            </div>
            <div class="card-body">
            <form action="{{ route('guru.update', $guru->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="NIP">NIP</label>
        <input type="text" name="NIP" id="NIP" class="form-control" value="{{ old('NIP', $guru->NIP) }}" disabled>
        <input type="hidden" name="NIP" value="{{ $guru->NIP }}"> <!-- Hidden input untuk mengirim NIP -->
        @error('NIP')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $guru->nama) }}" required>
        @error('nama')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat', $guru->alamat) }}</textarea>
        @error('alamat')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="no_telp">No. Telepon</label>
        <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ old('no_telp', $guru->no_telp) }}" required>
        @error('no_telp')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="mapel">Mata Pelajaran</label>
        <input type="text" name="mapel" id="mapel" class="form-control" value="{{ old('mapel', $guru->mapel) }}" required>
        @error('mapel')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('guru.index') }}" class="btn btn-secondary">Batal</a>
</form>
            </div>
        </div>
    </div>
</div>
@endsection