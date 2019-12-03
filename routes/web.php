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
Route::get('/funcionario/editar/{id}', 'FuncionarioController@edit')->name('/funcionario/editar')->middleware('auth');
Route::get('/funcionario/visualizar/{id}', 'FuncionarioController@show')->name('/funcionario/visualizar')->middleware('auth');
Route::post('/funcionario/atualizar','FuncionarioController@update')->name('/funcionario/atualizar')->middleware('auth');
Route::get('/funcionario/remover/{id}', 'FuncionarioController@remover')->name('/funcionario/remover')->middleware('auth');
Route::get('/funcionario/relatorios', 'FuncionarioController@gerarRelatorios')->name('/funcionario/relatorios')->middleware('auth');
Route::post('/funcionario/relatorioCargo', 'FuncionarioController@gerarRelatorioCargo')->name('/funcionario/relatorioCargo')->middleware('auth');
Route::post('/funcionario/relatorioNome', 'FuncionarioController@gerarRelatorioNome')->name('/funcionario/relatorioNome')->middleware('auth');

//rotas de escola
Route::post('/escola/gravar', 'EscolaController@store')->name('/escola/gravar')->middleware('auth');
Route::get('/escola/cadastrar', 'EscolaController@create')->name('/escola/cadastrar')->middleware('auth');
Route::get('/escola/listar', 'EscolaController@listar')->name('/escola/listar')->middleware('auth');
Route::get('/escola/mostrar/{id}', 'EscolaController@show')->name('/escola/mostrar')->middleware('auth');
Route::get('/escola/remover/{id}', 'EscolaController@remover')->name('/escola/remover')->middleware('auth');


//rotas de Turmas
Route::post('/turma/gravar', 'TurmaController@store')->name('/turma/gravar')->middleware('auth');
Route::get('/turma/cadastrar', 'TurmaController@create')->name('/turma/cadastrar')->middleware('auth');
Route::get('/turma/listar', 'TurmaController@listar')->name('/turma/listar')->middleware('auth');
Route::get('/turma/editar/{id}', 'TurmaController@edit')->name('/turma/editar')->middleware('auth');
Route::get('/turma/mostrar/{id}', 'TurmaController@show')->name('/turma/mostrar')->middleware('auth');
Route::get('/turma/remover/{id}', 'TurmaController@remover')->name('/turma/remover')->middleware('auth');
Route::post('/turma/update', 'TurmaController@update')->name('/turma/update')->middleware('auth');


//rotas de Series
Route::post('/serie/gravar', 'SerieController@store')->name('/serie/gravar')->middleware('auth');
Route::get('/serie/cadastrar', 'SerieController@create')->name('/serie/cadastrar')->middleware('auth');
Route::get('/serie/listar', 'SerieController@listar')->name('/serie/listar')->middleware('auth');
Route::get('/serie/editar/{id}', 'SerieController@edit')->name('/serie/editar')->middleware('auth');
Route::get('/serie/mostrar/{id}', 'SerieController@show')->name('/serie/mostrar')->middleware('auth');
Route::get('/serie/remover/{id}', 'SerieController@remover')->name('/serie/remover')->middleware('auth');
Route::post('/serie/update', 'SerieController@update')->name('/serie/update')->middleware('auth');
