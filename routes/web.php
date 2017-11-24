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
    return view('auth/login');
});

Auth::routes();

Route::get('/usuarios', 'HomeController@index'); //listar
Route::delete('usuario/delete/{id}', 'ProductController@destroy'); //Eliminar
Route::get('usuario/edit/{id}', 'ProductController@edit'); //Editar
Route::post('usuario/update/{id}', 'ProductController@update'); //Actualizar edición
