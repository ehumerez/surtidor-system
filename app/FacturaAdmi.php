<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class FacturaAdmi extends Model
{
    protected $table='factura';
    protected $primaryKey='CODIGO_F';

    public $timestamps=false;

    protected $fillable=[

    	'CANTIDAD_COMBUSTIBLE',
    	'FECHA',
    	'MONTO_DINERO',   	
    	'DETALLE',
    	'HORA',
    	'CI_PERSONA',
    	'CI_TRABAJADOR',
    	'PLACA_V',
    	'ID_MANGUERA'

    ];

    protected $guarded=[

    ];
}
