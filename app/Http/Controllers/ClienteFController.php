<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\ClienteF;
use Illuminate\Support\Facades\Redirect;
use sisSurtidor\Http\Requests\ClienteFFormRequest;
use DB;


class ClienteFController extends Controller
{
     public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$clientefs=DB::table('cliente_f as cf')
    		->join('persona as p','cf.CI_C','=','p.CI_NIT_P')
            ->select('cf.CI_C','cf.PUNTOS_ACUMULADOS','p.NOMBRE as NOMBRE','p.APELLIDO_PATERNO as APELLIDO_PATERNO','p.APELLIDO_MATERNO as APELLIDO_MATERNO')
            ->where('CI_C','LIKE','%'.$query.'%')
    		->paginate(7);
    		return view('premio.clientef.index',["clientefs"=>$clientefs,"searchText"=>$query]);
    	}

    }

    public function create(){
   	    $personas=DB::table('persona')
        ->where('TIPO_P','=','2501')
        ->get();
    	return view("premio.clientef.create",["personas"=>$personas]);
    }

    public function store(ClienteFFormRequest $request){

    	$clientef=new ClienteF;
    	$clientef->CI_C=$request->get('ci_c');
    	$clientef->PUNTOS_ACUMULADOS=$request->get('puntos_acumulados');
    	$clientef->save();
    	return Redirect::to('premio/clientef');
    }	

    public function show($id){
    	return view("premio.clientef.show",["clientef"=>ClienteF::findOrFail($id)]);
    }

    public function edit($id){
        $clientef=ClienteF::findOrFail($id);
    	return view("premio.clientef.edit",["clientef"=>$clientef]);
    }

    public function update(ClienteFFormRequest $request , $id){

    	$clientef=ClienteF::findOrFail($id);

    	$clientef->PUNTOS_ACUMULADOS=$request->get('puntos_acumulados');

    	$clientef->update();
    	return Redirect::to('premio/clientef');
    }
    public function destroy($id){
    	$clientef=ClienteF::findOrFail($id);
    
    	$clientef->update();
    	return Redirect::to('premio/clientef');
    }
}
