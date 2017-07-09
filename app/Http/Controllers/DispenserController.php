<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\Dispenser;
use Illuminate\Support\Facades\Redirect;
use sisSurtidor\Http\Requests\DispenserFormRequest;
use DB;


class DispenserController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$dispensers=DB::table('dispenser')
            ->where('ID_B','LIKE','%'.$query.'%')
    		->paginate(7);
    		return view('almacen.dispenser.index',["dispensers"=>$dispensers,"searchText"=>$query]);
    	}

    }

    public function create(){
   	
    	return view("almacen.dispenser.create");
    }

    public function store(DispenserFormRequest $request){
    	$dispenser=new Dispenser;
    	$dispenser->ESTADO=$request->get('estado');
    	
    	$dispenser->save();
    	return Redirect::to('almacen/dispenser');
    }	

    public function show($id){
    	return view("almacen.dispenser.show",["dispenser"=>Dispenser::findOrFail($id)]);
    }

    public function edit($id){
        $dispenser=Dispenser::findOrFail($id);
    	return view("almacen.dispenser.edit",["dispenser"=>$dispenser]);
    }

    public function update(DispenserFormRequest $request , $id){

    	$dispenser=Dispenser::findOrFail($id);
    	$dispenser->ESTADO=$request->get('estado');

    	$dispenser->update();
    	return Redirect::to('almacen/dispenser');
    }
    public function destroy($id){
    	$dispenser=Dispenser::findOrFail($id);
    
    	$dispenser->update();
    	return Redirect::to('almacen/dispenser');
    }
}
