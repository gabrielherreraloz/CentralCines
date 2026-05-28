<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Sesion;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function index(){
        $peliculas = Pelicula::all();
        return view('index', compact('peliculas'));
    }

    public function administracion(){
        $peliculas = Pelicula::with('sesiones')->get();
        $salas = \App\Models\Sala::all();
        return view('administracion', compact('peliculas', 'salas'));
    }

    public function detalles(Request $request, $id){
        $pelicula = Pelicula::findOrFail($id);
        $fecha = $request->query('fecha_sesion');
        $sesions_sala = Sesion::where('id_pelicula', $id)->whereDate('horario', $fecha)->orderBy('horario', 'asc')->get()->groupBy('id_sala');
        return view('detalles', compact('pelicula', 'sesions_sala', 'fecha'));
    }

    public function eliminar($id){
        $pelicula = \App\Models\Pelicula::findOrFail($id);
        $pelicula->delete();
        return redirect()->back()->with('status', 'La película se ha eliminado correctamente.');
    }

    public function modificar(Request $request, $id){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen_url' => 'nullable|string',
            'duracion' => 'required|integer',
        ]);

        $pelicula = Pelicula::findOrFail($id);
        $pelicula->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen_url' => $request->imagen_url,
            'duracion' => $request->duracion,
        ]);

        return redirect()->back()->with('status', 'Los datos de la película se han modificado correctamente.');
    }

    public function aniadir(Request $request){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen_url' => 'nullable|string',
            'duracion' => 'required|integer',
        ]);

        Pelicula::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen_url' => $request->imagen_url,
            'duracion' => $request->duracion,
        ]);

        return redirect()->back()->with('status', 'La película se ha añadido correctamente a la cartelera');
    }

    public function crearsesion(Request $request){
        $request->validate([
            'id_pelicula' => 'required|exists:peliculas,id',
            'id_sala' => 'required|exists:salas,id',
            'horario' => 'required|date|after:now', 
        ], [
            'horario.after' => 'No puedes programar una sesión en una fecha u hora que ya ha pasado.',
        ]);
    
        Sesion::create($request->only(['id_pelicula', 'id_sala', 'horario']));
        return redirect()->back()->with('status', 'Nueva sesión añadida con éxito');
    }

    public function eliminarsesion($id){
        $sesion = Sesion::findOrFail($id);
        $sesion->delete();
        return redirect()->back()->with('status', 'La sesión ha sido eliminada correctamente.');
    }
}