@extends('templates admin.layout')
@section('halaman_judul', 'Detail Data Guru')
@section('konten')
<div class="row mt-5">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h5>Detail Data Guru</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>NIP</th>
                        <td>{{ $guru->NIP }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $guru->nama }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $guru->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td>{{ $guru->no_telp }}</td>
                    </tr>
                    <tr>
                        <th>Mata Pelajaran</th>
                        <td>{{ $guru->mapel }}</td>
                    </tr>
                </table>
                <a href="{{ route('guru.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection