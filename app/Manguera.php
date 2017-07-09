<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class Manguera extends Model
{
    protected $table='manguera';
    protected $primaryKey='ID_M';

    public $timestamps=false;

    protected $fillable=[

    	'DESCRIPCION',
    	'METER',
    	'ESTADO'

    ];

    protected $guarded=[

    ];
}
