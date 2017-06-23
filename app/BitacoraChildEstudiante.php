<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bono;

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
        'Escuela_id',
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
    public function escuelas()
    {
        return $this->belongsTo('App\Escuela');
    }
    public function beneficiarios()
    {
        return $this->belongsTo('App\Beneficiario');
    }
    public function promotores()
    {
        return $this->belongsTo('App\Promotor');
    }

    /**
    * Relaciones RETORNOS
    */
    public function bono($fechaInicio, $fechaFin)
    {
        $bono = $this->hasMany('App\Bono','BitacoraChildEstudiante_id')->whereRAW("DATE_FORMAT('{$fechaInicio}', '%y-%m-%d') >= fechaInicioPeriodo and  DATE_FORMAT('{$fechaFin}', '%y-%m-%d') <= fechaFinPeriodo")->get();

        return $bono;
    }

    
}
