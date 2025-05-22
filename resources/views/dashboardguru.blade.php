@extends('templates guru.layout')
@section('halaman_judul', 'Dashboard Guru')
@section('konten')
<div class="container mt-4">
    {{-- Pesan Selamat Datang --}}
    <div class="alert alert-info shadow-sm d-flex align-items-center" style="font-size:1.1rem;">
        <i class="fas fa-user-tie me-2"></i>
        Selamat datang, <b class="ms-1">{{ Auth::user()->username ?? 'User' }}</b>! Semoga harimu menyenangkan 😊
    </div>
    <section class="section dashboard">
        <div class="row g-4">

            <!-- Siswa -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100" style="background: linear-gradient(135deg, #4e73df 60%, #224abe 100%); color: #fff;">
                    <div class="card-body">
                        <h5 class="card-title text-white">Siswa <span class="text-light fs-6">| Hari Ini</span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle bg-white text-primary d-flex align-items-center justify-content-center me-3 shadow" style="font-size: 2rem; width:48px; height:48px;">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h3 class="mb-0 fw-bold text-white">{{ $jumlah_siswa }}</h3>
                                <span class="text-light small">Total siswa yang terdaftar</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Guru -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100" style="background: linear-gradient(135deg, #1cc88a 60%, #17a673 100%); color: #fff;">
                    <div class="card-body">
                        <h5 class="card-title text-white">Guru <span class="text-light fs-6">| Hari Ini</span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle bg-white text-success d-flex align-items-center justify-content-center me-3 shadow" style="font-size: 2rem; width:48px; height:48px;">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <div>
                                <h3 class="mb-0 fw-bold text-white">{{ $jumlah_guru }}</h3>
                                <span class="text-light small">Total guru yang terdaftar</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kelas -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100" style="background: linear-gradient(135deg, #f6c23e 60%, #dda20a 100%); color: #fff;">
                    <div class="card-body">
                        <h5 class="card-title text-white">Kelas <span class="text-light fs-6">| Hari Ini</span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle bg-white text-warning d-flex align-items-center justify-content-center me-3 shadow" style="font-size: 2rem; width:48px; height:48px;">
                                <i class="fas fa-door-open"></i>
                            </div>
                            <div>
                                <h3 class="mb-0 fw-bold text-white">{{ $jumlah_lokal }}</h3>
                                <span class="text-light small">Total kelas yang tersedia</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jurusan -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100" style="background: linear-gradient(135deg, #36b9cc 60%, #258fa7 100%); color: #fff;">
                    <div class="card-body">
                        <h5 class="card-title text-white">Jurusan <span class="text-light fs-6">| Hari Ini</span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle bg-white text-info d-flex align-items-center justify-content-center me-3 shadow" style="font-size: 2rem; width:48px; height:48px;">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                            <div>
                                <h3 class="mb-0 fw-bold text-white">{{ $jumla_jurusan }}</h3>
                                <span class="text-light small">Total jurusan yang tersedia</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Guru Mengajar -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100" style="background: linear-gradient(135deg, #858796 60%, #5a5c69 100%); color: #fff;">
                    <div class="card-body">
                        <h5 class="card-title text-white">Guru Mengajar <span class="text-light fs-6">| Hari Ini</span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle bg-white text-secondary d-flex align-items-center justify-content-center me-3 shadow" style="font-size: 2rem; width:48px; height:48px;">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div>
                                <h3 class="mb-0 fw-bold text-white">{{ $jumlah_mengajar }}</h3>
                                <span class="text-light small">Total guru yang mengajar</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Absen Siswa -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100" style="background: linear-gradient(135deg, #e74a3b 60%, #be2617 100%); color: #fff;">
                    <div class="card-body">
                        <h5 class="card-title text-white">Absen Siswa <span class="text-light fs-6">| Hari Ini</span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle bg-white text-danger d-flex align-items-center justify-content-center me-3 shadow" style="font-size: 2rem; width:48px; height:48px;">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <div>
                                <h3 class="mb-0 fw-bold text-white">{{ $jumlah_absen }}</h3>
                                <span class="text-light small">Total absen yang terabsen</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection