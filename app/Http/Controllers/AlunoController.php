<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use App\User;
use App\Aluno;
use App\Pessoa;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\IsFalse;

class AlunoController extends Controller
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
        return view('create/CadastrarAluno');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aluno = new Aluno();
        $pessoa = new Pessoa();

        $request->validate(Pessoa::$rules, Pessoa::$messages);
        $pessoa->nome = $request->nome;
        $pessoa->cpf = $request->cpf;
        $pessoa->telefone = $request->telefone;
        $pessoa->endereco = $request->endereco;
        $pessoa->sexo = $request->sexo;
        $pessoa->is_aluno = true;
        $pessoa->descricao = $request->descricao;
        $pessoa->save();

        $request->validate(Aluno::$rules, Aluno::$messages);
        $aluno->nascimento = $request->nascimento;
        $aluno->filiacao = $request->filiacao;
        $aluno->pessoa_id = $pessoa->id;
        $aluno->save();


        return redirect()->route('/aluno/listar');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoa = \App\Pessoa::find($id);
        $aluno = \App\Aluno::where('pessoa_id', '=', $pessoa->id)->first();
        return view("/show/MostrarAluno", ["pessoa" => $pessoa, "aluno" => $aluno]);
    }
    public function listar(){
        $alunos = \App\Pessoa::where('is_aluno', '=', 'true')->get();
        return view("/show/ListarAlunos", ["alunos" => $alunos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$pessoa = \App\Pessoa::where('usuario_id', '=', $id)->first();
        //$aluno = \App\Aluno::where('pessoa_id', '=', $pessoa->id)->first();
        $pessoa = \App\Pessoa::find($id);
        $aluno = \App\Aluno::find($pessoa->id);
        return view("/edit/EditarAluno", ["pessoa" => $pessoa, "aluno" => $aluno]);
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
        //$pessoa = \App\Pessoa::where('usuario_id', '=', $request->id)->first();
        //$aluno = \App\Aluno::where('pessoa_id', '=', $pessoa->id)->first();
        $pessoa = \App\Pessoa::find($request->id);
        $aluno = \App\Aluno::find($pessoa->id);

        $rulesPessoas = [
            'nome' => 'required|max:100|string',
            'cpf' => 'required', 'unique:pessoas,cpf'.$pessoa->cpf, '|max:11|min:11',
            'telefone' => 'required',
            'endereco' => 'max:255|string',
            'descricao' => 'max:255|string',
            'sexo' => 'required|max:1|string'
        ];

        $request->validate(Aluno::$rules, Aluno::$messages);
        $request->validate($rulesPessoas, Pessoa::$messages);

        $pessoa->nome = $request->nome;
        $pessoa->cpf = $request->cpf;
        $pessoa->telefone = $request->telefone;
        $pessoa->endereco = $request->endereco;
        $pessoa->sexo = $request->sexo;
        $pessoa->descricao = $request->descricao;
        $pessoa->save();

        $aluno->nascimento = $request->nascimento;
        $aluno->filiacao = $request->filiacao;
        $aluno->save();

        return redirect()->route('/aluno/listar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aluno = \App\Aluno::withoutTrashed()->where('id', '=', $id)->first();
        $pessoa = \App\Pessoa::withoutTrashed()->where('id', '=', $aluno->pessoa_id)->first();

        $aluno->delete();
        $pessoa->delete();

        return redirect()->route('/aluno/listar');
    }

    public function showRecupera(Request $request){
        $pessoa = \App\Pessoa::onlyTrashed()->where('cpf', '=', $request->cpf)->first();
        if((!empty($pessoa)) and ($pessoa->is_aluno)){
            $aluno = \App\Aluno::onlyTrashed()->where('pessoa_id', '=', $pessoa->id)->first();
            return view("/show/RecuperaAluno", ["pessoa" => $pessoa, "aluno" => $aluno]);
        }
        session()->flash('alert-danger', 'Aluno não encontrado. Favor verificar os dados.');
        return view("/show/RecuperarAlunos");

    }

    public function recuperar($cpf){
        $pessoa = \App\Pessoa::onlyTrashed()->where('cpf', '=', $cpf)->first();
        if((!empty($pessoa)) and ($pessoa->is_aluno)){
            $aluno = \App\Aluno::onlyTrashed()->where('pessoa_id', '=', $pessoa->id)->first();
            $pessoa->restore();
            $aluno->restore();

            session()->flash('alert-success', 'Aluno recuperado com sucesso.');
            return redirect()->route('/aluno/listar');
        }else if((!$pessoa->is_aluno)){
            session()->flash('alert-danger', 'Pessoa encontrada não é um aluno. Favor verificar os dados.');
            return view("/show/RecuperarAlunos");
        }
        session()->flash('alert-danger', 'Pessoa não encontrada. Favor verificar os dados.');
        return view("/show/RecuperarAlunos");
    }

    public function listarRecuperaAluno(){
        return view("/show/RecuperarAlunos");
    }

    public function relatorio(Request $request){
        $pesq = '%'.$request->pesquisar.'%';
        $alunos = \App\Pessoa::where($request->tipo, "LIKE",  $pesq)->get();
        return view("/show/ListarAlunos", ["alunos" => $alunos]);
    }
}
