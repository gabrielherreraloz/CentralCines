<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model{
    protected $fillable = [
        'id_sesion',
        'id_butaca',
        'id_usuario'
    ];
    public function sesion(){
        return $this->belongsTo(Sesion::class, 'id_sesion');
    }
    public function butaca(){
        return $this->belongsTo(Butaca::class, 'id_butaca');
    }
}