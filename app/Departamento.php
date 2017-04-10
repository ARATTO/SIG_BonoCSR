<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamento';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nombre', 
        'codigo',
        /*FK*/
        'Pais_id',
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
    /**
    * Relaciones
    */
    
    public function paises()
    {
        return $this->belongsTo('App\Pais');
    }

    /**
    * Relaciones RETORNOS
    */
}
