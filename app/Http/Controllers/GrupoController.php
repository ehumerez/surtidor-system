<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\Grupo;
use Illuminate\Support\Facades\Redirect;
use sisSurtidor\Http\Requests\GrupoFormRequest;
use DB;

class GrupoController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$grupos=DB::table('grupo')
    		->where('CODIGO_G','!=','2001')   	 
            ->where('CODIGO_G','LIKE','%'.$query.'%')
    		->paginate(7);
    		return view('admusuario.grupo.index',["grupos"=>$grupos,"searchText"=>$query]);
    	}

    }

    public function create(){

    	return view("admusuario.grupo.create");
    }

    public function store(GrupoFormRequest $request){
    	

        $grupo=new Grupo;
    	$grupo->DESCRIPCION=$request->get('descripcion');
    	$grupo->save();
    	return Redirect::to('admusuario/grupo');
    }	

    public function show($id){

    	return view("admusuario.grupo.show",["grupo"=>Grupo::findOrFail($id)]);
    }

    public function edit($id){
    	$grupo=Grupo::findOrFail($id);
    	return view("admusuario.grupo.edit",["grupo"=>$grupo]);
    }

    public function update(GrupoFormRequest $request , $id){

    	$grupo=Grupo::findOrFail($id);

    	$grupo->DESCRIPCION=$request->get('descripcion');

    	$grupo->update();
    	return Redirect::to('admusuario/grupo');
    }
    public function destroy($id){
    	$grupo=Grupo::findOrFail($id);
    
    	$grupo->update();
    	return Redirect::to('admusuario/grupo');
    }
}
