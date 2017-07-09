<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('almacen.combustible.create');
});

Route::auth();

Route::resource('operador/vehiculo','VehiculoController');
Route::resource('operador/factura','FacturaController');
Route::resource('operador/persona','PersonaController');

Route::resource('mostrar/','CombustibleController@most');
Route::resource('login','LoginController');

Route::resource('finalisar','LoginController@finalisar');

Route::resource('almacen/combustible','CombustibleController');
Route::resource('almacen/inventario','InventarioController');
Route::resource('almacen/tanque','TanqueController');
Route::resource('almacen/dispenser','DispenserController');
Route::resource('almacen/manguera','MangueraController');
Route::resource('almacen/tanquedispenser','TanqueDispenserController');

Route::resource('perfil/personaadmi','PersonaAdmiController');
Route::resource('perfil/trabajador','TrabajadorController');
Route::resource('perfil/trabajadorturno','TrabajadorTurnoController');
Route::resource('perfil/turno','TurnoController');
Route::resource('perfil/vehiculoadmi','VehiculoAdmiController');

Route::resource('premio/clientef','ClienteFController');
Route::resource('premio/vehiculoafiliado','VehiculoAfiliadoController');
Route::resource('premio/regalo','RegaloController');
Route::resource('premio/cliente_premio','Cliente_PremioController');

Route::resource('proceso/facturaadmi','FacturaAdmiController');
Route::resource('proceso/compra','NotaCompraController');

Route::resource('admusuario/user','UsuarioController');
Route::resource('admusuario/grupo','GrupoController');
Route::resource('admusuario/bitacora','BitacoraController');