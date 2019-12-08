<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Disciplina_TurmaController extends Controller
{
    // public function create()
    // {
    //     $turmas = \App\Turma::all();
    //     return view('create/CadastrarDisciplina', ["turmas" => $turmas]);
    // }
    //
    //
    // public function store(Request $request)
    // {
    //
    //     //cria a relacao disciplina_turma
    //     $disciplina_turma = new Disciplina_Turma();
    //     $request->validate(Disciplina_Turma::$rules, Disciplina_Turma::$messages);
    //     $disciplina_turma->ano = $request->ano;
    //     $disciplina_turma->turno = $request->turno;
    //     $disciplina_turma->disciplina_id = $disciplina->id;
    //     $disciplina_turma->turma_id = $request->turma_id;
    //     $disciplina_turma->save();
    //
    //     return redirect('disciplina/listar');
    // }
}
