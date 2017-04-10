<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentroDeSalud extends Model
{
    protected $table = 'centrodesalud';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nombre', 
        'nivel',
        'codigo',
        'detalleDireccion',
        /*FK*/
        'Municipio_id',
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
    
    public function municipios()
    {
        return $this->belongsTo('App\Municipio');
    }

    /**
    * Relaciones RETORNOS
    */
}
