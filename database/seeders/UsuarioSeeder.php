<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'nombre' => 'nombre',
            'apellidos' => 'apellidos',
            'email' => 'usuario@email.com',
            'admin' => false,
            'password' => Hash::make('contraseña')
        ]);
        Usuario::create([
            'nombre' => 'admin',
            'apellidos' => 'apellidos',
            'email' => 'admin@email.com',
            'admin' => true,
            'password' => Hash::make('contraseña')
        ]);
    }
}
