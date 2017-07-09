<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class VehiculoAfiliado extends Model
{
    protected $table='vehiculo_afiliados';
    protected $primaryKey="ID_VA";

    public $timestamps=false;

    protected $fillable = [

    	'CI_CLIENTE',
    	'P_VEHICULO'

    ];

    protected $guarded = [

    ];
}
