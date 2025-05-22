@extends('templates admin.layout')
@section('halaman_judul', 'Tambah Data Jurusan')
@section('konten')
<div class="row mt-5">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h5>Form Tambah Data Jurusan</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('jurusan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_jurusan">Nama Jurusan</label>
                        <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control" value="{{ old('nama_jurusan') }}" required>
                        @error('nama_jurusan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kode_jurusan">Kode Jurusan</label>
                        <input type="text" name="kode_jurusan" id="kode_jurusan" class="form-control" value="{{ old('kode_jurusan') }}" required>
                        @error('kode_jurusan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection