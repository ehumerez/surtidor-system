<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\Trabajador;
use Illuminate\Support\Facades\Redirect;
use sisSurtidor\Http\Requests\TrabajadorFormRequest;
use DB;

class TrabajadorController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$trabajadores=DB::table('trabajador as t')   	 
            ->join('persona as p','p.CI_NIT_P','=','t.CI_T')
            ->join('tipo_persona as tp','tp.CODIGO_G','=','p.TIPO_P')
            ->select('t.CI_T','t.DIRECCION','t.EMAIL','t.TIPO','t.FECHA_INICIO','tp.DESCRIPCION','p.NOMBRE','p.APELLIDO_PATERNO')
            ->where('t.CI_T','LIKE','%'.$query.'%')
    		->paginate(7);
    		return view('perfil.trabajador.index',["trabajadores"=>$trabajadores,"searchText"=>$query]);
    	}

    }

    public function create(){
   		$personas=DB::table('persona')
   		->get();
    	return view("perfil.trabajador.create",["personas"=>$personas]);
    }

    public function store(TrabajadorFormRequest $request){
        
    	$trabajador=new Trabajador;
    	$trabajador->CI_T=$request->get('ci_nit_p');
    	$trabajador->DIRECCION=$request->get('direccion');
    	$trabajador->EMAIL=$request->get('email');
    	$trabajador->TIPO=$request->get('tipo');
    	$trabajador->FECHA_INICIO=$request->get('fecha_inicio');
    	$trabajador->save();
    	return Redirect::to('perfil/trabajador');
    }	

    public function show($id){
    	return view("perfil.trabajador.show",["trabajador"=>Trabajador::findOrFail($id)]);
    }

    public function edit($id){
        $trabajador=Trabajador::findOrFail($id);
    	return view("perfil.trabajador.edit",["trabajador"=>$trabajador]);
    }
    
    public function update(TrabajadorFormRequest $request , $id){

    	$trabajador=Trabajador::findOrFail($id);

    	$trabajador->DIRECCION=$request->get('direccion');
    	$trabajador->EMAIL=$request->get('email');
    	$trabajador->tipo=$request->get('tipo');
    	$trabajador->update();

    	return Redirect::to('perfil/trabajador');
    }
    public function destroy($id){
    	$trabajador=Trabajador::findOrFail($id);
    	$trabajador->update();
    	return Redirect::to('perfil/trabajador');
    }
}
