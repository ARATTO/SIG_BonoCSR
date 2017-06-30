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
    /**
    * Relaciones
    */
    
    public function centrosDeSalud()
    {
        return $this->belongsTo('App\CentroDeSalud');
    }
    public function beneficiarios()
    {
        return $this->belongsTo('App\Beneficiario');
    }
    public function promotores()
    {
        return $this->belongsTo('App\Promotor','Promotor_id')->get();
    }

    /**
    * Relaciones RETORNOS
    */
    public function bono($fechaInicio,$fechaFin)
    {
        return $this->hasMany('App\Bono','BitacoraEmbarazada_id')->whereRAW("DATE_FORMAT('{$fechaInicio}', '%y-%m-%d') >= fechaInicioPeriodo and  DATE_FORMAT('{$fechaFin}', '%y-%m-%d') <= fechaFinPeriodo")->get();
    }
}
