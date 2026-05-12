<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Models\Sesion;
use App\Models\Butaca;
use App\Models\Entrada;
use Erus\Parsedown;

Route::get('/', [PeliculaController::class, 'index']);
Route::get('/pelicula/{id}', [PeliculaController::class, 'detalles'])->name('pelicula.detalles');
Route::get('/contacto', function () {return view('contacto'); })->name('contacto');
Route::get('/sesion/{id}/butacas', function ($id) {
    $sesion = Sesion::findOrFail($id);
    $butacas = Butaca::where('id_sala', $sesion->id_sala)->get();
    $butacasOcupadasIds = Entrada::where('id_sesion', $id)->pluck('id_butaca')->toArray();
    return view('butacas', compact('sesion', 'butacas', 'butacasOcupadasIds'));
})->name('butacas.sesion');
Route::get('/referencias', function () {
    $contenido = file_get_contents(base_path('Documentation/References.md'));
    return view('references', compact('contenido'));
})->name('references');
