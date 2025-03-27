@extends('templates.layout')
@section('halaman_judul','halaman index')
@section('konten')
<h1>Selamat Datang Di Aplikasi Absensi</h1>
<div class="col-md-6 col-lg-2 col-xlg-3">
<a href="#">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                  <h1 class="font-light text-white">
                    <i class="fas fa-user"></i>
                  </h1>
                  <h6 class="text-white">Siswa</h6>
                </div>
              </div></a>
            </div>

<div class="col-md-6 col-lg-2 col-xlg-3">
    <a href="{{route('lokal.index')}}">
              <div class="card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">
                    <i class="fas fa-home"></i>
                  </h1>
                  <h6 class="text-white">Kelas</h6>
                </div>
              </div></a>
            </div>

<div class="col-md-6 col-lg-2 col-xlg-3">
<a href="#">
              <div class="card card-hover">
                <div class="box bg-warning text-center">
                  <h1 class="font-light text-white">
                  <i class="fas fa-user-circle"></i>
                  </h1>
                  <h6 class="text-white">Guru</h6>
                </div>
              </div></a>
            </div>
<div class="col-md-6 col-lg-2 col-xlg-3">
<a href="#">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                  <i class="fas fa-book"></i>
                  </h1>
                  <h6 class="text-white">Mapel</h6>
                </div>
              </div></a>
            </div>
<div class="col-md-6 col-lg-2 col-xlg-3">
<a href="#">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">
                    <i class="fas fa-address-book"></i>
                  </h1>
                  <h6 class="text-white">Absen</h6>
                </div>
              </div></a>
            </div>
            @endsection
