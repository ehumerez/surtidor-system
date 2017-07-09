<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;


use sisSurtidor\Combustible;
use Illuminate\Support\Facades\Redirect;
use sisSurtidor\Http\Requests\CombustibleFormRequest;
use DB;


class CombustibleController extends Controller
{
    public function __construct(){
            
    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$combustibles=DB::table('combustible as c')   	 
            ->join('unidad_medida as u','c.ID_UNIDAD_MEDIDA','=','u.ID_UM')
            ->select('c.CODIGO_C','c.DESCRIPCION','c.PRECIO','u.DESCRIPCION as ID_UNIDAD_MEDIDA')
            ->where('CODIGO_C','LIKE','%'.$query.'%')
    		->paginate(7);
    		return view('almacen.combustible.index',["combustibles"=>$combustibles,"searchText"=>$query]);
    	}

    }
    public function most(){
        return Redirect::to('almacen/tanque');
    }

    public function create(){

   	    $unidad_medidas=DB::table('unidad_medida')->get();
    	return view("almacen.combustible.create",["unidad_medidas"=>$unidad_medidas]);
    }

    public function store(CombustibleFormRequest $request){
    	

        $combustible=new Combustible;
    	$combustible->DESCRIPCION=$request->get('descripcion');
    	$combustible->PRECIO=$request->get('precio');
    	$combustible->ID_UNIDAD_MEDIDA=$request->get('id_unidad_medida');
    	$combustible->save();
    	return Redirect::to('almacen/combustible');
    }	

    public function show($id){
    	return view("almacen.combustible.show",["combustible"=>Combustible::findOrFail($id)]);
    }

    public function edit($id){
    	return view("almacen.combustible.edit",["combustible"=>Combustible::findOrFail($id)]);
    }

    public function update(CombustibleFormRequest $request , $id){

    	$combustible=Combustible::findOrFail($id);

    	$combustible->DESCRIPCION=$request->get('descripcion');
    	$combustible->PRECIO=$request->get('precio');
    	$combustible->ID_UNIDAD_MEDIDA=$request->get('id_unidad_medida');

    	$combustible->update();
    	return Redirect::to('almacen/combustible');
    }
    public function destroy($id){
    	$combustible=Combustible::findOrFail($id);
    
    	$combustible->update();
    	return Redirect::to('almacen/combustible');
    }
}
