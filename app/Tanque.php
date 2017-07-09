<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class Tanque extends Model
{
    protected $table='tanque';
    protected $primaryKey="CODIGO_T";

    public $timestamps=false;

    protected $fillable = [

    	'CAPACIDAD_DISPONIBLE',
    	'CAPACIDAD_MINIMA',
    	'CAPACIDAD_MAXIMA',
    	'CODIGO_COMBUSTIBLE',
    	'ESTADO'

    ];

    protected $guarded = [

    ];
}
