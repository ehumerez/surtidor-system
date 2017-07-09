<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\Cliente_Premio;
use Illuminate\Support\Facades\Redirect;
use sisSurtidor\Http\Requests\Cliente_PremioFormRequest;
use DB;

class Cliente_PremioController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$cliente_premios=DB::table('cliente_premio')
    		->paginate(7);
    		return view('premio.cliente_premio.index',["cliente_premios"=>$cliente_premios,"searchText"=>$query]);
    	}

    }

    public function create(){
   		$clientefs=DB::table('cliente_f')->get();
   		$premios=DB::table('premio')->get();
    	return view("premio.cliente_premio.create",["clientefs"=>$clientefs,"premios"=>$premios]);
    }

    public function store(Cliente_PremioFormRequest $request){
    	$cliente_premio=new Cliente_Premio;
    	$cliente_premio->CI_CLIENTE=$request->get('ci_cliente');
    	$cliente_premio->ID_PREMIO=$request->get('id_premio');
    	$cliente_premio->CANTIDAD=$request->get('cantidad');
    	$cliente_premio->ESTADO='No Aceptado';
    	$cliente_premio->save();
    	return Redirect::to('premio/cliente_premio');
    }	

    public function show($id){

    	return view("premio.cliente_premio.show",["cliente_premio"=>Cliente_Premio::findOrFail($id)]);
    }

    public function edit($id){
        $cliente_premio=Cliente_Premio::findOrFail($id);
    	return view("premio.cliente_premio.edit",["cliente_premio"=>$cliente_premio]);
    }

    public function update(Cliente_PremioFormRequest $request , $id){

    	$cliente_premio=Cliente_Premio::findOrFail($id);
    	$cliente_premio->ESTADO=$request->get('estado');

    	$cliente_premio->update();
    	return Redirect::to('premio/cliente_premio');
    }
    public function destroy($id){
    	$cliente_premio=Cliente_Premio::findOrFail($id);
    
    	$cliente_premio->update();
    	return Redirect::to('premio/cliente_premio');
    }
}
