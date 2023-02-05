<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/tugas-akhir',[App\Http\Controllers\TugasAkhirController::class, 'store'])->middleware('guest');
Route::get('/tugas-akhir',[App\Http\Controllers\Dosen\TugasAkhirController::class, 'showData']);
Route::get('/mahasiswa',[App\Http\Controllers\Admin\MahasiswaController::class, 'showData']);
Route::get('/dosen',[App\Http\Controllers\Admin\DosenController::class, 'showData']);
Route::get('/users',[App\Http\Controllers\Admin\UsersController::class, 'showData']);
