<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    protected $table = 'beneficiario';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nombre', 
        'apellidos',
        'nombreMadre',
        'nombrePadre',
        'nombreEncargado',
        'fechaNacimiento',
        'codigo',
        'dineroInvertido',
        'genero',
        'descripcionDiscapacidad',
        /*FK*/
        'Canton_id',
        'Titular_id',
        'TipoEstado_id',
        'TipoBono_id',
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
    public function titulares()
    {
        return $this->belongsTo('App\Titular');
    }
    public function tipoEstados()
    {
        return $this->belongsTo('App\TipoEstado');
    }
    public function tipoBonos()
    {
        return $this->belongsTo('App\TipoBono');
    }
    /**
    * Relaciones RETORNOS
    */
    public function bitacoraAdultoMayor()
    {
        return $this->hasMany('App\BitacoraAdultoMayor','Beneficiario_id');
    }
    public function bitacoraChildDiscapacitado()
    {
        return $this->hasMany('App\BitacoraChildDiscapacitado','Beneficiario_id');
    }
    public function bitacoraChildEstudiante()
    {
        return $this->hasMany('App\BitacoraChildEstudiante','Beneficiario_id');
    }
    public function bitacoraChildMenor()
    {
        return $this->hasMany('App\BitacoraChildMenor','Beneficiario_id');
    }
    public function bitacoraChildEmbarazada()
    {
        return $this->hasMany('App\BitacoraEmbarazada','Beneficiario_id');
    }
}
