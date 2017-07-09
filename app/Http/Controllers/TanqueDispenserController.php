<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\TanqueDispenser;
use Illuminate\Support\Facades\Redirect;
use sisSurtidor\Http\Requests\TanqueDispenserFormRequest;
use DB;

class TanqueDispenserController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$tanquedispensers=DB::table('tanque_dispenser')   		
    		->where('ID_TB','LIKE','%'.$query.'%')
    		->paginate(7);
    		return view('almacen.tanquedispenser.index',["tanquedispensers"=>$tanquedispensers,"searchText"=>$query]);
    	}

    }

    public function create(){
   	    
        
    	return view("almacen.tanquedispenser.create");
    }


    public function store(TanqueDispenserFormRequest $request){
    	$tanquedispenser=new TanqueDispenser;
    	$tanquedispenser->ID_TANQUE=$request->get('id_tanque');
    	$tanquedispenser->ID_DISPENSER=$request->get('id_dispenser');
    	$tanquedispenser->ID_MANGUERA=$request->get('id_manguera');
    	$tanquedispenser->save();
    	return Redirect::to('almacen/tanquedispenser');
    }	

    public function show($id){
    	return view("almacen.tanquedispenser.show",["tanquedispenser"=>TanqueDispenser::findOrFail($id)]);
    }

    public function edit($id){
    	return view("almacen.tanquedispenser.edit",["tanquedispenser"=>TanqueDispenser::findOrFail($id)]);
    }

    public function update(TanqueDispenserFormRequest $request , $id){

    	$tanquedispenser=new TanqueDispenser;
    	$tanquedispenser->ID_TANQUE=$request->get('id_tanque');
    	$tanquedispenser->ID_DISPENSER=$request->get('id_dispenser');
    	$tanquedispenser->ID_MANGUERA=$request->get('id_manguera');

    	$tanquedispenser->update();
    	return Redirect::to('almacen/tanquedispenser');
    }
    public function destroy($id){
    	$tanquedispenser=TanqueDispenser::findOrFail($id);
    
    	$tanquedispenser->update();
    	return Redirect::to('almacen/tanquedispenser');
    }
}
