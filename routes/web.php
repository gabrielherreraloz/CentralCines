<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\ButacaController;
use App\Http\Controllers\ReservaController;
use App\Models\Sesion;
use App\Models\Butaca;
use App\Models\Entrada;
use Erus\Parsedown;

Route::get('/', [PeliculaController::class, 'index']);
Route::get('/pelicula/{id}', [PeliculaController::class, 'detalles'])->name('pelicula.detalles');
Route::get('/contacto', function () {return view('contacto'); })->name('contacto');
Route::get('/sesion/{id}/butacas',
    [ButacaController::class, 'index']
)->name('butacas.sesion');
Route::post('/reservar', [ReservaController::class, 'store'])
    ->name('reservar');
Route::get('/referencias', function () {
    $contenido = file_get_contents(base_path('Documentation/References.md'));
    return view('references', compact('contenido'));
})->name('references');
