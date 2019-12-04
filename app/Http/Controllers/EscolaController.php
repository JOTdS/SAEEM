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
      $request->validate(Escola::$rules, Escola::$messages);
      $escola->nome = $request->nome;
      $escola->descricao = $request->descricao;
      $escola->endereco = $request->endereco;
      $escola->telefone = $request->telefone;
      $escola->modalidade = $request->modalidade;
      $escola->inep = $request->inep;
      $escola->save();

      return redirect('/escola/listar');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $escola = \App\Escola::find($id);
      return view("/show/MostrarEscola", ["escola" => $escola]);
  }

  public function listar()
  {
     $escolas = \App\Escola::orderBy('id')->get();
      return view('/show/ListarEscola', ['escolas' => $escolas]);
  }

 /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function editar(Request $resquest)
  {
      //atualizar escola
      $escola = Escola::find($id);
      $escola->nome = $resquest->get('nome');
      $escola->descricao = $resquest->get('descricao');
      $escola->endereco = $resquest->get('endereco');
      $escola->telefone = $resquest->get('telefone');
      $escola->modalidade = $resquest->get('modalidade');
      $escola->inep = $resquest->get('inep');
      $escola->update();

      return redirect("escola/listar");
  }

   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function remover($id){
      $escola = \App\Escola::find($id);
      $escola->delete();

      return redirect("escola\listar");
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
}
