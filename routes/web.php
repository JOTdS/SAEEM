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

//rotas de aluno
Route::post('/aluno/gravar', 'AlunoController@store')->name('/aluno/gravar')->middleware('AuthGestor');
Route::get('/aluno/cadastrar', 'AlunoController@create')->name('/aluno/cadastrar')->middleware('AuthGestor');
Route::get('/aluno/listar', 'AlunoController@listar')->name('/aluno/listar')->middleware('AuthTecnico');
Route::post('/aluno/relatorio', 'AlunoController@relatorio')->name('/aluno/relatorio')->middleware('AuthTecnico');
Route::get('/aluno/editar/{id}', 'AlunoController@edit')->name('/aluno/editar')->middleware('AuthTecnico');
Route::post('/aluno/update', 'AlunoController@update')->name('/aluno/update')->middleware('AuthTecnico');
Route::get('/aluno/remover/{id}', 'AlunoController@destroy')->name('/aluno/remover')->middleware('AuthGestor');
Route::get('/aluno/mostrar/{id}', 'AlunoController@show')->name('/aluno/mostrar')->middleware('AuthProfessor');
Route::get('/aluno/listar/recupera', 'AlunoController@listarRecuperaAluno')->name('/aluno/listar/recupera')->middleware('AuthGestor');
Route::post('/aluno/showRecupera', 'AlunoController@showRecupera')->name('/aluno/showRecupera')->middleware('AuthGestor');
Route::get('/aluno/recuperar/{cpf}', 'AlunoController@recuperar')->name('/aluno/recuperar')->middleware('AuthGestor');

//rotas de funcionario
Route::post('/funcionario/gravar', 'FuncionarioController@store')->name('/funcionario/gravar')->middleware('AuthGestor');
Route::get('/funcionario/cadastrar', 'FuncionarioController@create')->name('/funcionario/cadastrar')->middleware('AuthGestor');
Route::get('/funcionario/listar', 'FuncionarioController@listar')->name('/funcionario/listar')->middleware('AuthTecnico');
Route::get('/funcionario/editar/{id}', 'FuncionarioController@edit')->name('/funcionario/editar')->middleware('AuthTecnico');
Route::get('/funcionario/visualizar/{id}', 'FuncionarioController@show')->name('/funcionario/visualizar')->middleware('AuthTecnico');
Route::post('/funcionario/atualizar', 'FuncionarioController@update')->name('/funcionario/atualizar')->middleware('AuthTecnico');
Route::get('/funcionario/remover/{id}', 'FuncionarioController@remover')->name('/funcionario/remover')->middleware('AuthGestor');
Route::get('/funcionario/relatorios', 'FuncionarioController@gerarRelatorios')->name('/funcionario/relatorios')->middleware('AuthTecnico');
Route::post('/funcionario/relatorioCargo', 'FuncionarioController@gerarRelatorioCargo')->name('/funcionario/relatorioCargo')->middleware('AuthTecnico');
Route::post('/funcionario/relatorioNome', 'FuncionarioController@gerarRelatorioNome')->name('/funcionario/relatorioNome')->middleware('AuthTecnico');

//rotas de escola
Route::post('/escola/gravar', 'EscolaController@store')->name('/escola/gravar')->middleware('AuthAdministrador');
Route::get('/escola/cadastrar', 'EscolaController@create')->name('/escola/cadastrar')->middleware('AuthAdministrador');
Route::get('/escola/listar', 'EscolaController@listar')->name('/escola/listar')->middleware('AuthAdministrador');
Route::get('/escola/editar/{id}', 'EscolaController@viewInfo')->name('/escola/viewInfo')->middleware('AuthAdministrador');
Route::get('/escola/mostrar/{id}', 'EscolaController@show')->name('/escola/mostrar')->middleware('AuthAdministrador');
Route::post('/escola/atualizar', 'EscolaController@editar')->name('/escola/atualizar')->middleware('AuthAdministrador');
Route::get('/escola/remover/{id}', 'EscolaController@remover')->name('/escola/remover')->middleware('AuthAdministrador');

//rotas de Turmas
Route::post('/turma/gravar', 'TurmaController@store')->name('/turma/gravar')->middleware('AuthTecnico');
Route::get('/turma/cadastrar', 'TurmaController@create')->name('/turma/cadastrar')->middleware('AuthTecnico');
Route::get('/turma/listar', 'TurmaController@listar')->name('/turma/listar')->middleware('AuthProfessor');
Route::get('/turma/editar/{id}', 'TurmaController@edit')->name('/turma/editar')->middleware('AuthTecnico');
Route::get('/turma/mostrar/{id}', 'TurmaController@show')->name('/turma/mostrar')->middleware('AuthProfessor');
Route::get('/turma/remover/{id}', 'TurmaController@destroy')->name('/turma/remover')->middleware('AuthTecnico');
Route::post('/turma/update', 'TurmaController@update')->name('/turma/update')->middleware('AuthTecnico');

