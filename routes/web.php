<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LokalController;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('index',[
        "menu"=>'home'
    ]);
})->name('home');

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
//lokal
Route ::get('lokal',[
    LokalController::class,'index'
])->name('lokal.index');

Route ::get('lokal/create',[
    LokalController::class,'create'
])->name('lokal.create');

Route ::post('lokal',[lokalController::class,'store'
])->name('lokal.store');
//siswa
Route ::get('siswa',[
    SiswaController::class,'index'
])->name('siswa.index');
