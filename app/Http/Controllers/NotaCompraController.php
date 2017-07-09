<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\NotaCompra;
use sisSurtidor\NotaCompraCombustible;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisSurtidor\Http\Requests\NotaCompraFormRequest;
use DB;

use Response;
use Illuminate\Support\Collection;

class NotaCompraController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$notacompras=DB::table('nota_compra as nc')   	 
            ->join('trabajador as t','nc.CODIGO_TRABAJADOR','=','t.CI_T')
            ->join('nota_compra_combustible as ncc','nc.ID_NC','=','ncc.ID_NOTA_COMPRA')

            ->select('nc.ID_NC','t.CI_T','nc.PROVEEDOR',DB::raw('sum(PRECIO) as total'))
            ->where('nc.ID_NC','LIKE','%'.$query.'%')
            ->groupBy('nc.ID_NC','t.CI_T','nc.PROVEEDOR')
    		->paginate(7);
    		return view('proceso.compra.index',["notacompras"=>$notacompras,"searchText"=>$query]);
    	}

    }

    public function create(){
   	
   		$trabajadors=DB::table('trabajador')->get();
   		$combustibles=DB::table('combustible')->get();
    	return view("proceso.compra.create",["trabajadors"=>$trabajadors,"combustibles"=>$combustibles]);
    }

    public function store(NotaCompraFormRequest $request){
    	

    	try{

    		DB::beginTransaction();

    		$notacompra= new NotaCompra;
    		$notacompra->CODIGO_TRABAJADOR=$request->get('codigo_trabajador');
    		$notacompra->PROVEEDOR=$request->get('proveedor');
    		$notacompra->save();

  			

        $CODIGO_COMBUSTIBLE=$request->get('codigo_combustible');
  			$CANTIDAD=$request->get('cantidad'); 
  			$PRECIO=$request->get('precio_compra');

  			$cont=0;
  			while($cont < count($CODIGO_COMBUSTIBLE)){
  				$notacompracombustible= new NotaCompraCombustible();
  				$notacompracombustible->ID_NOTA_COMPRA=$notacompra->ID_NC;
  				$notacompracombustible->CODIGO_COMBUSTIBLE=$CODIGO_COMBUSTIBLE[$cont];
  				$notacompracombustible->CANTIDAD=$CANTIDAD[$cont];
  				$notacompracombustible->PRECIO=$PRECIO[$cont];
          $notacompracombustible->save();
  				$cont=$cont+1;
  			}  		

    		DB::commit();

    	}catch(\Exception $e)
    	{
    		DB::rollback();
    	}

    	return Redirect::to('proceso/compra');
    }	

    public function show($id){

    	$notacompra=DB::table('nota_compra as nc')   	 
            ->join('trabajador as t','nc.CODIGO_TRABAJADOR','=','t.CI_T')
            ->join('nota_compra_combustible as ncc','nc.ID_NC','=','ncc.ID_NOTA_COMPRA')

            ->select('nc.ID_NC','t.CI_T','nc.PROVEEDOR',DB::raw('sum(PRECIO) as total'))
            ->where('nc.ID_NC','=',$id)
            ->groupBy('nc.ID_NC','t.CI_T','nc.PROVEEDOR')
            ->first();
            $notacompracombustibles=DB::table('nota_compra_combustible as ncc')
            ->join('combustible as c','ncc.CODIGO_COMBUSTIBLE','=','c.CODIGO_C')
            ->select('ncc.CANTIDAD','c.CODIGO_C','ncc.PRECIO')
            ->where('ncc.ID_NOTA_COMPRA','=',$id)
            ->get();
    	return view("proceso.compra.show",["notacompra"=>$notacompra,"notacompracombustibles"=>$notacompracombustibles]);
    }

    public function destroy($id){
    	$notacompra=NotaCompra::findOrFail($id);
    
    	$notacompra->update();
    	return Redirect::to('proceso/compra');
    }
}
