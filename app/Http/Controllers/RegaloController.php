<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\Regalo;
use Illuminate\Support\Facades\Redirect;
use sisSurtidor\Http\Requests\RegaloFormRequest;
use DB;

class RegaloController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$regalos=DB::table('premio')   		
    		->where('ID_PR','LIKE','%'.$query.'%')
    		->paginate(7);
    		return view('premio.regalo.index',["regalos"=>$regalos,"searchText"=>$query]);
    	}

    }

    public function create(){
   	
    	return view("premio.regalo.create");
    }

    public function store(RegaloFormRequest $request){

    	$regalo=new Regalo;
    	$regalo->CANTIDAD=$request->get('cantidad');
    	$regalo->DESCRIPCION=$request->get('descripcion');
    	$regalo->VALOR=$request->get('valor');
    	
    	$regalo->save();
    	return Redirect::to('premio/regalo');
    }	

    public function show($id){
    	return view("premio.regalo.show",["regalo"=>Regalo::findOrFail($id)]);
    }

    public function edit($id){
        $regalo=Regalo::findOrFail($id);
    	return view("premio.regalo.edit",["regalo"=>$regalo]);
    }

    public function update(RegaloFormRequest $request , $id){

    	$regalo=Regalo::findOrFail($id);

    	$regalo->CANTIDAD=$request->get('cantidad');
    	$regalo->DESCRIPCION=$request->get('descripcion');
    	$regalo->VALOR=$request->get('valor');

    	$regalo->update();
    	return Redirect::to('premio/regalo');
    }
    public function destroy($id){
    	$regalo=Regalo::findOrFail($id);
    
    	$regalo->update();
    	return Redirect::to('premio/regalo');
    }
}
