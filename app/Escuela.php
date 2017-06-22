<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $table = 'escuela';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nombre', 
        'codigo',
        'detalleDireccion',
        /*FK*/
        'Canton_id',
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
    
    public function cantones()
    {
        return $this->belongsTo('App\Canton');
    }

    /**
    * Relaciones RETORNOS
    */
    public function bitacoraChildEstudiante()
    {
        return $this->hasMany('App\BitacoraChildEstudiante');
    }
}
