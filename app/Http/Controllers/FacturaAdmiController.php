<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use sisSurtidor\FacturaAdmi;
use Illuminate\Support\Facades\Redirect;
use sisSurtidor\Http\Requests\FacturaAdmiFormRequest;
use DB;

class FacturaAdmiController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$facturas=DB::table('factura as f')
            ->join('persona as p','p.CI_NIT_P','=','f.CI_PERSONA')
            ->join('combustible as c','c.CODIGO_C','=','f.DETALLE')
            ->select('f.ID_MANGUERA','f.CODIGO_F','f.CANTIDAD_COMBUSTIBLE','f.FECHA','f.MONTO_DINERO','f.DETALLE','f.HORA','f.CI_PERSONA','f.CI_TRABAJADOR','f.PLACA_V','p.NOMBRE','p.APELLIDO_PATERNO','p.APELLIDO_MATERNO','c.DESCRIPCION')		
    		->where('CODIGO_F','LIKE','%'.$query.'%')
            ->orderBy('CODIGO_F','desc')
    		->paginate(7);
    		return view('proceso.facturaadmi.index',["facturas"=>$facturas,"searchText"=>$query]);
    	}

    }

    public function create(){

   		$combustibles=DB::table('combustible')->get();
        $trabajadores=DB::table('trabajador as t')
        ->join('persona as p','t.CI_T','=','p.CI_NIT_P')
        ->select('t.TIPO','t.CI_T','p.NOMBRE','p.APELLIDO_PATERNO','p.APELLIDO_MATERNO')
        ->where('t.TIPO','=','O')
        ->get();
        $personas=DB::table('persona')->get();
        $vehiculos=DB::table('vehiculo')->get();
        $mangueras=DB::table('manguera')->get();
        $inventarios=DB::table('inventario')->get();
    	return view("proceso.facturaadmi.create",["combustibles"=>$combustibles,"trabajadores"=>$trabajadores,"vehiculos"=>$vehiculos,"personas"=>$personas,"inventarios"=>$inventarios,"mangueras"=>$mangueras]);
    }

    public function store(FacturaAdmiFormRequest $request){
    	$factura=new FacturaAdmi;
    	$factura->CANTIDAD_COMBUSTIBLE=$request->get('cantidad_combustible');
    	$factura->FECHA=date("j/ n/ Y"); ;  
        $factura->DETALLE=$request->get('detalle');
        if($request->get('detalle')=='1000'){
            $cal=$request->get('cantidad_combustible')*2;
             $factura->MONTO_DINERO=$cal;
        }
        if($request->get('detalle')=='1001'){
            $cal=$request->get('cantidad_combustible')*3;
             $factura->MONTO_DINERO=$cal;
        }
        if($request->get('detalle')=='1002'){
            $cal=$request->get('cantidad_combustible')*1;
             $factura->MONTO_DINERO=$cal;
        }
        $factura->HORA=date("H:i:s");
        $factura->CI_PERSONA=$request->get('ci_persona');
        $factura->CI_TRABAJADOR=$request->get('ci_trabajador');
        $factura->PLACA_V=$request->get('placa_v');
        $factura->ID_MANGUERA=$request->get('id_manguera');
    	$factura->save();


        session_start();
        $conexion=  mysqli_connect("localhost", "root", "", "dbsurtidor");
        mysqli_query($conexion,"INSERT INTO detalle_bitacora (ID_DB,ID_B,ACCION,TABLA,HORA)"
                    . " VALUES ( 'null','" .$_SESSION['id']. "' ,'INSERTA','FACTURA','" . date("H:i:s") ."');");
        

    	return Redirect::to('proceso/facturaadmi');
        
    }	

    public function show($id){
    	return view("proceso.facturaadmi.show",["facturaadmi"=>FacturaAdmi::findOrFail($id)]);
    }

    public function edit($id){
    	return view("proceso.facturaadmi.edit",["facturaadmi"=>FacturaAdmi::findOrFail($id)]);
    }

    public function update(FacturaAdmiFormRequest $request , $id){

    	$factura=FacturaAdmi::findOrFail($id);

    	$factura->CANTIDAD=$request->get('cantidad');
    	$factura->DETALLE=$request->get('color');
    	$factura->HORA=$request->get('hora');

    	$factura->update();
    	return Redirect::to('proceso/facturaadmi');
    }
    public function destroy($id){
    	$factura=FacturaAdmi::findOrFail($id);
    	$factura->CONDICION='0';
    	$factura->update();
    	return Redirect::to('proceso/facturaadmi');
    }
}
