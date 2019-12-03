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



//rotas de funcionario
Route::post('/funcionario/gravar', 'FuncionarioController@store')->name('/funcionario/gravar')->middleware('auth');
Route::get('/funcionario/cadastrar', 'FuncionarioController@create')->name('/funcionario/cadastrar')->middleware('auth');
Route::get('/funcionario/listar', 'FuncionarioController@listar')->name('/funcionario/listar')->middleware('auth');
Route::get('/funcionario/editar/{id}', 'FuncionarioController@viewInfo')->name('/funcionario/viewInfo')->middleware('auth');
Route::post('/funcionario/atualizar','FuncionarioController@editar')->name('/funcionario/atualizar')->middleware('auth');
Route::get('/funcionario/remover/{id}', 'FuncionarioController@remover')->name('/funcionario/remover')->middleware('auth');
Route::get('/funcionario/relatorios', 'FuncionarioController@gerarRelatorios')->name('/funcionario/relatorios')->middleware('auth');
Route::post('/funcionario/relatorioCargo', 'FuncionarioController@gerarRelatorioCargo')->name('/funcionario/relatorioCargo')->middleware('auth');
Route::post('/funcionario/relatorioNome', 'FuncionarioController@gerarRelatorioNome')->name('/funcionario/relatorioNome')->middleware('auth');
