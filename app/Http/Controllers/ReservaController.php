<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sesion;
use App\Models\Entrada;
use App\Models\Butaca;

class ReservaController extends Controller
{
    // Página confirmación
    public function confirmacion(Request $request)
    {
        $ids = explode(',', $request->butacas);

        $butacas = Butaca::whereIn('id', $ids)->get();

        $sesion = Sesion::with('pelicula')->findOrFail($request->sesion_id);

        $total = count($butacas) * 8;

        return view('confirmacion', [
            'butacas' => $butacas,
            'sesion_id' => $request->sesion_id,
            'sesion' => $sesion,
            'total' => $total
        ]);
    }

    // Guardar compra
    public function store(Request $request)
    {
        $ids = explode(',', $request->butacas);

        foreach ($ids as $idButaca) {

            Entrada::create([
                'id_usuario' => null, //cambiar a auth()->id()
                'id_sesion' => $request->sesion_id,
                'id_butaca' => $idButaca
            ]);
        }

        return redirect()
            ->route('butacas.sesion', $request->sesion_id)
            ->with('success', 'Compra realizada');
    }
}