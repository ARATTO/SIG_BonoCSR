<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitacoraAdultoMayor extends Model
{
    protected $table = 'bitacoraadultomayor';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'descripcion', 
        /*FK*/
        'Beneficiario_id',
        'Promotor_id',
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
        return $this->belongsTo('App\Promotor');
    }
    

    /**
    * Relaciones RETORNOS
    */
    public function bono($fechaInicio,$fechaFin)
    {
        return $this->hasMany('App\Bono','BitacoraAdultoMayor_id')->whereRAW("DATE_FORMAT('{$fechaInicio}', '%y-%m-%d') >= fechaInicioPeriodo and  DATE_FORMAT('{$fechaFin}', '%y-%m-%d') <= fechaFinPeriodo")->get();
    }
}
