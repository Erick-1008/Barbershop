<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservacionesController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VistaReservacionesController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Definir recursos
Route::resource('reservaciones', ReservacionesController::class);
Route::resource('ventas', VentasController::class);
Route::resource('compras', ComprasController::class);
Route::resource('clientes', ClientesController::class);
Route::resource('vistareservaciones', VistaReservacionesController::class); 

