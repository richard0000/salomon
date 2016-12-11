<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/territorio', 'TerritoriosController@getTerritorio');//->middleware('auth:api');
Route::get('/idioma', 'IdiomasController@getIdioma');//->middleware('auth:api');
Route::get('/ocupacion', 'OcupacionesController@getOcupacion');//->middleware('auth:api');
Route::get('/edadcategoria', 'edadCategoriasController@getEdadCategoria');//->middleware('auth:api');
Route::patch('/iglesia', 'Controller@setIglesia');
Route::get('/diezmospormes', 'DiezmosController@diezmosPorMes');