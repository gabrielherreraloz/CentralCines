<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $table = 'entradas';

    /**
     * Campos que se pueden asignar en masa
     */
    protected $fillable = [
        'id_usuario',
        'id_sesion',
        'id_butaca',
    ];

    /**
     * Relación: la entrada pertenece a una sesión
     */
    public function sesion()
    {
        return $this->belongsTo(Sesion::class, 'id_sesion');
    }

    /**
     * Relación: la entrada pertenece a una butaca
     */
    public function butaca()
    {
        return $this->belongsTo(Butaca::class, 'id_butaca');
    }

    /**
     * Relación: la entrada pertenece a un usuario
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}