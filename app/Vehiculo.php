<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table='vehiculo';
    protected $primaryKey="PLACA";

    public $timestamps=false;

    protected $fillable = [

    	'PLACA',
    	'COLOR',
    	'SERVICIO',
    	'IMAGEN',
    	'CONDICION',
    	'CI_CLIENTE'
    	

    ];

    protected $guarded = [

    ];
}
