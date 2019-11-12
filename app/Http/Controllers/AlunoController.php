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
        
        $this->validation($request);

        $user->name = $request->nome;
        $user->email = $request->email;
        $user->password = password_hash($request->cpf, PASSWORD_DEFAULT);
        $user->save();

        $pessoa->nome = $request->nome;
        $pessoa->cpf = $request->cpf;
        $pessoa->telefone = $request->telefone;
        $pessoa->endereco = $request->endereco;
        $pessoa->sexo = $request->sexo;
        $pessoa->descricao = $request->descricao;
        $pessoa->usuario_id = $user->id;
        $pessoa->save();

        $aluno->nascimento = $request->nascimento;
        $aluno->filiacao = $request->filiacao;
        $aluno->pessoa_id = $pessoa->id;
        $aluno->save();
        
       /*  nome
        email
        filiacao
        nascimento
        cpf
        telefone
        endereco
        descricao
        sexo */

        $user->save();
        $pessoa->save();
        $aluno->save();
    }

    private function validation(Request $request){
        return $request->validate([
            'nome' => 'required|max:200',
            'email' => 'required|unique:users,email|max:255|email',
            'nascimento' => 'required|date',
            'cpf' => 'required|unique:pessoas|max:11|min:11',
            'endereco' => 'max:255',
            'sexo' => 'required|max:1'
        ]);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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