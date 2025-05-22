@extends('templates admin.layout')
@section('halaman_judul', 'Detail Data Kelas')
@section('konten')
<div class="row mt-5">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h5>Detail Data Kelas</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Kelas</th>
                        <td>{{ $lokal->nama_kelas }}</td>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <td>{{ $lokal->jurusan->nama_jurusan ?? 'Tidak Ada Jurusan' }}</td>
                    </tr>
                    <tr>
                        <th>Wali Kelas</th>
                        <td>{{ $lokal->guru->nama ?? 'Tidak Ada Guru' }}</td>
                    </tr>
                </table>
                <a href="{{ route('lokal.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection