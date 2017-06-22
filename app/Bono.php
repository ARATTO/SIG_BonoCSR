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
    /**
    * Relaciones
    */
    
    public function bitacorasEmbarazadas()
    {
        return $this->belongsTo('App\BitacoraEmbarazada');
    }
    public function bitacorasChildMenores()
    {
        return $this->belongsTo('App\BitacoraChildMenor');
    }
    public function bitacorasAdultoMayores()
    {
        return $this->belongsTo('App\BitacoraAdultoMayor');
    }
    public function bitacorasChildDiscapacitados()
    {
        return $this->belongsTo('App\BitacoraChildDiscapacitado');
    }
    public function bitacorasChildEstudiantes()
    {
        return $this->belongsTo('App\BitacoraChildEstudiante');
    }

    /**
    * Relaciones RETORNOS
    */
}
