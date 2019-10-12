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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// GRUPO DE APIS CON AUTENTICACION NORMAL
Route::group(['middleware' => 'auth'], function () {
    Route::name('api.')->prefix('api')->group(function () {
        //GRUPO DE APIS CLIENTES 
        Route::post('cliente/store', 'ClienteController@store')
            ->name('cliente.store');

        Route::post('cliente/update/{id}', 'ClienteController@update')
            ->name('cliente.update');

        Route::delete('cliente/destroy/{id}', 'ClienteController@destroy')
            ->name('cliente.destroy');

        Route::get('cliente/index', 'ClienteController@index')
            ->name('cliente.index');


        //GRUPO DE APIS VENTAS
        Route::get('venta/index', 'VentaController@index')
            ->name('venta.index');

        Route::post('venta/store', 'VentaController@store')
            ->name('venta.store');


        Route::delete('venta/anular/{id}', 'VentaController@anular')
            ->name('venta.anular');
    });
});
