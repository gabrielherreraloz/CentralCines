<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ButacaController;
use App\Http\Controllers\ReservaController;

Route::get('/', [PeliculaController::class, 'index']);
Route::get('/pelicula/{id}', [PeliculaController::class, 'detalles'])->name('pelicula.detalles');
Route::get('/contacto', fn () => view('contacto'))->name('contacto');
Route::get('/referencias', function () {
    $contenido = file_get_contents(base_path('Documentation/References.md'));
    return view('references', compact('contenido'));
})->name('references');
Route::get('/sesion/{id}/butacas', [ButacaController::class, 'index'])->name('butacas.sesion');
Route::post('/', [UsuarioController::class, 'inicio_sesion'])->name('usuario.iniciar_sesion');
Route::post('/logout', [UsuarioController::class, 'cerrar_sesion'])->name('usuario.cerrar_sesion');
Route::get('/ver_perfil', [UsuarioController::class, 'ver_perfil'])->name('perfil');
Route::post('/actualizar_perfil', [UsuarioController::class, 'actualizar_perfil'])->name('actualizar_perfil');
Route::post('/registro', [UsuarioController::class, 'registrar'])->name('usuario.registrar');
Route::middleware('auth')->group(function () {
    Route::post('/confirmar-compra', [ReservaController::class, 'confirmacion'])->name('confirmacion.compra');
    Route::post('/reservar', [ReservaController::class, 'store'])->name('reservar');
    Route::get('/mis-entradas', [ReservaController::class, 'misEntradas'])->name('mis.entradas');
});
Route::get('/login', function () {
    return redirect()->back()->with('error', 'Debes iniciar sesión para continuar');
})->name('login');
Route::middleware('auth')->group(function () {
    Route::get('/mis-entradas', [ReservaController::class, 'misEntradas'])->name('mis.entradas');

    Route::post('/cancelar-entrada/{id}', [ReservaController::class, 'cancelarEntrada'])
        ->name('entrada.cancelar');
});