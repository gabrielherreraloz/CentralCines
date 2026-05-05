<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;

Route::get('/', [PeliculaController::class, 'index']);
Route::get('/pelicula/{id}', [PeliculaController::class, 'detalles'])->name('pelicula.detalles');