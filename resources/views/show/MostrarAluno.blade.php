@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                  <div class="panel-body">
                        <div class="card-header">{{ __($pessoa->nome) }}</div>
                        <table width="100%" class="table table-hover" border=1 cellspacing=0 cellpadding=0 bordercolor="666633">
                                <thead>
                                <tr bgcolor="#B0E0E6" align="center">
                                    <th>CPF</th>
                                    <th>Telefone</th>
                                    <th>Endereço</th>
                                    <th>Descrição</th>
                                    <th>Sexo</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-title="Cpf">{{ $pessoa->cpf }}</td>
                                        <td data-title="Telefone">{{ $pessoa->telefone }}</td>
                                        <td data-title="Endereco">{{ $pessoa->endereco }}</td>
                                        <td data-title="Descricao">{{ $pessoa->descricao }}</td>
                                        <td data-title="Sexo">{{ $pessoa->sexo }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        <table width="100%" class="table table-hover" border=1 cellspacing=0 cellpadding=0 bordercolor="666633">
                            <thead>

                            <tr bgcolor="#B0E0E6" colspan=3 align="center">
                                <th>Id</th>
                                <th>Nascimento</th>
                                <th>Filiação</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-title="Id">{{ $aluno->id }}</td>
                                    <td data-title="Nome">{{ $aluno->nascimento }}</td>
                                    <td data-title="Descrição">{{ $aluno->filiacao }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <a href="/aluno/editar/{{$pessoa->usuario_id}}" class="right btn btn-info">Editar</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
