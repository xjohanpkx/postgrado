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
Route::get("/buscar/noticia/inicio","InicioController@buscarnoticia");
Route::get("/buscar/noticia/{id}","InicioController@buscarnoticiaid");
Route::get("/buscar/tesis/inicio","InicioController@buscar");
Route::post("/actu","TesiController@actualizar");
Route::get("indexb","TesiController@indexb");
Route::get("indexc","InicioController@indexc");
Route::get("indexbnoti","NoticiaController@indexb");
Route::get("indexbinicio","InicioController@indexb");
Route::get("/mirar/descargar/{id}","TesiController@descargardoc");
Route::get("/pdf/descargar/{id}","InicioController@descargardoc");
Route::get("/tesis/descargar/{id}","InicioController@descargartesi");
Route::get("buscar/tesis/categoria","TesiController@categoriabus");
Route::get("buscar/tesis/inicio/categoria","InicioController@categoriabus");
Route::put("file/{tesi}","TesiController@updatefile");
Route::put("filenoti/{noticia}","NoticiaController@updatefile");
Route::get('/',"InicioController@index");
Route::get('/info',"InicioController@info");
Route::get("/noticia/incio","InicioController@noticiainicio");
Route::post("/loadata","InicioController@load_data");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
