<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Turma_Serie;

class Turma_SerieController extends Controller
{
    /*

    public function index()
    {
        //
    }

    public function create()
    {
        $turmas = \App\Turma::All();
        $series = \App\Serie::All();
        return view('create/CadastrarTurma_Serie',['turmas' => $turmas, 'series' => $series]);
    }

    public function store(Request $request)
    {
        $request->validate(Turma_Serie::$rules, Turma_Serie::$messages);
        $turma = new Turma_Serie();

        $turma->cargaHorario = $request->cargaHorario;
        $turma->turma_id = $request->turma_id;
        $turma->serie_id = $request->serie_id;
        $turma->save();

        return redirect()->route('/turma_serie/listar');
    }

    public function show($id)
    {
        //
    }
    public function listar(){
        $turma_series = \App\Turma_Serie::All();
        return view("/show/ListarTurma_Serie", ['turma_series' => $turma_series]);
    }

    public function edit($id)
    {
        $turma_serie = \App\Turma_Serie::find($id);
        $turmas = \App\Turma::All();
        $series = \App\Serie::All();
        return view("/edit/EditarTurma_Serie", ['turma_serie' => $turma_serie, 'turmas' => $turmas, 'series' => $series]);
    }

    public function update(Request $request)
    {

        $request->validate(Turma_Serie::$rules, Turma_Serie::$messages);

        $turma = \App\Turma_Serie::where('id', '=', $request->id)->first();

        $turma->cargaHorario = $request->cargaHorario;
        $turma->turma_id = $request->turma_id;
        $turma->serie_id = $request->serie_id;
        $turma->save();

        return redirect()->route('/turma_serie/listar');
    }

    public function destroy($id)
    {
        $turma_serie = \App\Turma_Serie::find($id);
        $turma_serie->delete();
        return redirect()->route('/turma_serie/listar');
    }
    */

}
