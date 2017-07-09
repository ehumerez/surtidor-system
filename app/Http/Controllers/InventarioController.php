<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\Inventario;
use Illuminate\Support\Facades\Redirect;
use sisSurtidor\Http\Requests\InventarioFormRequest;
use DB;


class InventarioController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$inventarios=DB::table('inventario as i')
            ->join('combustible as c','c.CODIGO_C','=','i.CODIGO_COMBUSTIBLE')
            ->select('i.ID_I','i.CANTIDAD_DISPONIBLE','i.CODIGO_COMBUSTIBLE','i.PRECIO_COMPRA','i.PRECIO_VENTA','c.DESCRIPCION')
            ->where('i.ID_I','LIKE','%'.$query.'%')
    		->paginate(7);
    		return view('almacen.inventario.index',["inventarios"=>$inventarios,"searchText"=>$query]);
    	}

    }

    public function create(){
   	
    	return view("almacen.inventario.create");
    }

    public function store(InventarioFormRequest $request){
    	$inventario=new Inventario;
    	$inventario->CANTIDAD_DISPONIBLE=$request->get('cantidad_disponible');
    	$inventario->CODIGO_COMBUSTIBLE=$request->get('codigo_combustible');
    	$inventario->PRECIO_COMPRA=$request->get('precio_compra');
    	$inventario->PRECIO_VENTA=$request->get('precio_venta');
    	$inventario->save();
    	return Redirect::to('almacen/inventario');
    }	

    public function show($id){
    	return view("almacen.inventario.show",["inventario"=>Inventario::findOrFail($id)]);
    }

    public function edit($id){
    	return view("almacen.inventario.edit",["inventario"=>Inventario::findOrFail($id)]);
    }

    public function update(InventarioFormRequest $request , $id){

    	$inventario=Combustible::findOrFail($id);

    	$inventario->CANTIDAD_DISPONIBLE=$request->get('cantidad_disponible');
    	$inventario->CODIGO_COMBUSTIBLE=$request->get('codigo_combustible');
    	$inventario->PRECIO_COMPRA=$request->get('precio_compra');
    	$inventario->PRECIO_VENTA=$request->get('precio_venta');

    	$inventario->update();
    	return Redirect::to('almacen/inventario');
    }
    public function destroy($id){
    	$inventario=Combustible::findOrFail($id);
    
    	$inventario->update();
    	return Redirect::to('almacen/inventario');
    }
}
