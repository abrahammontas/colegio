<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'auth'], function () {
	Route::resource('inicio', 'HomeController');

	Route::resource('estudiantes', 'EstudiantesController');

	Route::resource('docentes', 'DocentesController');

	Route::resource('estudiantes', 'EstudiantesController');

	Route::resource('tipouser', 'TipoUserController');

	Route::resource('niveles', 'NivelesController');

	Route::resource('cursos', 'CursosController');

	Route::resource('cursos-materias', 'CursoMateriaController');

	Route::resource('comentarios', 'ComentariosController');

	Route::resource('materias', 'MateriasController');

	Route::get('logout', 'Auth\AuthController@getLogout');

	Route::controller('auth', 'Auth\AuthController');
	
	Route::controller('home', 'DashboardController');

	Route::controller('imprimir', 'ImprimirController');

	Route::controller('notas', 'NotasController');

});

// GET route
Route::get('/', array('middleware' => 'guest',
	'uses' => 'Auth\AuthController@getLogin'));


//POST route
Route::post('login', 'Auth\AuthController@postLogin');


// Registration routes...
Route::get('registrar', 'Auth\AuthController@getRegistrar');
Route::post('registrar', 'Auth\AuthController@postRegistrar');