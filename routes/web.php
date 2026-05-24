<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ButacaController;
use App\Http\Controllers\ReservaController;

Route::get('/', [PeliculaController::class, 'index']);
Route::get('/pelicula/{id}', [PeliculaController::class, 'detalles'])->name('pelicula.detalles');

Route::get('/contacto', function (){
    return view('contacto'); })->name('contacto');

Route::get('/referencias', function (){
    $contenido = file_get_contents(base_path('Documentation/References.md'));
    return view('references', compact('contenido'));})->name('references');

Route::get('/sesion/{id}/butacas',[ButacaController::class, 'index'])->name('butacas.sesion');

Route::post('/', [UsuarioController::class, 'inicio_sesion'])->name('usuario.iniciar_sesion');
Route::post('/logout', [UsuarioController::class, 'cerrar_sesion'])->name('usuario.cerrar_sesion');
Route::get('/ver_perfil',[UsuarioController::class, 'ver_perfil'])->name('perfil');
Route::post('/actualizar_perfil',[UsuarioController::class, 'actualizar_perfil'])->name('actualizar_perfil');
Route::post('/registro', [UsuarioController::class, 'registrar'])->name('usuario.registrar');

Route::post('/reservar', [ReservaController::class, 'store'])->name('reservar');
Route::post('/confirmar-compra',[ReservaController::class, 'confirmacion'])->name('confirmacion.compra');
Route::post('/toggle-butaca', [ReservaController::class, 'toggleButaca'])->name('butaca.toggle');

