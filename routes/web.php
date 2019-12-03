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

Route::post('/aluno/gravar', 'AlunoController@store')->name('/aluno/gravar')->middleware('auth');
Route::get('/aluno/cadastrar', 'AlunoController@create')->name('/aluno/cadastrar')->middleware('auth');
Route::get('/aluno/listar', 'AlunoController@listar')->name('/aluno/listar')->middleware('auth');
Route::get('/aluno/editar/{id}', 'AlunoController@edit')->name('/aluno/editar')->middleware('auth');
Route::post('/aluno/update', 'AlunoController@update')->name('/aluno/update')->middleware('auth');
Route::get('/aluno/remover/{id}', 'AlunoController@remove')->name('/aluno/remover')->middleware('auth');
Route::get('/aluno/mostrar/{id}', 'AlunoController@show')->name('/aluno/mostrar')->middleware('auth');

//rotas de gestor
Route::post('/gestor/gravar', 'GestorController@store')->name('/gestor/gravar')->middleware('auth');
Route::get('/gestor/cadastrar', 'GestorController@create')->name('/gestor/cadastrar')->middleware('auth');
Route::get('/gestor/listar', 'GestorController@listar')->name('/gestor/listar')->middleware('auth');


//rotas de funcionario
Route::post('/funcionario/gravar', 'FuncionarioController@store')->name('/funcionario/gravar')->middleware('auth');
Route::get('/funcionario/cadastrar', 'FuncionarioController@create')->name('/funcionario/cadastrar')->middleware('auth');
Route::get('/funcionario/listar', 'FuncionarioController@listar')->name('/funcionario/listar')->middleware('auth');
Route::get('/funcionario/editar/{id}', 'FuncionarioController@viewInfo')->name('/funcionario/viewInfo')->middleware('auth');
Route::post('/funcionario/atualizar','FuncionarioController@editar')->name('/funcionario/atualizar')->middleware('auth');
Route::get('/funcionario/remover/{id}', 'FuncionarioController@remover')->name('/funcionario/remover')->middleware('auth');

//rotas de escola
Route::post('/escola/gravar', 'EscolaController@store')->name('/escola/gravar')->middleware('auth');
Route::get('/escola/cadastrar', 'EscolaController@create')->name('/escola/cadastrar')->middleware('auth');
Route::get('/escola/listar', 'EscolaController@listar')->name('/escola/listar')->middleware('auth');
Route::get('/escola/mostrar/{id}', 'EscolaController@show')->name('/escola/mostrar')->middleware('auth');
Route::get('/escola/remover/{id}', 'EscolaController@remover')->name('/escola/remover')->middleware('auth');
