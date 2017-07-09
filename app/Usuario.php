<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table='usuario';
    protected $primaryKey="USUARIO";

    public $timestamps=false;

    protected $fillable = [
    	'USUARIO',
    	'CONTRASENA',
    	'CI_NIT_PERSONA',
    	'CODIGO_GRUPO'	

    ];

    protected $guarded = [

    ];
}
