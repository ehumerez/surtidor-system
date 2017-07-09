<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\Manguera;
use Illuminate\Support\Facades\Redirect;
use sisSurtidor\Http\Requests\MangueraFormRequest;
use DB;

class MangueraController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$mangueras=DB::table('manguera')
            ->where('ID_M','LIKE','%'.$query.'%')
    		->paginate(7);
    		return view('almacen.manguera.index',["mangueras"=>$mangueras,"searchText"=>$query]);
    	}

    }

    public function create(){
   	
    	return view("almacen.manguera.create");
    }

    public function store(MangueraFormRequest $request){
    	$manguera=new Manguera;
    	$manguera->DESCRIPCION=$request->get('descripcion');
    	$manguera->METER=$request->get('meter');
    	$manguera->ESTADO=$request->get('estado');

    	$manguera->save();
    	return Redirect::to('almacen/manguera');
    }	

    public function show($id){
    	return view("almacen.manguera.show",["manguera"=>Manguera::findOrFail($id)]);
    }

    public function edit($id){
        $manguera=Manguera::findOrFail($id);
    	return view("almacen.manguera.edit",["manguera"=>$manguera]);
    }

    public function update(MangueraFormRequest $request , $id){

    	$manguera=Manguera::findOrFail($id);
    	$manguera->ESTADO=$request->get('estado');

    	$manguera->update();
    	return Redirect::to('almacen/manguera');
    }
    public function destroy($id){
    	$manguera=Manguera::findOrFail($id);
    
    	$manguera->update();
    	return Redirect::to('almacen/manguera');
    }
}