//rotas de Series
Route::post('/serie/gravar', 'SerieController@store')->name('/serie/gravar')->middleware('AuthTecnico');
Route::get('/serie/cadastrar', 'SerieController@create')->name('/serie/cadastrar')->middleware('AuthTecnico');
Route::get('/serie/listar', 'SerieController@listar')->name('/serie/listar')->middleware('AuthProfessor');
Route::get('/serie/editar/{id}', 'SerieController@edit')->name('/serie/editar')->middleware('AuthTecnico');
Route::get('/serie/mostrar/{id}', 'SerieController@show')->name('/serie/mostrar')->middleware('AuthProfessor');
Route::get('/serie/remover/{id}', 'SerieController@destroy')->name('/serie/remover')->middleware('AuthTecnico');
Route::post('/serie/update', 'SerieController@update')->name('/serie/update')->middleware('AuthTecnico');

/*
//rotas de Turma_Serie
Route::post('/turma_serie/gravar', 'Turma_SerieController@store')->name('/turma_serie/gravar')->middleware('AuthAdministrador');
Route::get('/turma_serie/cadastrar', 'Turma_SerieController@create')->name('/turma_serie/cadastrar')->middleware('AuthAdministrador');
Route::get('/turma_serie/listar', 'Turma_SerieController@listar')->name('/turma_serie/listar')->middleware('AuthAdministrador');
Route::get('/turma_serie/editar/{id}', 'Turma_SerieController@edit')->name('/turma_serie/editar')->middleware('AuthAdministrador');
Route::get('/turma_serie/mostrar/{id}', 'Turma_SerieController@show')->name('/turma_serie/mostrar')->middleware('AuthAdministrador');
Route::get('/turma_serie/remover/{id}', 'Turma_SerieController@destroy')->name('/turma_serie/remover')->middleware('AuthAdministrador');
Route::post('/turma_serie/update', 'Turma_SerieController@update')->name('/turma_serie/update')->middleware('AuthAdministrador');
*/

//rotas de disciplina
Route::post('/disciplina/gravar', 'DisciplinaController@store')->name('/disciplina/gravar')->middleware('AuthAdministrador');
Route::get('/disciplina/cadastrar', 'DisciplinaController@create')->name('/disciplina/cadastrar')->middleware('AuthAdministrador');
Route::get('/disciplina/listar', 'DisciplinaController@listar')->name('/disciplina/listar')->middleware('AuthAdministrador');
Route::get('/disciplina/editar/{id}', 'DisciplinaController@edit')->name('/disciplina/editar')->middleware('AuthAdministrador');
Route::get('/disciplina/visualizar/{id}', 'DisciplinaController@show')->name('/disciplina/visualizar')->middleware('AuthAdministrador');
Route::post('/disciplina/atualizar', 'DisciplinaController@update')->name('/disciplina/atualizar')->middleware('AuthAdministrador');
Route::get('/disciplina/remover/{id}', 'DisciplinaController@remover')->name('/disciplina/remover')->middleware('AuthAdministrador');
Route::get('/disciplina/relatorios', 'DisciplinaController@gerarRelatorios')->name('/disciplina/relatorios')->middleware('AuthAdministrador');
Route::post('/disciplina/relatorioNome', 'DisciplinaController@gerarRelatorioNome')->name('/disciplina/relatorioNome')->middleware('AuthAdministrador');

//rotas de avaliacao
Route::post('/avaliacao/gravar/{id,id2}', 'AvaliacaoController@store')->name('/avaliacao/gravar')->middleware('AuthAdministrador');
Route::get('/avaliacao/cadastrar', 'AvaliacaoController@create')->name('/avaliacao/cadastrar')->middleware('AuthAdministrador');
Route::get('/avaliacao/listar', 'AvaliacaoController@listar')->name('/avaliacao/listar')->middleware('AuthAdministrador');
Route::get('/avaliacao/editar/{id}', 'AvaliacaoController@edit')->name('/avaliacao/editar')->middleware('AuthAdministrador');
Route::get('/avaliacao/visualizar/{id}', 'AvaliacaoController@show')->name('/avaliacao/visualizar')->middleware('AuthAdministrador');
Route::post('/avaliacao/atualizar', 'AvaliacaoController@update')->name('/avaliacao/atualizar')->middleware('AuthAdministrador');
Route::get('/avaliacao/remover/{id}', 'AvaliacaoController@remover')->name('/avaliacao/remover')->middleware('AuthAdministrador');
Route::get('/avaliacao/relatorios', 'AvaliacaoController@gerarRelatorios')->name('/avaliacao/relatorios')->middleware('AuthAdministrador');
Route::post('/avaliacao/relatorioNome', 'AvaliacaoController@gerarRelatorioNome')->name('/avaliacao/relatorioNome')->middleware('AuthAdministrador');
