<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disciplina;

class DisciplinaController extends Controller
{

    public function create()
    {
        return view('create/CadastrarDisciplina');
    }


    public function store(Request $request)
    {
        //cria disciplina
        $disciplina = new Disciplina();
        $request->validate(Disciplina::$rules, Disciplina::$messages);
        $disciplina->nome = $request->nome;
        $disciplina->descricao = $request->descricao;
        $disciplina->save();

        return redirect('disciplina/listar');
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
