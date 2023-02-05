<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth','dosen']], function () {
Route::get('/dosen/dashboard', function () {
    $data['users']=\App\Models\User::where('role','!=','admin')->count();
    $data['mahasiswa']=\App\Models\Mahasiswa::count();
    $data['dosen']=\App\Models\Dosen::count();
    return view('theme.dosen.dashboard',$data);
})->name('dosen.dashboard');

Route::resource('/dosen/tugas-akhir', \App\Http\Controllers\Dosen\TugasAkhirController::class)->middleware(['auth','dosen']);
Route::get('/dosen/file-manager', function () {
    return view('theme.dosen.file-manager');
})->name('dosen.file-manager');
});

// Route::resource('/dosen/tugas-akhir', \App\Http\Controllers\Dosen\TugasAkhirController::class)->middleware(['auth','dosen'])->except(['show']);
