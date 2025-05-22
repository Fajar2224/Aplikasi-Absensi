@extends('templates admin.layout')
@section('halaman_judul', 'Detail Data Siswa')
@section('konten')
<div class="row mt-5">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h5>Detail Data Siswa</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>NISN</th>
                        <td>{{ $siswa->NISN }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $siswa->nama }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $siswa->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Handphone</th>
                        <td>{{ $siswa->no_telp }}</td>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <td>{{ $siswa->jurusan->nama_jurusan ?? 'Tidak Ada Jurusan' }}</td>
                    </tr>
                </table>
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection