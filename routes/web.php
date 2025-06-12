<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GuiaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\TransporteController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class, 'index'])->name('panel.index')->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('logouth', [LogoutController::class, 'logout'])->name('logout');

Route::resource('clientes', ClienteController::class)->middleware('auth');
Route::resource('guias', GuiaController::class)->middleware('auth');
Route::resource('paquetes', PaqueteController::class)->middleware('auth');
Route::resource('transportes', TransporteController::class)->middleware('auth');
Route::resource('reservas', ReservaController::class)->middleware('auth');
