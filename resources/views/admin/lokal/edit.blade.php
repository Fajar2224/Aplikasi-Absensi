@extends('templates admin.layout')
@section('halaman_judul', 'Edit Data Kelas')
@section('konten')
<div class="row mt-5">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h5>Form Edit Data Kelas</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('lokal.update', $lokal->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="nama_kelas">Nama Kelas</label>
                        <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" value="{{ old('nama_kelas', $lokal->nama_kelas) }}" required>
                        @error('nama_kelas')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jurusans_id">Jurusan</label>
                        <select name="jurusans_id" id="jurusans_id" class="form-control" required>
                            <option value="" disabled>Pilih Jurusan</option>
                            @foreach($jurusan as $j)
                                <option value="{{ $j->id }}" {{ old('jurusans_id', $lokal->jurusans_id) == $j->id ? 'selected' : '' }}>
                                    {{ $j->nama_jurusan }}
                                </option>
                            @endforeach
                        </select>
                        @error('jurusans_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gurus_id">Wali Kelas</label>
                        <select name="gurus_id" id="gurus_id" class="form-control" required>
                            <option value="" disabled>Pilih Guru</option>
                            @foreach($guru as $g)
                                <option value="{{ $g->id }}" {{ old('gurus_id', $lokal->gurus_id) == $g->id ? 'selected' : '' }}>
                                    {{ $g->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('gurus_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('lokal.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection