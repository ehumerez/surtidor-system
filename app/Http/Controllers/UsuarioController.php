<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\Usuario;
use Illuminate\Support\Facades\Redirect;
use sisSurtidor\Http\Requests\UsuarioFormRequest;
use DB;


class UsuarioController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$usuarios=DB::table('usuario')
    		->where('USUARIO','LIKE','%'.$query.'%')
    		->paginate(7);
    		return view('admusuario.user.index',["usuarios"=>$usuarios,"searchText"=>$query]);
    	}

    }

    public function create(){
   		$grupos=DB::table('grupo')
   		->where('CODIGO_G','!=','2001')
   		->get();
        $trabajadores=DB::table('trabajador')->get();
    	return view("admusuario.user.create",["grupos"=>$grupos,"trabajadores"=>$trabajadores]);
    }

    public function store(UsuarioFormRequest $request){
    	$usuario=new Usuario;

    	$usuario->USUARIO=$request->get('usuario');
    	$usuario->CONTRASENA=$request->get('contraseña');
    	$usuario->CI_NIT_PERSONA=$request->get('ci_nit_persona');
    	$usuario->CODIGO_GRUPO=$request->get('codigo_grupo');
    	$usuario->save();

    	return Redirect::to('admusuario/user');
    }	

    public function show($id){
    	return view("admusuario.user.show",["admusuario"=>Usuario::findOrFail($id)]);
    }

    public function edit($id){


        $usuario=Usuario::findOrFail($id);
        $grupos=DB::table('grupo')->get();
    	return view("admusuario.user.edit",["usuario"=>$usuario,"grupos"=>$grupos]);
    }
    
    public function update(UsuarioFormRequest $request , $id){

    	$usuario=Usuario::findOrFail($id);

    	$usuario->CONTRASENA=$request->get('contraseña');
    	$usuario->CODIGO_GRUPO=$request->get('codigo_grupo');
    	$usuario->update();

    	return Redirect::to('admusuario/user');
    }
    public function destroy($id){
    	$usuario=Usuario::findOrFail($id);
    	$usuario->update();
    	return Redirect::to('admusuario/user');
    }
}
