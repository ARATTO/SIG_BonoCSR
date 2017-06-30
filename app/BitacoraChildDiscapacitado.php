<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitacoraChildDiscapacitado extends Model
{
    protected $table = 'bitacorachilddiscapacitado';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'descripcion', 
        /*FK*/
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
        return $this->hasMany('App\Bono','BitacoraChildDiscapacitado_id')->whereRAW("DATE_FORMAT('{$fechaInicio}', '%y-%m-%d') >= fechaInicioPeriodo and  DATE_FORMAT('{$fechaFin}', '%y-%m-%d') <= fechaFinPeriodo")->get();
    }
}
