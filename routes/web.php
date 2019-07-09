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
Route::get('/', 'ClientesController@index')->name('clientes');
Route::any('/clientes/novo', 'ClientesController@novo')->name('clientesNovo');
Route::any('/clientes/add', 'ClientesController@salvar')->name('clientesAdd');
Route::any('/clientes/editar/{id}', 'ClientesController@editar')->name('clientesEditar');
Route::any('/clientes/excluir/{id}', 'ClientesController@excluir')->name('clientesExcluir');

