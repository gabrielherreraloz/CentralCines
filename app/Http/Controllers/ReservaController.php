<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;

class ReservaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'sesion_id' => 'required|integer',
            'butacas' => 'required'
        ]);

        $butacas = explode(',', $request->butacas);

        foreach ($butacas as $idButaca) {

            if (!\App\Models\Butaca::find($idButaca)) {
            continue;
    }
            Entrada::create([
                'id_usuario' => 1, // ⚠️ luego lo cambias a auth()->id()
                'id_sesion' => $request->sesion_id,
                'id_butaca' => $idButaca
            ]);
        }

        return redirect()->back()->with('success', 'Reserva realizada');
    }
}