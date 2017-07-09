<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\VehiculoAfiliado;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisSurtidor\Http\Requests\VehiculoAfiliadoFormRequest;
use DB;

class VehiculoAfiliadoController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$vehiculoafiliados=DB::table('vehiculo_afiliados as v')
            ->join('cliente_f as c','c.CI_C','=','v.CI_CLIENTE')
            ->join('persona as p','p.CI_NIT_P','=','c.CI_C')
            ->select('v.ID_VA','v.CI_CLIENTE','v.P_VEHICULO','p.NOMBRE','p.APELLIDO_PATERNO','p.APELLIDO_MATERNO')
    		->where('v.ID_VA','LIKE','%'.$query.'%')
    		->paginate(7);
    		return view('premio.vehiculoafiliado.index',["vehiculoafiliados"=>$vehiculoafiliados,"searchText"=>$query]);
    	}

    }

    public function create(){

    	$clientefs=DB::table('cliente_f')->get();
        $vehiculos=DB::table('vehiculo')->get();
    	return view("premio.vehiculoafiliado.create",["clientefs"=>$clientefs,"vehiculos"=>$vehiculos]);
    }

    public function store(VehiculoAfiliadoFormRequest $request){

    	$vehiculoafiliado=new VehiculoAfiliado;
    	$vehiculoafiliado->CI_CLIENTE=$request->get('ci_cliente');
    	$vehiculoafiliado->P_VEHICULO=$request->get('p_vehiculo');

 
    	$vehiculoafiliado->save();
    	return Redirect::to('premio/vehiculoafiliado');
    }	

    public function show($id){
    	return view("premio.vehiculoafiliado.show",["vehiculoafiliado"=>VehiculoAfiliado::findOrFail($id)]);
    }

    public function edit($id){

    	return view("premio.vehiculoafiliado.edit");
    }

    public function update(VehiculoAfiliadoFormRequest $request , $id){

    	$vehiculoafiliado=new VehiculoAfiliado;
    	$vehiculoafiliado->CI_CLIENTE=$request->get('ci_cliente');
    	$vehiculoafiliado->P_VEHICULO=$request->get('p_vehiculo');

    	$vehiculoafiliado->update();
    	return Redirect::to('premio/vehiculoafiliado');
    }
    public function destroy($id){
    	$vehiculoafiliado=VehiculoAfiliado::findOrFail($id);

    	$vehiculoafiliado->update();
    	return Redirect::to('premio/vehiculoafiliado');
    }
}
