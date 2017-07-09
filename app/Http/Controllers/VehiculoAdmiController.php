<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\VehiculoAdmi;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisSurtidor\Http\Requests\VehiculoAdmiFormRequest;
use DB;

class VehiculoAdmiController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$vehiculos=DB::table('vehiculo')
    		->where('PLACA','LIKE','%'.$query.'%')
    		->paginate(7);
    		return view('perfil.vehiculoadmi.index',["vehiculos"=>$vehiculos,"searchText"=>$query]);
    	}

    }

    public function create(){

    	return view("perfil.vehiculoadmi.create");
    }

    public function store(VehiculoAdmiFormRequest $request){
    	$vehiculo=new Vehiculo;
    	$vehiculo->PLACA=$request->get('placa');
    	$vehiculo->COLOR=$request->get('color');
    	$vehiculo->SERVICIO=$request->get('servicio');
    	$vehiculo->CONDICION=$request->get('condicion');

    	if(Input::hasFile('imagen')){
    		$file=Input::file('imagen');
    		$file->move(public_path().'/imagenes/vehiculos/',$file->getClientOriginalName());
    		$vehiculo->IMAGEN=$file->getClientOriginalName();
    	}


    	$vehiculo->save();
    	return Redirect::to('perfil/vehiculoadmi');
    }	

    public function show($id){
    	return view("perfil.vehiculoadmi.show",["vehiculoadmi"=>Vehiculo::findOrFail($id)]);
    }

    public function edit($id){
    	$vehiculo=Vehiculo::findOrFail($id);
    	$clientes=DB::table('cliente')->get();
    	return view("perfil.vehiculoadmi.edit",["vehiculo"=>$vehiculo,"clientes"=>$clientes]);
    }

    public function update(VehiculoAdmiFormRequest $request , $id){

    	$vehiculo=Vehiculo::findOrFail($id);

    	$vehiculo->COLOR=$request->get('color');
    	$vehiculo->SERVICIO=$request->get('servicio'); 
    	$vehiculo->CONDICION=$request->get('condicion');
    	if(Input::hasFile('imagen')){
    		$file=Input::file('imagen');
    		$file->move(public_path().'/imagenes/vehiculos/',$file->getClientOriginalName());
    		$vehiculo->IMAGEN=$file->getClientOriginalName();
    	}
    	$vehiculo->update();
    	return Redirect::to('perfil/vehiculoadmi');
    }
    public function destroy($id){
    	$vehiculo=Vehiculo::findOrFail($id);
    	$vehiculo->CONDICION='0';
    	$vehiculo->update();
    	return Redirect::to('operador/vehiculoadmi');
    }

}