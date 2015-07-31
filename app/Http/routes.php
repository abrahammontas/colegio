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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('inicio', 'HomeController');

Route::resource('estudiantes', 'EstudiantesController');

Route::resource('docentes', 'DocentesController');

Route::resource('estudiantes', 'EstudiantesController');

Route::resource('tipodocentes', 'TipoDocenteController');

Route::resource('notas', 'NotasController');

Route::resource('niveles', 'NivelesController');

Route::resource('cursos', 'CursosController');

Route::resource('comentarios', 'ComentariosController');

Route::resource('materias', 'MateriasController');

Route::resource('login', 'LoginController');

