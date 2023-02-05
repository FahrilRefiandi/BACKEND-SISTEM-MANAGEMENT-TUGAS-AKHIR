<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// group middleware
Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/admin/dashboard', function () {
        $data['users']=\App\Models\User::where('role','!=','admin')->count();
        $data['mahasiswa']=\App\Models\Mahasiswa::count();
        $data['dosen']=\App\Models\Dosen::count();
        return view('theme.admin.dashboard',$data);
    })->name('admin.dashboard');

    Route::resource('/admin/mahasiswa', App\Http\Controllers\Admin\MahasiswaController::class);
    Route::delete("/admin/mahasiswa/destroy", [App\Http\Controllers\Admin\MahasiswaController::class, "destroy"])->name("mahasiswa.destroy");

    Route::resource('/admin/dosen', App\Http\Controllers\Admin\DosenController::class);
    Route::delete("/admin/dosen/destroy", [App\Http\Controllers\Admin\DosenController::class, "destroy"])->name("dosen.destroy");

    Route::resource('/admin/users', App\Http\Controllers\Admin\UsersController::class);

});


// ->middleware(['auth','admin'])
