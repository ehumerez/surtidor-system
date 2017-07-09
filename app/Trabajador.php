<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table='trabajador';
    protected $primaryKey="CI_T";

    public $timestamps=false;

    protected $fillable = [
    	'CI_T',
    	'DIRECCION',
    	'EMAIL',
    	'TIPO',
    	'FECHA_INICIO'   	

    ];

    protected $guarded = [

    ];
}
