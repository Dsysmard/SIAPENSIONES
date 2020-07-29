<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('catalogos/pensionado', 'PensionadosController');
Route::get('pensionado/destroy/{id}', ['as' => 'pensionado/destroy', 'uses' => 'PensionadosController@destroy']);
Route::post('pensionado/search', ['as' => 'pensionado/search', 'uses'=>'PensionadosController@search']);

Route::resource('catalogos/empleado', 'EmpleadosController');
Route::get('empleado/destroy/{id}', ['as' => 'empleado/destroy', 'uses' => 'EmpleadosController@destroy']);
Route::post('empleado/search', ['as' => 'empleado/search', 'uses'=>'EmpleadosController@search']);

Route::resource('catalogos/pension', 'PensionController');
Route::get('pension/destroy/{id}', ['as' => 'pension/destroy', 'uses' => 'PensionController@destroy']);
Route::post('pension/search', ['as' => 'pension/search', 'uses'=>'PensionController@search']);

Route::resource('catalogos/colonia', 'ColoniasController');
Route::get('colonia/destroy/{id}', ['as' => 'colonia/destroy', 'uses' => 'ColoniasController@destroy']);
Route::post('colonia/search', ['as' => 'colonia/search', 'uses'=>'ColoniasController@search']);

Route::resource('catalogos/localidad', 'LocalidadController');
Route::get('localidad/destroy/{id}', ['as' => 'localidad/destroy', 'uses' => 'LocalidadController@destroy']);
Route::post('localidad/search', ['as' => 'localidad/search', 'uses'=>'LocalidadController@search']);

Route::resource('catalogos/municipio', 'MunicipiosController');
Route::get('municipio/destroy/{id}', ['as' => 'municipio/destroy', 'uses' => 'MunicipiosController@destroy']);
Route::post('municipio/search', ['as' => 'municipio/search', 'uses'=>'MunicipiosController@search']);

Route::resource('catalogos/estado', 'EstadoController');
Route::get('estado/destroy/{id}', ['as' => 'estado/destroy', 'uses' => 'EstadoController@destroy']);
Route::post('estado/search', ['as' => 'estado/search', 'uses'=>'EstadoController@search']);

Route::resource('catalogos/entidad', 'EntidadController');
Route::get('entidad/destroy/{id}', ['as' => 'entidad/destroy', 'uses' => 'EntidadController@destroy']);
Route::post('entidad/search', ['as' => 'entidad/search', 'uses'=>'EntidadController@search']);

Route::resource('catalogos/estatus', 'EstatusController');
Route::get('estatus/destroy/{id}', ['as' => 'estatus/destroy', 'uses' => 'EstatusController@destroy']);
Route::post('estatus/search', ['as' => 'estatus/search', 'uses'=>'EstatusController@search']);

Route::resource('catalogos/estadocivil', 'EstadoCivilController');
Route::get('estadocivil/destroy/{id}', ['as' => 'estadocivil/destroy', 'uses' => 'EstadoCivilController@destroy']);
Route::post('estadocivil/search', ['as' => 'ecivil/search', 'uses'=>'EstadoCivilController@search']);

Route::resource('catalogos/bajas', 'BajasController');
Route::get('bajas/destroy/{id}', ['as' => 'bajas/destroy', 'uses' => 'BajasController@destroy']);
Route::post('bajas/search', ['as' => 'bajas/search', 'uses'=>'BajasController@search']);
