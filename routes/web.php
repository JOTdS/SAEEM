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

Route::post('/aluno/gravar', 'AlunoController@store')->name('/aluno/gravar');
Route::get('/aluno/cadastrar', 'AlunoController@create')->name('/aluno/cadastrar');
Route::get('/aluno/listar', 'AlunoController@listar')->name('/aluno/listar');

//rotas de gestor
Route::post('/gestor/gravar', 'GestorController@store')->name('/gestor/gravar');
Route::get('/gestor/cadastrar', 'GestorController@create')->name('/gestor/cadastrar');
Route::get('/gestor/listar', 'GestorController@listar')->name('/gestor/listar');
