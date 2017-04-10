<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipio';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'codigo', 
        'nombre',
        /*FK*/
        'Departamento_id',
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
    
    public function departamentos()
    {
        return $this->belongsTo('App\Departamento');
    }

    /**
    * Relaciones RETORNOS
    */
    public function canton()
    {
        return $this->hasMany('App\Canton');
    }
    public function centroDeSalud()
    {
        return $this->hasMany('App\CentroDeSalud');
    }
}
