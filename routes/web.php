<?php

use Illuminate\Support\Facades\Route;

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


//Gerenciamento de CLIENTES
Route::get('/cliente', 'ClienteController@listagem')->name('cliente.listagem');//Exibe todos os clientes

Route::get('/cliente/criar', 'ClienteController@criar')->name('cliente.criar');//Página de criação de documentos

Route::post('/cliente/salvar', 'ClienteController@salvar')->name('cliente.salvar');//ação de salvar documentos
