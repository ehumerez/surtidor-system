<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class Dispenser extends Model
{
    protected $table='dispenser';
    protected $primaryKey="ID_B";

    public $timestamps=false;

    protected $fillable = [
	
    	'ESTADO'

    ];

    protected $guarded = [

    ];
}
