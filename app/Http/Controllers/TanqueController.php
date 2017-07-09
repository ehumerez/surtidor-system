<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\Tanque;
use Illuminate\Support\Facades\Redirect;
use sisSurtidor\Http\Requests\TanqueFormRequest;
use DB;

class TanqueController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$tanques=DB::table('tanque as t')
            ->join('combustible as c','c.CODIGO_C','=','t.CODIGO_COMBUSTIBLE')  
            ->select('t.CODIGO_T','t.CAPACIDAD_DISPONIBLE','t.CAPACIDAD_MAXIMA','t.CAPACIDAD_MINIMA','t.ESTADO','c.DESCRIPCION','t.CODIGO_COMBUSTIBLE') 		
    		->where('t.CODIGO_T','LIKE','%'.$query.'%')
    		->paginate(7);
    		return view('almacen.tanque.index',["tanques"=>$tanques,"searchText"=>$query]);
    	}

    }

    public function create(){

        $combustibles=DB::table('combustible')
        ->where('CODIGO_C','!=','1002')
        ->get();
    	return view("almacen.tanque.create",["combustibles"=>$combustibles]);
    }

    public function store(TanqueFormRequest $request){

    	$tanque=new Tanque;
    	$tanque->CAPACIDAD_DISPONIBLE=$request->get('capacidad_disponible');
    	$tanque->CAPACIDAD_MINIMA=$request->get('capacidad_minima');
    	$tanque->CAPACIDAD_MAXIMA=$request->get('capacidad_maxima');
    	$tanque->CODIGO_COMBUSTIBLE=$request->get('codigo_combustible');
    	$tanque->ESTADO=$request->get('estado');
    	$tanque->save();
    	return Redirect::to('almacen/tanque');
    }	

    public function show($id){
    	return view("almacen.tanque.show",["tanque"=>Tanque::findOrFail($id)]);
    }

    public function edit($id){
        
        $tanque=Tanque::findOrFail($id);
    	return view("almacen.tanque.edit",["tanque"=>$tanque]);
    }

    public function update(TanqueFormRequest $request , $id){

    	$tanque=Tanque::findOrFail($id);
    	$tanque->ESTADO=$request->get('estado');
    	
    	$tanque->update();
    	return Redirect::to('almacen/tanque');
    }
    public function destroy($id){
    	$tanque=Tanque::findOrFail($id);
    
    	$tanque->update();
    	return Redirect::to('almacen/tanque');
    }
}
