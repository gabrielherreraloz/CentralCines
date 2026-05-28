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

        if($peliculas->isEmpty() || $salas->isEmpty()){
            return;
        }

        $fechaInicio = Carbon::create(2026, 5, 28, 0, 0, 0);
        $totalPeliculas = $peliculas->count();
        $peliculaGlobalIndex = 0; 
        $horasPases = [13, 16, 19, 22];

        // Asignamos sesiones para los 15 días próximos
        for($dia = 0; $dia < 15; $dia++){
            $fechaDia = $fechaInicio->copy()->addDays($dia);

            foreach($salas as $sala){
                foreach($horasPases as $hora){
                    $pelicula = $peliculas[$peliculaGlobalIndex % $totalPeliculas];
                    $horarioPase = $fechaDia->copy();

                    if($hora === 0){
                        $horarioPase->addDay()->setHour(0)->setMinute(0)->setSecond(0);
                    } 
                    else{
                        $horarioPase->setHour($hora)->setMinute(0)->setSecond(0);
                    }

                    Sesion::create(['id_pelicula' => $pelicula->id, 'id_sala' => $sala->id, 'horario' => $horarioPase->toDateTimeString()]);
                    $peliculaGlobalIndex++;
                }
            }
        }
    }
}