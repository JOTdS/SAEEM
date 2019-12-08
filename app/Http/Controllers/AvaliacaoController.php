<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Avaliacao;
use App\Disciplina;

class AvaliacaoController extends Controller
{
    public function create()
    {
      $alunos = \App\Aluno::all();
      $disciplinas = \App\Disciplina::all();
      return view('create/CadastrarAvaliacao', ["alunos" => $alunos, "disciplinas" => $disciplinas]);
    }


    public function store(Request $request)
    {
        $avaliacao = new Aluno();
        $request->validate(Avaliacao::$rules, Avaliacao::$messages);

        //cria disciplina
        $avaliacao = new Avaliacao();
        $request->validate(Avaliacao::$rules, Avaliacao::$messages);
        $avaliacao->data = $request->data;
        $avaliacao->nota = $request->nota;
        $avaliacao->descricao = $request->descricao;
        $avaliacao->save();

        return redirect('avaliacao/listar');
    }


    public function show(Request $request)
    {
        $disciplina = \App\Disciplina::find($request->id);
        return view("/show/MostrarDisciplina", ["disciplina" => $disciplina]);
    }


    public function listar(){
        $disciplinas = \App\Disciplina::orderBy('id')->get();
        return view("/show/ListarDisciplina", ["disciplinas" => $disciplinas]);
    }


    public function edit(Request $request)
    {
        $disciplina = \App\Disciplina::find($request->id);
        return view("/edit/EditarDisciplina", ["disciplina" => $disciplina]);
    }


    public function update(Request $request)
    {
        $disciplina = \App\Disciplina::find($request->id);
        $disciplina->nome = $request->get('nome');
        $disciplina->descricao = $request->get('descricao');
        $disciplina->update();
        return redirect()->route('/disciplina/listar');
    }


    public function remover(Request $request){
      $disciplina = \App\Disciplina::find($request->id);
      $disciplina->delete();
      return redirect("disciplina\listar");
  }


  public function gerarRelatorios()
   {
     $disciplinas = \App\Disciplina::orderBy('id')->get();
     return view("/report/RelatorioDisciplina", ["disciplinas" => $disciplinas]);
   }



    public function gerarRelatorioNome(Request $request){
      $disciplinas = Disciplina::where('nome', 'ilike', '%' . $request->nome . '%')->get();
       return view('/report/RelatorioDisciplina', ['disciplinas' => $disciplinas]);
    }
}
