<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pelicula;
use App\Models\Sala;
use App\Models\Sesion;

class SesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peli = Pelicula::first();
        $sala = Sala::first();

        Sesion::create([
            'id_pelicula' => $peli->id,
            'id_sala' => $sala->id,
            'horario' => '2026-05-01 20:00:00'
        ]);
    }
}
