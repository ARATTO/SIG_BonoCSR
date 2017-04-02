<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titular extends Model
{
    protected $table = 'titular';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'codigo', 
        'nombre',
        'apellido',
        'dui',
        'sabeLeer',
        'sabeEscribir',
        'fechaNacimiento',
        'genero',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
    * Eliminar timestamps del modelo
    */
    public $timestamps = false;
}
