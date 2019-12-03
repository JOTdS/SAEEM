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
        return view('create/CadastrarTurma');
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

        $turma->nome = $request->nome;
        $turma->modalidade = $request->modalidade;
        $turma->descricao = $request->descricao;
        $turma->save();

        return redirect()->route('/turma/listar');
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
        return view("/edit/EditarTurma", ["turma" => $turma]);
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

        $turma->nome = $request->nome;
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
        //
    }
}
