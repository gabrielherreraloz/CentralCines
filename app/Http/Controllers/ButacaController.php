<?php

namespace App\Http\Controllers;

use App\Models\Sesion;
use App\Models\Butaca;
use App\Models\Entrada;

class ButacaController extends Controller
{
    public function index($id)
    {
        $sesion = Sesion::findOrFail($id);

        $butacas = Butaca::where('id_sala', $sesion->id_sala)
        ->orderBy('fila')
        ->orderBy('asiento')
        ->get()
        ->groupBy('fila');

        $butacasOcupadasIds = Entrada::where('id_sesion', $id)
            ->pluck('id_butaca')
            ->toArray();

        return view('butacas', compact(
            'sesion',
            'butacas',
            'butacasOcupadasIds'
        ));
    }

    public function toggleButaca(Request $request)
    {
        $id = $request->id;
        $seleccionadas = session()->get('seleccionadas', []);

        if (in_array($id, $seleccionadas)) {
            $seleccionadas = array_diff($seleccionadas, [$id]);
        } else {
            $seleccionadas[] = $id;
        }

        session()->put('seleccionadas', $seleccionadas);

        return back();
    }
}