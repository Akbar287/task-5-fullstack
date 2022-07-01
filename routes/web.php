<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['reset'=>false, 'confirm' => false, 'verify' => false]);

Route::get('/home', )->name('home');

Route::middleware(['auth'])->group(function ($route) {
    //dashboard
    $route->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    $route->get('/penilaian', [\App\Http\Controllers\PenilaianController::class, 'hitung'])->name('penilaian');

    //peserta
    $route->get('/file', [\App\Http\Controllers\FileController::class, 'index'])->name('file');
    $route->get('/file/{jenis}/{id}', [\App\Http\Controllers\FileController::class, 'unduh'])->name('file');
    $route->post('/file', [\App\Http\Controllers\FileController::class, 'store'])->name('file');
    $route->get('/hasil', [\App\Http\Controllers\LowonganController::class, 'index'])->name('hasil');

    // admin
    $route->get('/user', [\App\Http\Controllers\UserController::class, 'index'])->name('user');
    $route->get('/user/create', [\App\Http\Controllers\UserController::class, 'create'])->name('user');
    $route->post('/user', [\App\Http\Controllers\UserController::class, 'store'])->name('user');
    $route->get('/user/{id}', [\App\Http\Controllers\UserController::class, 'edit'])->name('user');
    $route->put('/user/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('user');
    $route->delete('/user/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('user');
    
    //hrd
    $route->get('/ranking', [\App\Http\Controllers\PenilaianController::class, 'ranking'])->name('ranking');

    $route->get('/input-nilai', [\App\Http\Controllers\PenilaianController::class, 'index'])->name('penilaian');
    $route->get('/input-nilai/create', [\App\Http\Controllers\PenilaianController::class, 'create'])->name('penilaian');
    $route->post('/input-nilai', [\App\Http\Controllers\PenilaianController::class, 'store'])->name('penilaian');
    $route->get('/input-nilai/{id}/edit', [\App\Http\Controllers\PenilaianController::class, 'edit'])->name('penilaian');
    $route->put('/input-nilai/{id}', [\App\Http\Controllers\PenilaianController::class, 'update'])->name('penilaian');
    $route->delete('/input-nilai/{id}', [\App\Http\Controllers\PenilaianController::class, 'destroy'])->name('penilaian');

    $route->get('/peserta', [\App\Http\Controllers\FileController::class, 'peserta'])->name('peserta');
});
