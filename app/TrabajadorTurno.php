<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class TrabajadorTurno extends Model
{
    protected $table='trabajador_turno';
    protected $primaryKey="ID_TT";

    public $timestamps=false;

    protected $fillable = [
    	'CI_TRABAJADOR',
    	'CODIGO_TURNO' 	

    ];

    protected $guarded = [

    ];
}
