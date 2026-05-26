<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    protected $table = 'sesions';

    public function pelicula(){
        return $this->belongsTo(Pelicula::class, 'id_pelicula');
    }

    public function sala(){
        return $this->belongsTo(Sala::class, 'id_sala');
    }
}
