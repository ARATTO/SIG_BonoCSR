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
        'Promoter_id',
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
}
