<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class Regalo extends Model
{
    protected $table='premio';
    protected $primaryKey="ID_PR";

    public $timestamps=false;

    protected $fillable = [

    	'CANTIDAD',
    	'DESCRIPCION',
    	'VALOR'

    ];

    protected $guarded = [

    ];
}
