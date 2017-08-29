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

Route::get('/',                                 'UserController@index')->name('index');

Route::get('/home',                             'HomeController@index')->name('home');

Auth::routes();

// Rutas de Formularios
Route::get('user/changeExchange',               'UserController@changeExchange')->name('changeexchange');
Route::get('user/createCP',                     'UserOrderController@gestionCP')->name('createcp');

// Rutas de Formularios Update
Route::post('user/updateCP',                    'UserOrderController@gestionCP')->name('updatecp');

// Rutas para obtener Data
Route::get('user/getExchange',                  'UserController@getExchange')->name('getexchange');
Route::get('user/getCP',                        'UserOrderController@getCP')->name('getcp');

// Rutas de Acciones de Formulario
Route::post('user/saveExchange',                'UserController@saveExchange')->name('saveexchange');
Route::post('user/saveCP',                      'UserOrderController@saveCP')->name('savecp');

// Rutas de Gestion del Sistema
Route::get('system/viewOrders',                 'UserOrderController@viewOrders')->name('vieworders');

// Rutas de Datatable
Route::post('listOrders',                       'UserOrderController@listOrders')->name('datatable.listorders');