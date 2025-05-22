@extends('templates admin.layout')
@section('halaman_judul','Data Kelas')
@section('konten')
<div class="row mt-5">
    <div class="col-6">
  <div class="card">
    <div class="card-header">
Form Menambah Data Kelas
    </div>
    <div class="card-body">
 <form action="{{route('lokal.store')}}" method="post">
    @csrf
   <div class="col mt-2">
        <label for="nama_kelas" class="text-gray-900">Nama Kelas</label>
        <input type="text" name="nama_kelas" id="nama_kelas" 
        class="form-control">
        </div>
        <div class="col mt-2">
    <label for="jurusans_id" class="text-gray-900">Jurusan</label>
    <select name="jurusans_id" id="jurusans_id" class="form-control">
        <option value="" disabled selected>Pilih Jurusan</option>
        @foreach($jurusan as $j)
            <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
        @endforeach
    </select>
</div>
<div class="col mt-2">
    <label for="gurus_id" class="text-gray-900">Wali Kelas</label>
    <select name="gurus_id" id="gurus_id" class="form-control">
        <option value="" disabled selected>Pilih Guru</option>
        @foreach($guru as $g)
            <option value="{{ $g->id }}">{{ $g->nama }}</option>
        @endforeach
    </select>
</div>
        <div class="col mt-2">
            <button type="submit" class="btn btn-md btn-primary
            float-right">Simpan</button>
        </div>
    </form>
    </div>
  </div>
    </div>
</div>
<div class="col-6">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

@endsection