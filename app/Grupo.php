<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table='grupo';
    protected $primaryKey="CODIGO_G";

    public $timestamps=false;

    protected $fillable = [

    	'DESCRIPCION'

    ];

    protected $guarded = [

    ];
}
