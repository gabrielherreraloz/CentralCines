<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sala;
use App\Models\Butaca;

class ButacaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $salas = Sala::all();

        foreach ($salas as $sala) {
            // Creamos 5 filas (A, B, C, D, E)
            foreach (range('A', 'E') as $fila) {
                // 10 asientos por cada fila
                for ($numero = 1; $numero <= 10; $numero++) {
                    Butaca::create([
                        'fila' => $fila,
                        'asiento' => $numero
                    ]);
                }
            }
        }
    }
}
