<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class NotaCompraCombustible extends Model
{
    protected $table='nota_compra_combustible';
    protected $primaryKey='ID_NCC';

    public $timestamps=false;

    protected $fillable=[

    	'CODIGO_COMBUSTIBLE',
    	'ID_NOTRA_COMPRA',
    	'CANTIDAD',
    	'PRECIO'
    ];

    protected $guarded=[

    ];
}
