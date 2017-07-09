<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;

class BitacoraController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$bitacoras=DB::table('bitacora')   	 
            ->where('ID_B','LIKE','%'.$query.'%')
    		->paginate(7);
    		return view('admusuario.bitacora.index',["bitacoras"=>$bitacoras,"searchText"=>$query]);
    	}

    }

    public function show($id){

    	$bitacora=DB::table('bitacora')   	 
            ->where('ID_B','=',$id)
            ->get();
    	return view("admusuario.bitacora.show",["bitacora"=>$bitacora]);
    }

}
