<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ONG extends Model
{
    protected $table = 'ong';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'descripcion',
        'detalleDireccion',
        'mision',
        'vision',
        /*FK*/
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
    public function promotor()
    {
        return $this->hasMany('App\Promotor');
    }
    public function user()
    {
        return $this->hasMany('App\User');
    }
}
