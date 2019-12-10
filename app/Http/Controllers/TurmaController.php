<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Turma;

class TurmaController extends Controller
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
        $series = \App\Serie::All();
        return view('create/CadastrarTurma', ['series' => $series]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Turma::$rules, Turma::$messages);
        $turma = new Turma();

        $serie = \App\Serie::where('nome', '=', $request->serie_id)->get();

        if(!empty($serie)){
            $serie = \App\Serie::where('nome', '=', $request->serie_id)->first();
            $turma->nome = $request->nome;
            $turma->modalidade = $request->modalidade;
            $turma->descricao = $request->descricao;
            $turma->serie_id = $serie->id;
            $turma->save();

            session()->flash('alert-success', 'Turma cadastrada com sucesso.');
            return redirect()->route('/turma/listar');
        }else{
            session()->flash('alert-danger', 'A série informada não está cadastrada.');
        }
        session()->flash('alert-danger','Verifique os dados do cadastro de Turmas.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function listar(){
        $turmas = \App\Turma::All();
        return view("/show/ListarTurmas", ["turmas" => $turmas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $turma = \App\Turma::where('id', '=', $id)->first();
        $series = \App\Serie::All();
        return view("/edit/EditarTurma", ["turma" => $turma, 'series' => $series]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate(Turma::$rules, Turma::$messages);

        $turma = \App\Turma::where('id', '=', $request->id)->first();
        $serie = \App\Serie::where('nome', '=', $request->serie_id)->first();

        $turma->nome = $request->nome;
        $turma->serie_id = $request->serie_id;
        $turma->modalidade = $request->modalidade;
        $turma->descricao = $request->descricao;
        $turma->save();

        return redirect()->route('/turma/listar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turma_serie = \App\Turma_Serie::onlyTrashed()->where('turma_id', $id)->get();
        if(empty($turma_serie)){
            $turma = \App\Turma::find($id);
            $turma->delete();
        }else{
            session()->flash('alert-danger', 'A turma é dependência de Turma_Serie.');
        }
        return redirect()->route('/turma/listar');
    }
}
