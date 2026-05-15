<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelicula;
use App\Models\Sala;
use App\Models\Sesion;
use Illuminate\Support\Carbon;

class SesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peliculas = Pelicula::all();
        $salas = Sala::all();

        foreach ($peliculas as $pelicula) {
            
            $fechaInicio = Carbon::create(2026, 5, 1, 16, 0, 0);

            for ($dia = 1; $dia <= 15; $dia++) {

                foreach ($salas as $sala) {

                    $horarioPase = $fechaInicio->copy()->addDays($dia);

                    for ($numero = 1; $numero <= 3; $numero++) {
                        Sesion::create(['id_pelicula' => $pelicula->id, 'id_sala' => $sala->id, 'horario' => $horarioPase->toDateTimeString()]);
                        $horarioPase->addHours(3);
                    }
                }
            }
        }
    }
}
