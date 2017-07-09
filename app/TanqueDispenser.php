<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class TanqueDispenser extends Model
{
    protected $table='tanque_dispenser';
    protected $primaryKey="ID_TB";

    public $timestamps=false;

    protected $fillable = [

    	'ID_TANQUE',
    	'ID_DISPENSER',
    	'ID_MANGUERA'

    ];

    protected $guarded = [

    ];
}
