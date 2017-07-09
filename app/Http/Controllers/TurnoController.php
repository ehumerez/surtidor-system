<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\Turno;
use Illuminate\Support\Facades\Redirect;
use sisSurtidor\Http\Requests\TurnoFormRequest;
use DB;

class TurnoController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$turnos=DB::table('turno')   		
    		->where('CODIGO_T','LIKE','%'.$query.'%')
    		->paginate(7);
    		return view('perfil.turno.index',["turnos"=>$turnos,"searchText"=>$query]);
    	}

    }

    public function create(){
   	
    	return view("perfil.turno.create");
    }

    public function store(TurnoFormRequest $request){
    	$turno=new Turno;
    	$turno->DESCRIPCION=$request->get('descripcion');
    	$turno->HORA_ENTRADA=$request->get('hora_entrada');
    	$turno->HORA_SALITA=$request->get('hora_salida');
    	
    	$turno->save();
    	return Redirect::to('perfil/turno');
    }	

    public function show($id){
    	return view("perfil.turno.show",["turno"=>Turno::findOrFail($id)]);
    }

    public function edit($id){
    	return view("perfil.turno.edit",["turno"=>Turno::findOrFail($id)]);
    }

    public function update(TurnoFormRequest $request , $id){

    	$turno=Turno::findOrFail($id);

    	$turno->DESCRIPCION=$request->get('descripcion');
    	$turno->HORA_ENTRADA=$request->get('hora_entrada');
    	$turno->HORA_SALITA=$request->get('hora_salida');

    	$turno->update();
    	return Redirect::to('perfil/turno');
    }
    public function destroy($id){
    	$turno=Turno::findOrFail($id);
    
    	$turno->update();
    	return Redirect::to('perfil/turno');
    }
}
