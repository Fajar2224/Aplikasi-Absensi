<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LokalController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});
Route::get('absen',[AbsenController::class,'index'])->name('absen.index');
Route::get('/absen/create', [AbsenController::class, 'create'])->name('absen.create');
Route::get('/home', [DashboardController::class, 'index'])->name('home');
Route::get('dashboardguru', [DashboardController::class, 'dashboardguru'])->name('dashboardguru');
Route::resource('absen', absencontroller::class);
Route::post('absen/updateStatus', [AbsenController::class, 'updateStatus'])->name('absen.updateStatus');
Route::get('/absen/mengabsen/{lokals_id}', [AbsenController::class, 'mengabsen'])->name('absen.mengabsen');
Route::get('/rekap/rekap', [RekapController::class, 'index'])->name('rekap.rekap');
Route::get('absen/{id}/edit', [absencontroller::class, 'edit'])->name('absen.edit');
Route::put('absen/{id}', [absencontroller::class, 'update'])->name('absen.update');
Route::get('/absen/{id}', [AbsenController::class, 'show'])->name('absen.show');
Route::resource('mapel', MapelController::class);
Route::get('dashboardsiswa', [DashboardController::class, 'dashboardSiswa'])->name('dashboardsiswa');

Route::get('login', function (){
    return view('login',[
        "menu"=>'login'
    ]);
})->name('login');
Route::get('dashboard', function (){
    return view('dashboard',[
        "menu"=>'dashboard'
    ]);
})->name('dashboard');
Route::post('auth',[LoginController::class,
'authenticate'])->name('auth'); 
Route::post('logout',[LoginController::class,
'logout'])->name('logout');

Route::get('/dashboard-guru', [GuruController::class, 'index'])->name('dashboard-guru');
//lokal
Route ::get('lokal',[
    LokalController::class,'index'
])->name('lokal.index');
Route ::get('lokal/create',[
    LokalController::class,'create'
])->name('lokal.create');
Route::get('lokal/show/{id}', [
    LokalController::class, 'show'
    ])->name('lokal.show');
Route ::post('lokal',[
    lokalController::class,'store'
])->name('lokal.store');
Route ::get('lokal/edit/{a_id}',[
    LokalController::class,'edit'
])->name('lokal.edit');
Route ::post('lokal/update/{a_id}',[
    LokalController::class,'update'
])->name('lokal.update');
Route ::delete ('lokal/delete/{a_id}',[
    LokalController::class,'destroy'
])->name('lokal.hapus');
Route ::get('lokal/show/{a_id}',[
    LokalController::class,'show'
])->name('lokal.show');

//siswa
Route ::get('siswa',[
    SiswaController::class,'index'
])->name('siswa.index');
Route ::get('siswa/create',[
    SiswaController::class,'create'
])->name('siswa.create');
Route::get('siswa/view/{id}', [
    SiswaController::class, 'show'
    ])->name('siswa.show');
Route ::post('siswa',[
    SiswaController::class,'store'
])->name('siswa.store');
Route ::get('siswa/edit/{a_id}',[
    SiswaController::class,'edit'
])->name('siswa.edit');
Route::put('siswa/update/{id}', [
    SiswaController::class, 'update'
    ])->name('siswa.update');
Route ::delete ('siswa/delete/{a_id}',[
    SiswaController::class,'destroy'
])->name('siswa.hapus');
Route::resource('siswa', SiswaController::class);
Route::get('/rekap', [SiswaController::class, 'index'])->name('rekap.index');

//guru
Route::get('guru', [
GuruController::class, 'index'
])->name('guru.index');
Route::get('guru/create', [
GuruController::class, 'create'
])->name('guru.create');
Route::get('guru/show/{id}', [
    GuruController::class, 'show'
    ])->name('guru.show');
Route::get('guru/edit/{id}', [
    GuruController::class, 'edit'
    ])->name('guru.edit');
Route::put('guru/update/{id}', [
    GuruController::class, 'update'
    ])->name('guru.update');
Route ::post('guru/store', [
    GuruController::class, 'store'
    ])->name('guru.store');
Route::delete('guru/destroy/{id}', [
    GuruController::class, 'destroy'
    ])->name('guru.destroy');
  
    //jurusan
Route::get('jurusan', [
    JurusanController::class, 'index'
    ])->name('jurusan.index');
Route::get('jurusan/create', [
    JurusanController::class, 'create'
        ])->name('jurusan.create');
Route::post('jurusan/store', [
    JurusanController::class, 'store'
    ])->name('jurusan.store');
Route::get('jurusan/show/{id}', [
    JurusanController::class, 'show'
        ])->name('jurusan.show');
Route::get('jurusan/edit/{id}', [
    JurusanController::class, 'edit'
        ])->name('jurusan.edit');
Route::put('jurusan/update/{id}', [
    JurusanController::class, 'update'
    ])->name('jurusan.update');
Route::delete('jurusan/destroy/{id}', [
    JurusanController::class, 'destroy'
        ])->name('jurusan.destroy');

Route::resource('user', usercontroller::class);
Route::get('/user', [UserController::class, 'index'])->name('user.index');

