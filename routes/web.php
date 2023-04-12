<?php

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

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth'])->group( function() {

    Route::resource('/dashboard', DashboardController::class)->parameter('dashboard', 'id');
    Route::resource('/pegawai', PegawaiController::class)->parameter('pegawai', 'id');
    Route::resource('/film', FilmController::class)->parameter('film', 'id');

} );
