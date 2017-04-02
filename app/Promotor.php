<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotor extends Model
{
    protected $table = 'promotor';
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
        'salario',
        'dui',
        'nit',
        'fechaNacimiento',
        'genero',
        /*FK*/
        'ONG_id',
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
