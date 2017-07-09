<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table='turno';
    protected $primaryKey="CODIGO_T";

    public $timestamps=false;

    protected $fillable = [
    	'DESCRIPCION',
    	'HORA_ENTRADA',
    	'HORA_SALIDA' 	
    ];

    protected $guarded = [

    ];
}
