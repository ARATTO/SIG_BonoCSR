<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotor extends Model
{
    protected $table = 'promotor';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'codigo', 
        'nombre',
        'apellido',
        'salario',
        'dui',
        'nit',
        'fechaNacimiento',
        'genero',
        /*FK*/
        'ONG_id',
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
    
    public function ong()
    {
        return $this->belongsTo('App\ONG');
    }

    /**
    * Relaciones RETORNOS
    */
    public function bitacoraAdultoMayor()
    {
        return $this->hasMany('App\BitacoraAdultoMayor');
    }
    public function bitacoraChildDiscapacitado()
    {
        return $this->hasMany('App\BitacoraChildDiscapacitado');
    }
    public function bitacoraChildEstudiante()
    {
        return $this->hasMany('App\BitacoraChildEstudiante');
    }
    public function bitacoraChildMenor()
    {
        return $this->hasMany('App\BitacoraChildMenor');
    }
    public function bitacoraChildEmbarazada()
    {
        return $this->hasMany('App\BitacoraEmbarazada');
    }
}
