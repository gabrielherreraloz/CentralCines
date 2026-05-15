<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Butaca;

class ButacaSeeder extends Seeder
{
    public function run(): void
    {
        for ($f = 1; $f <= 5; $f++) {
            for ($a = 1; $a <= 10; $a++) {
                Butaca::create([
                    'id_sala' => 1,
                    'fila' => $f,
                    'asiento' => $a
                ]);
            }
        }
    }
}