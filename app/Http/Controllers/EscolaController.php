<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use App\User;
use App\Escola;
class EscolaController extends Controller
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
      return view('create/CadastrarEscola');
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $escola = new Escola();
      $user = new User();
      $request->validate(Escola::$rules, Escola::$messages);
      $request->validate(User::$rules, User::$messages);
      $user->name = $request->nome;
      $user->email = $request->email;
      $user->password = password_hash($request->cpf, PASSWORD_DEFAULT);
      $escola->nome = $request->nome;
      $escola->descricao = $request->descricao;
      $escola->endereco = $request->endereco;
      $escola->telefone = $request->telefone;
      $user->save();
      $escola->modalidade = $request->modalidade;
      $escola->inep = $request->inep;
      $escola->save();
      return redirect('escola/listar');
  }

  public function listar()
  {
      //$escolas = Escola::all();
     $escolas = \App\Escola::orderBy('id')->get();
      return view('show/ListarEscola', ['escolas' => $escolas]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request)
  {
      $escolas = Escola::all();
      return view('show/ListarEscola', ['escolas' => $escolas]);
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
