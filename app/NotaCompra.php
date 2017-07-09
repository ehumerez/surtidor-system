<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class NotaCompra extends Model
{
    protected $table='nota_compra';
    protected $primaryKey='ID_NC';

    public $timestamps=false;

    protected $fillable=[

    	'PROVEEDOR',
    	'CODIGO_TRABAJADOR'

    ];

    protected $guarded=[

    ];
}
