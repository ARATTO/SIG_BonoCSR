<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitacoraEmbarazada extends Model
{
    protected $table = 'bitacoraembarazada';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'fechaControl', 
        'descripcion',
        'asistioControl',
        'motivoPorNoAsistir',
        'dineroInvertido',
        /*FK*/
        'CentroDeSalud_id',
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
