<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class Combustible extends Model
{
    protected $table='combustible';
    protected $primaryKey="CODIGO_C";

    public $timestamps=false;

    protected $fillable = [

    	'DESCRIPCION',
    	'PRECIO',
    	'ID_UNIDAD_MEDIDA'

    ];

    protected $guarded = [

    ];
}
