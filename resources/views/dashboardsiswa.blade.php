@extends('templates siswa.layout')
@section('halaman_judul', 'Dashboard Siswa')
@section('konten')
<div class="container mt-4">
    <div class="alert alert-info">
        Selamat datang, <b>{{ $siswa->nama }}</b>!
    </div>
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Absen</h5>
                    <p class="card-text fs-3">{{ $jumlah_absen }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Hadir</h5>
                    <p class="card-text fs-3">{{ $jumlah_hadir }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Sakit</h5>
                    <p class="card-text fs-3">{{ $jumlah_sakit }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Alfa</h5>
                    <p class="card-text fs-3">{{ $jumlah_alfa }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection