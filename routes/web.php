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
    return view('auth.login');
})->name('/');

Route::resource('/empresas', 'EmpresaController');
Route::resource('/empleados','EmpleadoController');
Route::post('import', 'EmpleadoController@import')->name('import');
Route::post('/txt','EmpleadoController@creartxt')->name('creartxt');
Route::get('/gentxt','EmpleadoController@gentxt');
Route::get('/descargar','EmpleadoController@descargar')->name('descargar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
