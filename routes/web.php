<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Models\Sesion;
use App\Models\Butaca;
use App\Models\Entrada;

Route::get('/', [PeliculaController::class, 'index']);
Route::get('/pelicula/{id}', [PeliculaController::class, 'detalles'])->name('pelicula.detalles');
Route::get('/contacto', function () {return view('contacto'); })->name('contacto');

Route::get('/sesion/{id}/butacas', function ($id) {
    $sesion = Sesion::findOrFail($id);

    // 1. Obtenemos todas las butacas de la sala de esta sesión
    $butacas = Butaca::where('id_sala', $sesion->id_sala)->get();

    // 2. Obtenemos los IDs de las butacas que ya tienen entrada para ESTA sesión
    $butacasOcupadasIds = Entrada::where('id_sesion', $id)->pluck('id_butaca')->toArray();

    return view('butacas', compact('sesion', 'butacas', 'butacasOcupadasIds'));
})->name('butacas.sesion');