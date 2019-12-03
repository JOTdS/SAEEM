<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use App\User;
use App\Aluno;
use App\Pessoa;

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
        $user = new User();

        $request->validate(User::$rules, User::$messages);
        $user->name = $request->nome;
        $user->email = $request->email;
        $user->password = password_hash($request->cpf, PASSWORD_DEFAULT);


        $request->validate(Pessoa::$rules, Pessoa::$messages);
        $pessoa->nome = $request->nome;
        $pessoa->cpf = $request->cpf;
        $pessoa->telefone = $request->telefone;
        $pessoa->endereco = $request->endereco;
        $pessoa->sexo = $request->sexo;
        $pessoa->descricao = $request->descricao;
        $user->save();   //sempre deve salvar user depois dos campos obrigatorios ou campos que precisam de validação
        $pessoa->usuario_id = $user->id;
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
        $pessoas = \App\Pessoa::orderBy('id')->get();
        return view("/show/ListarAlunos", ["pessoas" => $pessoas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::find($id);
        $pessoa = \App\Pessoa::where('usuario_id', '=', $user->id)->first();
        $aluno = \App\Aluno::where('pessoa_id', '=', $pessoa->id)->first();
        //$pessoa = \App\Pessoa::find($user->id);
        //$aluno = \App\Aluno::find($pessoa->id);
        return view("/edit/EditarAluno", ["user" => $user, "pessoa" => $pessoa, "aluno" => $aluno]);
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

        $user = \App\User::find($request->id);
        $pessoa = \App\Pessoa::where('usuario_id', '=', $user->id)->first();
        $aluno = \App\Aluno::where('pessoa_id', '=', $pessoa->id)->first();

        $rulesPessoas = [
            'nome' => 'required|max:100|string',
            'cpf' => 'required', 'unique:pessoas,cpf'.$pessoa->cpf, '|max:11|min:11',
            'telefone' => 'required',
            'endereco' => 'max:255|string',
            'descricao' => 'max:255|string',
            'sexo' => 'required|max:1|string'
        ];

        $rulesUser = [
            'email' => 'required','unique:users,email'.$user->email,'max:100|min:4|email',
        ];

        $request->validate(Aluno::$rules, Aluno::$messages);
        $request->validate($rulesPessoas, Pessoa::$messages);
        $request->validate($rulesUser, User::$messages);
        $user->name = $request->nome;
        $user->email = $request->email;
        $user->password = password_hash($request->cpf, PASSWORD_DEFAULT);

        $pessoa->nome = $request->nome;
        $pessoa->cpf = $request->cpf;
        $pessoa->telefone = $request->telefone;
        $pessoa->endereco = $request->endereco;
        $pessoa->sexo = $request->sexo;
        $pessoa->descricao = $request->descricao;

        $aluno->nascimento = $request->nascimento;
        $aluno->filiacao = $request->filiacao;

        $user->save();
        $pessoa->save();
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
        //
    }
}
