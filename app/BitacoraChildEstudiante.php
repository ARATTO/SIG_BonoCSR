<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitacoraChildEstudiante extends Model
{
    protected $table = 'bitacorachildestudiante';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'inasistenciaInjustificada', 
        'motivoPorInasistencias',
        'dineroInvertido',
        /*FK*/
        'Esscuela_id',
        'Promotor_id',
        'Beneficiario_id',
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
