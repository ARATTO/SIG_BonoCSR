<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoBono extends Model
{
    protected $table = 'tipobono';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'codigo', 
        'nombre',
        'cantidad',
        'descripcion',
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
    
    

    /**
    * Relaciones RETORNOS
    */
    public function beneficiario()
    {
        return $this->hasMany('App\Beneficiario');
    }
}
