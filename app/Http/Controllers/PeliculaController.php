<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Sesion;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function index()
    {
        $peliculas = Pelicula::all();
        return view('index', compact('peliculas'));
    }

    public function detalles(Request $request, $id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $fecha = $request->query('fecha_sesion');
        $sesions = Sesion::where('id_pelicula', $id)->whereDate('horario', $fecha)->orderBy('horario', 'asc')->get();

        return view('detalles', compact('pelicula', 'sesions', 'fecha'));
    }
}