<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('index');
});

Route::get('login', function (){
    return view('login');
});

Route::get('dashboard', function (){
    return view('dashboard',[
        "menu"=>'dashboard'
    ]);
})->name('dashboard');
