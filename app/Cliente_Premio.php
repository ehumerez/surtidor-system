<?php

namespace sisSurtidor;

use Illuminate\Database\Eloquent\Model;

class Cliente_Premio extends Model
{
    protected $table='cliente_premio';
    protected $primaryKey="ID_CP";

    public $timestamps=false;


    protected $fillable = [
    	'CI_CLIENTE',
    	'ID_PREMIO',
    	'CANTIDAD',
    	'ESTADO'  	

    ];

    protected $guarded = [

    ];
}
