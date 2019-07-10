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

//Route::resource('tesis','TesiController');
//Route::resource('productos','ProdcutosControlle');

Route::resources([
    'tesis' => 'TesiController',
    'inicio' => 'InicioController',
    'noticia'=> 'NoticiaController'
]);
Route::get("/mirar","TesiController@mirar");
Route::get("/mirarnot","NoticiaController@mirar");
Route::get("/mirar/buscar","TesiController@mirabuscador");
Route::get("/buscar/tesis","TesiController@buscar");
Route::get("/buscar/noticia","NoticiaController@buscar");
Route::post("/actu","TesiController@actualizar");
Route::get("indexb","TesiController@indexb");
Route::get("/mirar/descargar/{id}","TesiController@descargardoc");
Route::get("buscar/tesis/categoria","TesiController@categoriabus");
Route::put("file/{tesi}","TesiController@updatefile");

Route::get('/',"InicioController@index");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
