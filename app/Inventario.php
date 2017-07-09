<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table='inventario';
    protected $primaryKey="ID_I";

    public $timestamps=false;

    protected $fillable = [

    	'CANTIDAD_DISPONIBLE',
    	'CODIGO_COMBUSTIBLE',
    	'PRECIO_COMPRA',
    	'PRECION_VENTA'

    ];

    protected $guarded = [

    ];
}
