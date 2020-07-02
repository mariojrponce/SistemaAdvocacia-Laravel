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

Route::get('/cliente/criar', 'ClienteController@criar')->name('cliente.criar');//Página de criação de clientes

Route::post('/cliente/salvar', 'ClienteController@salvar')->name('cliente.salvar');//ação de salvar clientes

Route::get('/cliente/editar/{id}', 'ClienteController@editar')->name('cliente.editar');//ação de edição clientes

Route::get('/cliente/deletar/{id}', 'ClienteController@deletar')->name('cliente.deletar');//ação de deletar clientes

Route::post('/cliente/atualizar', 'ClienteController@atualizar')->name('cliente.atualizar');//ação de atualizar clientes
