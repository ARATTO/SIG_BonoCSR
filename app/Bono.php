<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bono extends Model
{
    protected $table = 'bono';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'dineroAcumulado', 
        'fechaInicioPeriodo',
        'fechaFinPeriodo',
        'periodoFinalizo',
        /*FK*/
        'BitacoraEmbarazada_id',
        'BitacoraChildMenor_id',
        'BitacoraAdultoMayor_id',
        'BitacoraChildDiscapacitado_id',
        'BitacoraChildEstudiante_id',
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
