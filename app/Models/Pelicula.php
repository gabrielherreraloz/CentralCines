<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen_url',
        'duracion'
    ];

    public function sesiones(){
        return $this->hasMany(Sesion::class, 'id_pelicula');
    }
}
