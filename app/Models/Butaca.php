<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Butaca extends Model
{
    protected $table = 'butacas';

    protected $fillable = [
        'id_sala',
        'fila',
        'asiento'
    ];
}
