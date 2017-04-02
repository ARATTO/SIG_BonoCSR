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
}
