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
Route::auth();
Route::get('/', 'Controller@welcome');

Route::resource('personas', 'PersonasController');
Route::resource('edadcategorias', 'EdadCategoriasController');
Route::resource('idiomas', 'IdiomasController');
Route::resource('ocupaciones', 'OcupacionesController');
Route::resource('territorios', 'TerritoriosController');
Route::resource('diezmos', 'DiezmosController');
Route::resource('iglesias', 'IglesiasController');
Route::resource('pastores', 'PastoresController');