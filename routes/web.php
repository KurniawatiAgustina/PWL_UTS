<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PegawaiController;
use App\Models\PegawaiModel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/logout', [LoginController::class, 'logout']);

Auth::routes();
Route::middleware(['auth'])->group(function(){

    Route::redirect('/', '/dashboard', 301)->name('dashboard');
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/pegawai', PegawaiController::class)->parameter('pegawai', 'id');
    Route::resource('/film', FilmController::class)->parameter('film', 'id');
});
