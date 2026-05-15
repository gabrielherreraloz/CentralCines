<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $fillable = [
    'id_sesion',
    'id_butaca',
    'id_usuario'
];
}
