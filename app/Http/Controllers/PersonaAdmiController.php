<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\PersonaAdmi;
use Illuminate\Support\Facades\Redirect;
use sisSurtidor\Http\Requests\PersonaAdmiFormRequest;
use DB;

class PersonaAdmiController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$personas=DB::table('persona')
    		->where('CI_NIT_P','LIKE','%'.$query.'%')
    		->paginate(7);
    		return view('perfil.personaadmi.index',["personas"=>$personas,"searchText"=>$query]);
    	}

    }

    public function create(){
   		$tipo_personas=DB::table('tipo_persona')
   		->get();
    	return view("perfil.personaadmi.create",["tipo_personas"=>$tipo_personas]);
    }

    public function store(PersonaAdmiFormRequest $request){
    	$persona=new PersonaAdmi;
    	$persona->CI_NIT_P=$request->get('ci_nit_p');
    	$persona->NOMBRE=$request->get('nombre');
    	$persona->APELLIDO_PATERNO=$request->get('apellido_paterno');
    	$persona->APELLIDO_MATERNO=$request->get('apellido_materno');
    	$persona->TIPO_P=$request->get('tipo_p');
    	$persona->save();
    	return Redirect::to('perfil/personaadmi');
    }	

    public function show($id){
    	return view("perfil.personaadmi.show",["personaadmi"=>PersonaAdmi::findOrFail($id)]);
    }

    public function edit($id){

    	$personaadmi=PersonaAdmi::findOrFail($id);
    	$tipo_personas=DB::table('tipo_persona')->get();
    	return view("perfil.personaadmi.edit",["personaadmi"=>$personaadmi,"tipo_personas"=>$tipo_personas]);
    }
    
    public function update(PersonaAdmiFormRequest $request , $id){

    	$persona=PersonaAdmi::findOrFail($id);

    	$persona->NOMBRE=$request->get('nombre');

    	$persona->APELLIDO_PATERNO=$request->get('apellido_paterno');
    	$persona->APELLIDO_MATERNO=$request->get('apellido_materno');
    	$persona->TIPO_P=$request->get('tipo_p');
    	$persona->update();
    	return Redirect::to('perfil/personaadmi');
    }
    public function destroy($id){
    	$persona=PersonaAdmi::findOrFail($id);
    	$persona->update();
    	return Redirect::to('perfil/personaadmi');
    }
}
