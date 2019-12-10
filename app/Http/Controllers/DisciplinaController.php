<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turma;
use App\Disciplina;
use App\Disciplina_Turma;

class DisciplinaController extends Controller
{

    public function create()
    {
        $turmas = \App\Turma::all();
        return view('create/CadastrarDisciplina', ["turmas" => $turmas]);
    }


    public function store(Request $request)
    {
        //cria disciplina
        $disciplina = new Disciplina();
        $request->validate(Disciplina::$rules, Disciplina::$messages);
        $disciplina->nome = $request->nome;
        $disciplina->descricao = $request->descricao;
        $disciplina->save();

        //cria a relacao disciplina_turma
        $disciplina_turma = new Disciplina_Turma();
        $request->validate(Disciplina_Turma::$rules, Disciplina_Turma::$messages);
        $disciplina_turma->ano = $request->ano;
        $disciplina_turma->turno = $request->turno;
        $disciplina_turma->disciplina_id = $disciplina->id;
        $disciplina_turma->turma_id = $request->turma_id;
        $disciplina_turma->save();

        return redirect('disciplina/listar');
    }


    public function show(Request $request)
    {
        $disciplina = \App\Disciplina::find($request->id);
        $disciplina_turmas = \App\Disciplina_Turma::where('disciplina_id', '=', $disciplina->id )->get();

        $turmasResultado = array();
        foreach ($disciplina_turmas as $disciplina_turma) {
          $turma = \App\Turma::where('id', '=', $disciplina_turma->turma_id )->first();
          array_push($turmasResultado, $turma);
        }

        return view("/show/MostrarDisciplina", ['disciplina' => $disciplina, 'disciplina_turmas' => $disciplina_turmas, 'turmasResultado' => $turmasResultado]);
    }




    public function listar(){
        $disciplinas = \App\Disciplina::orderBy('id')->get();

        $disciplina_turmasResultado = array();
        $turmasResultado = array();

        foreach ($disciplinas as $disciplina) {
          $disciplina_turma = \App\Disciplina_Turma::where('disciplina_id', '=', $disciplina->id )->first();
          $turma = \App\Turma::where('id', '=', $disciplina_turma->turma_id )->first();
          array_push($turmasResultado, $turma);
          array_push($disciplina_turmasResultado, $disciplina_turma);
        }

        return view("/show/ListarDisciplina", ['disciplinas' => $disciplinas, 'disciplina_turmasResultado' => $disciplina_turmasResultado, 'turmasResultado' => $turmasResultado]);
    }




    public function edit(Request $request)
    {
        $disciplina = \App\Disciplina::find($request->id);
        $disciplina_turma = \App\Disciplina_Turma::where('disciplina_id', '=', $disciplina->id )->first();
        $turmaResultado = \App\Turma::where('id', '=', $disciplina_turma->turma_id )->get();

        return view("/edit/EditarDisciplina", ['disciplina' => $disciplina, 'disciplina_turma' => $disciplina_turma, 'turmaResultado' => $turmaResultado]);
    }


    public function update(Request $request)
    {
        $disciplina = \App\Disciplina::find($request->id);
        $disciplina->nome = $request->get('nome');
        $disciplina->descricao = $request->get('descricao');
        $disciplina->update();

        $disciplina_turma = \App\Disciplina_Turma::where('disciplina_id', '=', $disciplina->id )->first();
        $disciplina_turma->ano = $request->get('ano');
        $disciplina_turma->turno = $request->get('turno');
        $disciplina_turma->update();

        $turma = \App\Turma::where('id', '=', $disciplina_turma->turma_id )->first();
        $turma->nome = $request->get('turma');
        $turma->update();


        return redirect()->route('/disciplina/listar');
    }


    public function remover(Request $request){
      $disciplina = \App\Disciplina::find($request->id);
      $disciplina_turma = \App\Disciplina_Turma::where('disciplina_id', '=', $disciplina->id )->first();
      //$turma = \App\Turma::where('id', '=', $disciplina_turma->turma_id )->first();

      $disciplina_turma->delete();
      //$turma->delete();
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
