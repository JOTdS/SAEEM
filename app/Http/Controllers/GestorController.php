<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use App\User;
use App\Gestor;
use App\Pessoa;
use App\Funcionario;

class GestorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('create/CadastrarGestor');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $pessoa = new Pessoa();
      $funcionario = new Funcionario();
      $gestor = new Gestor();
      $user = new User();

      $request->validate(Gestor::$rules, Gestor::$messages);
      $request->validate(Pessoa::$rules, Pessoa::$messages);
      $request->validate(User::$rules, User::$messages);
      //$request->validate(Funcionario::$rules, Funcionario::$messages);

      $user->name = $request->nome;
      $user->email = $request->email;
      $user->password = password_hash($request->cpf, PASSWORD_DEFAULT);
      $user->save();

      $pessoa->nome = $request->nome;
      $pessoa->cpf = $request->cpf;
      $pessoa->telefone = $request->telefone;
      $pessoa->endereco = $request->endereco;
      $pessoa->sexo = $request->sexo;
      $pessoa->descricao = $request->descricao;
      $pessoa->usuario_id = $user->id;
      $pessoa->save();

      $funcionario->pessoa_id = $pessoa->id;
      $funcionario->is_gestor = true;
      $funcionario->save();

      $gestor->formacao = $request->formacao;
      $gestor->funcionario_id = $funcionario->id;
      $gestor->save();

      return redirect('gestor/listar');
  }

  public function listar()
  {
      //$gestores = Pessoa::all();
     $pessoas = \App\Pessoa::orderBy('id')->get();
      return view('show/ListarGestor', ['pessoas' => $pessoas]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request)
  {
      $gestores = Gestor::all();
      return view('show/ListarGestor', ['gestores' => $gestores]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

}
