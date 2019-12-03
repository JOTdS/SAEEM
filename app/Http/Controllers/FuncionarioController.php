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
      return view('create/CadastrarFuncionario');
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

      //cria pessoa
      $pessoa = new Pessoa();
      $request->validate(Pessoa::$rules, Pessoa::$messages);
      $pessoa->nome = $request->nome;
      $pessoa->cpf = $request->cpf;
      $pessoa->telefone = $request->telefone;
      $user->save();    //salva o usuario apos validar cpf e telefone
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
          $echo( "selecione um cargo existente!");
      }

      return redirect('funcionario/listar');
  }




  public function listar()
  {
      $pessoas = \App\Pessoa::where('is_funcionario', '=', 'true')->get();
      return view('show/ListarFuncionario', ['pessoas' => $pessoas]);
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
      $pessoa = Pessoa::where('usuario_id', '=', $user->id)->first();
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
      $funcionario = Funcionario::where('pessoa_id', '=', $pessoa->id)->first();
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
          $pessoa = Pessoa::where('usuario_id', '=',  $user->id)->first();
          $funcionario = Funcionario::where('pessoa_id', '=',  $pessoa->id)->first();
          if ($funcionario->is_gestor == true) {
              //$gestor = Gestor::find($funcionario->id);
              $gestor = \App\Gestor::where('funcionario_id', '=', $funcionario->id)->first();
              return view('/edit/editarFuncionario',['user' => $user, 'pessoa' => $pessoa, 'funcionario' => $funcionario, 'gestor' => $gestor]);
          }else if ($funcionario->is_tecnico == true) {
              //$tecnico = Tecnico::find($funcionario->id);
              $tecnico = \App\Tecnico::where('funcionario_id', '=', $funcionario->id)->first();
              return view('/edit/editarFuncionario',['user' => $user, 'pessoa' => $pessoa, 'funcionario' => $funcionario, 'tecnico' => $tecnico]);
          }else {
            //$professor = Professor::find($funcionario->id);
            $professor = \App\Professor::where('funcionario_id', '=', $funcionario->id)->first();
            return view('/edit/editarFuncionario',['user' => $user, 'pessoa' => $pessoa, 'funcionario' => $funcionario, 'professor' => $professor]);
          }
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */





  public function remover(Request $request){
      $user = User::find($request->id);
      $pessoa = Pessoa::where('usuario_id', '=',  $user->id)->first();
      $funcionario = Funcionario::where('pessoa_id', '=',  $pessoa->id)->first();
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



   public function gerarRelatorios()
   {
       $pessoas = \App\Pessoa::where('is_funcionario', '=', 'true')->get();
       return view('report/RelatorioFuncionario', ['pessoas' => $pessoas]);
   }




   public function gerarRelatorioCargo(Request $request){

      if ($request->cargo == '0') {
          $funcionarios = \App\Funcionario::where('is_gestor', '=', 'true')->get();
      }else if ($request->cargo == '1') {
          $funcionarios = \App\Funcionario::where('is_tecnico', '=', 'true')->get();
      }else if ($request->cargo == '2') {
          $funcionarios = \App\Funcionario::where('is_professor', '=', 'true')->get();
      }else {
        echo "cargo não existe!";
      }

      $pessoas = array();
      foreach ($funcionarios as $funcionario) {
          $pessoa = \App\Pessoa::where('id', '=', $funcionario->pessoa_id )->first();
          array_push($pessoas, $pessoa);
      }

      return view('/report/RelatorioFuncionario', ['pessoas' => $pessoas]);
   }
   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */




    public function gerarRelatorioNome(Request $request){
      $pessoasNome = Pessoa::where('nome', 'ilike', '%' . $request->nome . '%')->get();
            $pessoas = array();
            //$funcionarios = array();
            foreach ($pessoasNome as $pessoaNome) {
              $funcionario = \App\Funcionario::where('pessoa_id', '=', $pessoaNome->id )->first();
              $pessoa = \App\Pessoa::find($funcionario->pessoa_id);
              array_push($pessoas, $pessoa);
            }

       return view('/report/RelatorioFuncionario', ['pessoas' => $pessoas]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
