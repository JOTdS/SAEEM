<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Serie;
use \App\Escola;

class SerieController extends Controller
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
        $escolas = \App\Escola::all();
        return view('create/CadastrarSerie', ["escolas" => $escolas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Serie::$rules, Serie::$messages);
        $serie = new Serie();

        $serie->nome = $request->nome;
        $serie->modalidade = $request->modalidade;
        $serie->descricao = $request->descricao;
        $serie->escola_id = $request->escola_id;
        $serie->save();

        return redirect()->route('/serie/listar');
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
        $series = \App\Serie::All();
        return view("/show/ListarSeries", ["series" => $series]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serie = \App\Serie::where('id', '=', $id)->first();
        $escolas = \App\Escola::All();
        return view("/edit/EditarSerie", ["serie" => $serie, 'escolas' => $escolas]);
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
        $request->validate(Serie::$rules, Serie::$messages);
        $serie = \App\Serie::where('id', '=', $request->id)->first();

        $serie->modalidade = $request->modalidade;
        $serie->nome = $request->nome;
        $serie->descricao = $request->descricao;
        $serie->escola_id = $request->escola_id;
        $serie->save();

        return redirect()->route('/serie/listar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turma_serie = \App\Turma_Serie::onlyTrashed()->where('serie_id', $id)->get();
        if(empty($turma_serie)){
            $serie = \App\Turma::find($id);
            $serie->delete();          
        }else{
            session()->flash('alert-danger', 'A serie é dependência de Turma_Serie.');
        }
        return redirect()->route('/serie/listar');
    }
}
