<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\Persona;
use Illuminate\Support\Facades\Redirect;
use sisSurtidor\Http\Requests\PersonaFormRequest;
use DB;


class PersonaController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$personas=DB::table('persona')
    		->paginate(7);
    		return view('operador.persona.index',["personas"=>$personas,"searchText"=>$query]);
    	}

    }

    public function create(){
   		$tipo_personas=DB::table('tipo_persona')
   		->where('CODIGO_G','=','2501')
   		->get();
    	return view("operador.persona.create",["tipo_personas"=>$tipo_personas]);
    }

    public function store(PersonaFormRequest $request){
    	$persona=new Persona;
    	$persona->CI_NIT_P=$request->get('ci_nit_p');
    	$persona->NOMBRE=$request->get('nombre');
    	$persona->APELLIDO_PATERNO=$request->get('apellido_paterno');
    	$persona->APELLIDO_MATERNO=$request->get('apellido_materno');
    	$persona->TIPO_P=$request->get('tipo_p');
    	$persona->save();
    	return Redirect::to('operador/vehiculo');
    }	

    public function show($id){
    	return view("operador.persona.show",["persona"=>Persona::findOrFail($id)]);
    }

    public function edit($id){
    	return view("operador.persona.edit",["persona"=>Persona::findOrFail($id)]);
    }
    
    public function update(PersonaFormRequest $request , $id){

    	$persona=Persona::findOrFail($id);

    	$persona->CI_NIT_P=$request->get('ci_nit_p');
    	$persona->NOMBRE=$request->get('nombre');
    	$persona->APELLIDO_PATERNO=$request->get('apellido_paterno');
    	$persona->APELLIDO_MATERNO=$request->get('apellido_materno');
    	$persona->TIPO_P=$request->get('tipo_p');
    	$persona->update();
    	return Redirect::to('operador/persona');
    }
    public function destroy($id){
    	$persona=Persona::findOrFail($id);
    	$persona->update();
    	return Redirect::to('operador/persona');
    }
}
