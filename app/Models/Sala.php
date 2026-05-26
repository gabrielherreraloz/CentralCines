<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table = 'salas';
    protected $fillable = [
        'nombre'
    ];

    public function sesiones(){
        return $this->hasMany(Sesion::class, 'id_sala');
    }
}