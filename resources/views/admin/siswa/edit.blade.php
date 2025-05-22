
@extends('templates admin.layout')
@section('halaman_judul', 'Edit Data Siswa')
@section('konten')
<div class="row mt-5">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h5>Form Edit Data Siswa</h5>
            </div>
            <div class="card-body">
            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Menggunakan PUT untuk update data -->
    <div class="form-group">
        <label for="NISN">NISN</label>
        <input type="text" name="NISN" id="NISN" class="form-control" value="{{ old('NISN', $siswa->NISN) }}" disabled>
        @error('NISN')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $siswa->nama) }}" required>
        @error('nama')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat', $siswa->alamat) }}</textarea>
        @error('alamat')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="no_telp">No. Telepon</label>
        <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ old('no_telp', $siswa->no_telp) }}" required>
        @error('no_telp')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="jurusans_id">Jurusan</label>
        <select name="jurusans_id" id="jurusans_id" class="form-control" required>
            <option value="" disabled>Pilih Jurusan</option>
            @foreach($jurusan as $j)
                <option value="{{ $j->id }}" {{ old('jurusans_id', $siswa->jurusans_id) == $j->id ? 'selected' : '' }}>
                    {{ $j->nama_jurusan }}
                </option>
            @endforeach
        </select>
        @error('jurusans_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
</form>
            </div>
        </div>
    </div>
</div>
@endsection