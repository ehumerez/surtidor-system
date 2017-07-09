<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class ClienteF extends Model
{
    protected $table='cliente_f';
    protected $primaryKey="CI_C";

    public $timestamps=false;

    protected $fillable = [
    	'PUNTOS_ACUMULADOS',
    	'ESTADO'  	

    ];

    protected $guarded = [

    ];
}
