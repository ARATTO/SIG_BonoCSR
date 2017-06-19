<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    protected $table = 'canton';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'codigo', 
        'nombre',
        'esExtremaPobreza',
        /*FK*/
        'Municipio_id',
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
    
    public function municipios()
    {
        return $this->belongsTo('App\Municipio');
    }

    /**
    * Relaciones RETORNOS
    */

    public function beneficiario()
    {
        return $this->hasMany('App\Beneficiario');
    }
    public function escuela()
    {
        return $this->hasMany('App\Escuela');
    }


        public static function cantones($id){
        return Canton::where('Municipio_id',$id)->get();
    }
}
