<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\TrabajadorTurno;
use Illuminate\Support\Facades\Redirect;
use sisSurtidor\Http\Requests\TrabajadorTurnoFormRequest;
use DB;

class TrabajadorTurnoController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$trabajadorturnos=DB::table('trabajador_turno as tt')
            ->join('trabajador as t','t.CI_T','=','tt.CI_TRABAJADOR') 
            ->join('turno as tu','tu.CODIGO_T','=','tt.CODIGO_TURNO')
            ->join('persona as p','p.CI_NIT_P','=','t.CI_T')   
            ->select('tt.ID_TT','tt.CI_TRABAJADOR','tt.CODIGO_TURNO','tu.DESCRIPCION','tu.HORA_ENTRADA','tu.HORA_SALIDA','p.NOMBRE','p.APELLIDO_PATERNO')    		
    		->where('tt.ID_TT','LIKE','%'.$query.'%')
    		->paginate(7);
    		return view('perfil.trabajadorturno.index',["trabajadorturnos"=>$trabajadorturnos,"searchText"=>$query]);
    	}

    }

    public function create(){
   	    
        $turnos=DB::table('turno')->get();
        $trabajadores=DB::table('trabajador')->get();
    	return view("perfil.trabajadorturno.create",["turnos"=>$turnos,"trabajadores"=>$trabajadores]);
    }

    public function store(TrabajadorTurnoFormRequest $request){
    	$trabajadorturno=new TrabajadorTurno;
    	$trabajadorturno->CI_TRABAJADOR=$request->get('ci_trabajador');
    	$trabajadorturno->CODIGO_TURNO=$request->get('codigo_turno');
    	
    	$trabajadorturno->save();
    	return Redirect::to('perfil/trabajadorturno');
    }	

    public function show($id){
    	return view("perfil.trabajadorturno.show",["trabajadorturno"=>TrabajadorTurno::findOrFail($id)]);
    }

    public function edit($id){
    	return view("perfil.trabajadorturno.edit",["trabajadorturno"=>TrabajadorTurno::findOrFail($id)]);
    }

    public function update(TrabajadorTurnoFormRequest $request , $id){

    	$trabajadorturno=new TrabajadorTurno;
    	$trabajadorturno->CI_TRABAJADOR=$request->get('ci_trabajador');
    	$trabajadorturno->CODIGO_TURNO=$request->get('codigo_turno');

    	$trabajadorturno->update();
    	return Redirect::to('perfil/trabajadorturno');
    }
    public function destroy($id){
    	$trabajadorturno=Turno::findOrFail($id);
    
    	$trabajadorturno->update();
    	return Redirect::to('perfil/trabajadorturno');
    }
}
