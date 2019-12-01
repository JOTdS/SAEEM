<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use App\User;
use App\Gestor;
use App\Pessoa;
use App\Tecnico;
use App\Funcionario;
use App\Professor;

class Funcionariocontroller extends Controller
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
      return view('FuncionarioView/CadastrarFuncionario');
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

      //cria usuario
      $user = new User();
      $request->validate(User::$rules, User::$messages);
      $user->name = $request->nome;
      $user->email = $request->email;
      //$user->password = password_hash($request->cpf, PASSWORD_DEFAULT);
      $user->password = $request->senha;
      $user->save();

      //cria pessoa
      $pessoa = new Pessoa();
      $request->validate(Pessoa::$rules, Pessoa::$messages);
      $pessoa->nome = $request->nome;
      $pessoa->cpf = $request->cpf;
      $pessoa->telefone = $request->telefone;
      $pessoa->endereco = $request->endereco;
      $pessoa->sexo = $request->sexo;
      $pessoa->descricao = $request->descricao;
      $pessoa->usuario_id = $user->id;
      $pessoa->is_funcionario = true;
      $pessoa->save();

      //cria funcionario
      $funcionario = new Funcionario();
      $request->validate(Funcionario::$rules, Funcionario::$messages);
      $funcionario->pessoa_id = $pessoa->id;
      //$funcionario->cargo = $request->cargo;

      $cargo = $request->cargo;
      //gestor
      if($cargo == '0'){
        $funcionario->is_gestor = true;
        $funcionario->save();
        $gestor = new Gestor();
        $request->validate(Gestor::$rules, Gestor::$messages);
        $gestor->formacaoGestor = $request->formacaoGestor;
        $gestor->funcionario_id = $funcionario->id;
        $gestor->save();

      //tecnico
    }else if ($cargo == '1') {
        $funcionario->is_tecnico = true;
        $funcionario->save();
        $tecnico = new Tecnico();
        $request->validate(Tecnico::$rules, Tecnico::$messages);
        $tecnico->cargoTecnico = $request->cargoTecnico;
        $tecnico->funcionario_id = $funcionario->id;
        $tecnico->save();

      //professor
    }else if ($cargo == '2'){
        $funcionario->is_professor = true;
        $funcionario->save();
        $professor = new Professor();
        $request->validate(Professor::$rules, Professor::$messages);
        $professor->formacaoProfessor = $request->formacaoProfessor;
        $professor->funcionario_id = $funcionario->id;
        $professor->save();

    }else{
          $echo( "cargo não existe, selecione um cargo existente!");
      }

      return redirect('funcionario/listar');
  }


  public function listar()
  {
      //$gestores = Pessoa::all();
      $usuarios= \App\Funcionario::orderBy('id')->get();
      //$funcionarios = \App\Funcionario::orderBy('id')->get();
      return view('FuncionarioView/ListarFuncionario', ['usuarios' => $usuarios]);
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
  public function editar(Request $request)
  {
      //atualizar usuario
      $user = User::find($request->id);
      $user->name = $request->get('nome');
      $user->email = $request->get('email');
      $user->password = $request->get('senha');
      $user->update();

      //atualizar pessoa
      $pessoa = Pessoa::find($user->id);
      $pessoa->nome = $request->get('nome');
      $pessoa->cpf = $request->get('cpf');
      $pessoa->telefone = $request->get('telefone');
      $pessoa->endereco = $request->get('endereco');
      $pessoa->sexo = $request->get('sexo');
      $pessoa->descricao = $request->get('descricao');
      $pessoa->usuario_id = $user->id;
      $pessoa->is_funcionario = true;
      $pessoa->update();

      //atualizar funcionario
      $funcionario = Funcionario::find($pessoa->id);
      $funcionario->pessoa_id = $pessoa->id;
      $funcionario->update();

      //$funcionario->cargo = $request->cargo;
      if ($funcionario->is_gestor == true) {          //atualizar gestor
          //$gestor = Gestor::find($funcionario->id);
          //$gestor->funcionario_id = $funcionario->id;
          $gestor = \App\Gestor::where('funcionario_id', '=', $funcionario->id)->first();
          $gestor->formacaoGestor = $request->get('formacaoGestor');
          $gestor->update();
      }
      if ($funcionario->is_tecnico == true) {     //atualizar tecnico
          //$tecnico = Tecnico::find($funcionario->id);
          //$tecnico->funcionario_id = $funcionario->id;
          $tecnico = \App\Tecnico::where('funcionario_id', '=', $funcionario->id)->first();
          $tecnico->cargoTecnico = $request->get('cargoTecnico');
          $tecnico->update();
      }
      if ($funcionario->is_professor == true) {         //atualizar professor
          //$professor = Professor::find($funcionario->id);
          //$professor->funcionario_id = $funcionario->id;
          $professor = \App\Professor::where('funcionario_id', '=', $funcionario->id)->first();
          $professor->formacaoProfessor = $request->get('formacaoProfessor');
          $professor->update();
      }

      return redirect("funcionario/listar");
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function viewInfo(Request $request)
  {
          $user = User::find($request->id);
          $pessoa = Pessoa::find($user->id);
          $funcionario = Funcionario::find($pessoa->id);
          if ($funcionario->is_gestor == true) {
              //$gestor = Gestor::find($funcionario->id);
              $gestor = \App\Gestor::where('funcionario_id', '=', $funcionario->id)->first();
              return view('/FuncionarioView/editarFuncionario',['user' => $user, 'pessoa' => $pessoa, 'funcionario' => $funcionario, 'gestor' => $gestor]);
          }else if ($funcionario->is_tecnico == true) {
              //$tecnico = Tecnico::find($funcionario->id);
              $tecnico = \App\Tecnico::where('funcionario_id', '=', $funcionario->id)->first();
              return view('/FuncionarioView/editarFuncionario',['user' => $user, 'pessoa' => $pessoa, 'funcionario' => $funcionario, 'tecnico' => $tecnico]);
          }else {
            //$professor = Professor::find($funcionario->id);
            $professor = \App\Professor::where('funcionario_id', '=', $funcionario->id)->first();
            return view('/FuncionarioView/editarFuncionario',['user' => $user, 'pessoa' => $pessoa, 'funcionario' => $funcionario, 'professor' => $professor]);
          }
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function remover(Request $request){
      $id = $request->id;
      $user = User::find($id);
      $pessoa = Pessoa::find($user->id);
      $funcionario = Funcionario::find($pessoa->id);
      if ($funcionario->is_gestor == true) {
          $gestor = \App\Gestor::where('funcionario_id', '=', $funcionario->id)->first();
          //$gestor = Gestor::find($funcionario->id);
          $gestor->delete();
      }else if ($funcionario->is_tecnico == true) {
          //$tecnico = Tecnico::find($funcionario->id);
          $tecnico = \App\Tecnico::where('funcionario_id', '=', $funcionario->id)->first();
          $tecnico->delete();
      }else {
        //$professor = Professor::find($funcionario->id);
        $professor = \App\Professor::where('funcionario_id', '=', $funcionario->id)->first();
        $professor->delete();
      }

      $funcionario->delete();
      $pessoa->delete();
      $user->delete();

      return redirect("funcionario\listar");
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
}
