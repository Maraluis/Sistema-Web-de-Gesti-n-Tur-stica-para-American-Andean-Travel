<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GuiaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\RestauranteController;
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
Route::resource('hoteles', HotelController::class)->middleware('auth');
Route::resource('restaurantes', RestauranteController::class)->middleware('auth');

// Rutas para reportes PDF
Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index')->middleware('auth');
// Route::get('/reportes/cliente/{id}', [ReporteController::class, 'reporteCliente'])->name('reportes.cliente')->middleware('auth'); // Deshabilitado
Route::get('/reportes/clientes', [ReporteController::class, 'reporteClientes'])->name('reportes.clientes')->middleware('auth');
Route::get('/reportes/todas-reservas', [ReporteController::class, 'reporteTodasReservas'])->name('reportes.todas.reservas')->middleware('auth');
Route::get('/reportes/diario', [ReporteController::class, 'reporteDiario'])->name('reportes.diario')->middleware('auth');
Route::get('/reportes/reservas', [ReporteController::class, 'reporteReservas'])->name('reportes.reservas')->middleware('auth');
Route::get('/reportes/ingresos', [ReporteController::class, 'reporteIngresos'])->name('reportes.ingresos')->middleware('auth');

// Rutas AJAX para disponibilidad en tiempo real
Route::get('/disponibilidad/guias', [ReservaController::class, 'guiasDisponibles'])->name('disponibilidad.guias')->middleware('auth');
Route::get('/disponibilidad/transportes', [ReservaController::class, 'transportesDisponibles'])->name('disponibilidad.transportes')->middleware('auth');
