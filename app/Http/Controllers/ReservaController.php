<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sesion;
use App\Models\Entrada;
use App\Models\Butaca;
use App\Models\Pelicula;

class ReservaController extends Controller{
    public function confirmacion(Request $request){
        $request->validate(['butacas' => 'required']);
        $ids = $request->butacas;

        if (is_string($ids)) {
            $ids = explode(',', $ids);
        }

        $ids = array_filter($ids);
        $butacas = Butaca::whereIn('id', $ids)->get();
        $sesion = Sesion::with('pelicula')->findOrFail($request->sesion_id);

        return view('confirmacion', ['butacas' => $butacas,'sesion' => $sesion,'total' => count($butacas) * 8]);
    }

    public function store(Request $request){
        if (!auth()->check()) {
            return redirect()->route('butacas.sesion', $request->sesion_id)->with('error', 'Debes iniciar sesión para reservar');
        }

        $request->validate(['sesion_id' => 'required|exists:sesions,id','butacas' => 'required']);
        $ids = $request->butacas;

        if (is_string($ids)) {
            $ids = explode(',', $ids);
        }
        $ids = array_filter($ids);

        foreach ($ids as $idButaca) {
            $existe = Entrada::where('id_sesion', $request->sesion_id)->where('id_butaca', $idButaca)->exists();
            if ($existe) continue;
            Entrada::create(['id_usuario' => auth()->id(),'id_sesion' => $request->sesion_id,'id_butaca' => $idButaca]);
        }

        $peliculas = Pelicula::all();
        return redirect('/')->with('status', 'La reserva se ha efectuado correctamente.');
    }

    public function misEntradas(){
        $entradas = Entrada::with(['sesion.pelicula','sesion.sala','butaca'])->where('id_usuario', auth()->id())->get();
        return view('mis-entradas', compact('entradas'));
    }

    public function cancelarEntrada($id){
        $entrada = Entrada::where('id', $id)->where('id_usuario', auth()->id())->firstOrFail();
        $sesionId = $entrada->id_sesion;
        $entrada->delete();
        return redirect()->route('mis.entradas')->with('success', 'Entrada cancelada correctamente');
    }
}

