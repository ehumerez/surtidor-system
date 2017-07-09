<?php

namespace sisSurtidor\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use sisSurtidor\Http\Requests\LoginFormRequest;


class LoginController extends Controller
{
	public function index(){
		return view('login.user.index');


	}
	
    public function store(){

    	$a = trim($_POST['usuario']);;

    	$conexion=  mysqli_connect("localhost", "root", "", "dbsurtidor");
    	$correo = trim($_POST['usuario']);
	    $clave = trim($_POST['contraseña']);

	    $consulta = "SELECT * FROM usuario
	                 WHERE USUARIO = '$correo' and 
	                 CONTRASENA = '$clave'";
	                
	    $r = mysqli_query( $conexion,$consulta); //consulta si los valores son correctos
    	$result = mysqli_num_rows($r); // si devuelve alguna fila significa que es correcto     
	  	 if($result>0){   
	  	 	session_start();

////////////////////////////insertando bitacora/////////////////////////////////////////
	  	 	$consulta_idB = "SELECT MAX(ID_B) FROM bitacora";
	  	 	$r_id = mysqli_query( $conexion,$consulta_idB); 
	  	 	$fila_id=  mysqli_fetch_row($r_id); 
	  	 	$id_b=$fila_id[0] + 1;
	  	 	
	  	 	$_SESSION['id']=$id_b;
	  	 	$_SESSION['fecha'] = date("j/ n/ Y"); 
	  	 	$_SESSION['hora'] = date("H:i:s");
	  	 	$_SESSION['logueado'] = 'SI';
	  	 	$_SESSION['username'] = $correo; 

	  	 	mysqli_query($conexion,"INSERT INTO bitacora (ID_B,INICIO,FIN,ACTOR)"
                . " VALUES ( '" .$_SESSION['id']. "' ,'" . $_SESSION['hora'] . "','null','" . $_SESSION['username'] ."');");
///////////////////////////fin de insertar bitacora////////////////////////////////////

	        $fila=  mysqli_fetch_row($r); 

	        if($fila[3]=='2000'){
	           return Redirect::to('almacen/combustible');
	        }

	    	if($fila[3]==='2002'){
	    		return Redirect::to('operador/vehiculo');
	    	}

	        
    	}
    	return Redirect::to('login');

    }
    public function finalisar(){

	
		session_start();
		$horafin=date("H:i:s");
		$consulta="UPDATE bitacora SET FIN='$horafin' WHERE ID_B='" .$_SESSION['id']. "' ";
		$conexion=  mysqli_connect("localhost", "root", "", "dbsurtidor");
		mysqli_query($conexion,$consulta);

        return Redirect::to('login');
    }
}
