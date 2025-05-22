@extends('templates admin.layout')
@section('halaman_judul','Halaman Index')
@section('konten')
<h1>Selamat Datang Di Aplikasi Absensi</h1>

<div class="row mt-4">
    <!-- Widget Jumlah Siswa -->
    <div class="col-md-3">
        <div class="card text-white bg-primary shadow">
            <div class="card-body">
                <h5 class="card-title">Jumlah Siswa</h5>
                <p class="card-text">
                    <strong style="font-size: 24px;">{{ $jumlah_siswa }}</strong>
                </p>
                <a href="{{ route('siswa.index') }}" class="btn btn-outline-light btn-sm">Lihat Detail</a>
            </div>
        </div>
    </div>

    <!-- Widget Jumlah Guru -->
    <div class="col-md-3">
        <div class="card text-white bg-success shadow">
            <div class="card-body">
                <h5 class="card-title">Jumlah Guru</h5>
                <p class="card-text">
                    <strong style="font-size: 24px;">{{ $jumlah_guru }}</strong>
                </p>
                <a href="{{ route('guru.index') }}" class="btn btn-light btn-sm">Lihat Detail</a>
            </div>
        </div>
    </div>

    <!-- Widget Jumlah Jurusan -->
    <div class="col-md-3">
        <div class="card text-white bg-warning shadow">
            <div class="card-body">
                <h5 class="card-title">Jumlah Jurusan</h5>
                <p class="card-text">
                    <strong style="font-size: 24px;">{{ $jumlah_jurusan }}</strong>
                </p>
                <a href="{{ route('jurusan.index') }}" class="btn btn-light btn-sm">Lihat Detail</a>
            </div>
        </div>
    </div>
</div>

@endsection
