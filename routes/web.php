<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//***********  RUTAS NOVEDADES ANIMALES - JHORMAN */
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/novedades', 'NovedadAnimalController');

Route::get('/novedadAnimalBuscar/{cadena}', 'NovedadAnimalController@buscarNovedades');

Route::get('/agregarNovedadAnimal', 'NovedadAnimalController@agregarNovedadAnimal');

Route::get('/novedadAnimalBuscarVaca/{cadena}', 'NovedadAnimalController@buscarNovedadesVaca');

Route::get('/contarNovedades', 'NovedadAnimalController@contarNovedades');

//************* RUTAS PRODUCCION - FUAN */

Route::resource('/produccion', 'ProduccionController');

Route::get('/produccionAgregar', 'ProduccionController@agregar');

Route::get('/produccionBuscar/{cadena}', 'ProduccionController@buscarProduccion');

Route::get('/vacaBuscar/{cadena}', 'ProduccionController@buscarVaca');

Route::get('/contarProduccion', 'ProduccionController@contarProduccion');

Route::view('/graficas', 'paginas.graficas');

Route::get('/buscarGraficoMonthYear/{cadena}', 'ProduccionController@buscarMonthYear');

//************ RUTAS USUARIOS - WILFREN */

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/usuarios','UsuariosController');

Route::view('/usuariosRegistrar', 'paginas.usuariosRegistrar');

Route::get('/buscarUsuario/{cadena}', 'usuariosController@buscarUsuario');

Route::get('/contarUsuarios', 'UsuariosController@contarUsuarios');

//*********** RUTAS VACAS - DANIELA */

Route::resource('/animales','AnimalController');

Route::get('/animalesAgregar','AnimalController@animalAgregar');

Route::get('/buscarAnimales/{cadena}','AnimalController@buscarAnimales');

Route::get('/contarAnimales', 'AnimalController@contarAnimales');

//********** RUTAS DESPACHOS - JUAN */

Route::resource('/despachos', 'despachosController');

Route::get('/buscarDestinos/{id}','destinosController@buscarDestinos');

Route::get('/despachoAgregar','despachosController@nuevoDespacho');

Route::get('/despachosBuscar/{cadena}','despachosController@buscarDespacho');

Route::get('/contarDespachos','despachosController@contarDespachos');

Route::get('/despachosBuscarFecha/{cadena}','despachosController@buscarDespachoFecha');

//********** RUTAS NOVEDADES PRODUCCION - JOHAN */

Route::get('/produccionBuscar/{id}','produccionController@buscarProduccion');

Route::get('/novedadProduccionAgregar', 'NovedadProduccionController@nuevaNovedad');

Route::get('/buscarParaNovedad/{fecha}', 'NovedadProduccionController@buscarParaNovedad');

Route::resource('/novedadesProduccion', 'NovedadProduccionController');

Route::get('/buscarNovedadesProduccion/{texto}','NovedadProduccionController@buscarNovedades');

Route::get('/contarNovedadesProduccion', 'NovedadProduccionController@contarNovedadesProduccion');