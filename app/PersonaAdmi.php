<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class PersonaAdmi extends Model
{
    protected $table='persona';
    protected $primaryKey="CI_NIT_P";

    public $timestamps=false;

    protected $fillable = [
    	'CI_NIT_P',
    	'NOMBRE',
    	'APELLIDO_PATERNO',
    	'APELLIDO_MATERNO',
    	'TIPO_P'   	

    ];

    protected $guarded = [

    ];
}
