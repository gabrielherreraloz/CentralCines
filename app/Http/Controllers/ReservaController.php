<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sesion;
use App\Models\Entrada;
use App\Models\Butaca;

class ReservaController extends Controller
{
    // Página de confirmación
    public function confirmacion(Request $request)
    {
        // VALIDACIÓN
        $request->validate([
            'butacas' => 'required'
        ], [
            'butacas.required' => 'Debes seleccionar al menos una butaca.'
        ]);

        // Convertir string a array
        $ids = explode(',', $request->butacas);

        // Obtener butacas
        $butacas = Butaca::whereIn('id', $ids)->get();

        // Obtener sesión + película
        $sesion = Sesion::with('pelicula')
            ->findOrFail($request->sesion_id);

        // Calcular total
        $total = count($butacas) * 8;

        // Vista
        return view('confirmacion', [
            'butacas' => $butacas,
            'sesion' => $sesion,
            'total' => $total
        ]);
    }

    // Guardar compra
    public function store(Request $request)
    {
        // VALIDACIÓN
        $request->validate([
            'butacas' => 'required'
        ], [
            'butacas.required' => 'No se ha seleccionado ninguna butaca.'
        ]);

        // Convertir string a array
        $ids = explode(',', $request->butacas);

        foreach ($ids as $idButaca) {

            // Evitar duplicados
            $existe = Entrada::where('id_sesion', $request->sesion_id)
                ->where('id_butaca', $idButaca)
                ->exists();

            if ($existe) {
                continue;
            }

            // Crear entrada
            Entrada::create([
                'id_usuario' => null, // luego auth()->id()
                'id_sesion' => $request->sesion_id,
                'id_butaca' => $idButaca
            ]);
        }

        return redirect()
            ->route('butacas.sesion', $request->sesion_id)
            ->with('success', 'Compra realizada correctamente');
    }

    
}