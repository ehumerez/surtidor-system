<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\Vehiculo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisSurtidor\Http\Requests\VehiculoFormRequest;
use DB;


class VehiculoController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$vehiculos=DB::table('vehiculo')
    		->where('PLACA','LIKE','%'.$query.'%')
    		->paginate(1);
    		return view('operador.vehiculo.index',["vehiculos"=>$vehiculos,"searchText"=>$query]);
    	}

    }

    public function create(){

    	$clientes=DB::table('cliente')->get();
    	return view("operador.vehiculo.create",["clientes"=>$clientes]);
    }

    public function store(VehiculoFormRequest $request){
    	$vehiculo=new Vehiculo;
    	$vehiculo->PLACA=$request->get('PLACA');
    	$vehiculo->COLOR=$request->get('COLOR');
    	$vehiculo->SERVICIO=$request->get('SERVICIO');
    	$vehiculo->CI_CLIENTE=$request->get('CI_CLIENTE');  
    	$vehiculo->CONDICION='1';

    	if(Input::hasFile('imagen')){
    		$file=Input::file('imagen');
    		$file->move(public_path().'/imagenes/vehiculos/',$file->getClientOriginalName());
    		$vehiculo->IMAGEN=$file->getClientOriginalName();
    	}


    	$vehiculo->save();
    	return Redirect::to('operador/vehiculo');
    }	

    public function show($id){
    	return view("operador.vehiculo.show",["vehiculo"=>Vehiculo::findOrFail($id)]);
    }

    public function edit($id){
    	$vehiculo=Vehiculo::findOrFail($id);
    	$clientes=DB::table('cliente')->get();
    	return view("operador.vehiculo.edit",["vehiculo"=>$vehiculo,"clientes"=>$clientes]);
    }

    public function update(VehiculoFormRequest $request , $id){

    	$vehiculo=Vehiculo::findOrFail($id);

    	$vehiculo->PLACA=$request->get('idcategoria');
    	$vehiculo->COLOR=$request->get('codigo');
    	$vehiculo->SERVICIO=$request->get('nombre');
    	$vehiculo->CI_CLIENTE=$request->get('stock');  

    	if(Input::hasFile('imagen')){
    		$file=Input::file('imagen');
    		$file->move(public_path().'/imagenes/vehiculos/',$file->getClientOriginalName());
    		$vehiculo->IMAGEN=$file->getClientOriginalName();
    	}
    	$vehiculo->update();
    	return Redirect::to('operador/vehiculo');
    }
    public function destroy($id){
    	$vehiculo=Vehiculo::findOrFail($id);
    	$vehiculo->CONDICION='0';
    	$vehiculo->update();
    	return Redirect::to('operador/vehiculo');
    }
}
