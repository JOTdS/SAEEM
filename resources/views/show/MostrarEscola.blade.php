@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                  <div class="panel-body">
                        <div class="card-header">{{ __($escola->nome) }}</div>
                        <table width="100%" class="table table-hover" border=1 cellspacing=0 cellpadding=0 bordercolor="666633">
                                <thead>
                                <tr bgcolor="#B0E0E6" align="center">
                                    <th>Nº</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Endereco</th>
                                    <th>Telefone</th>
                                    <th>Modalidade</th>
                                    <th>Inep</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-title="Nº">{{ $escola->id }}</td>
                                        <td data-title="Nome">{{ $escola->nome }}</td>
                                        <td data-title="descricao">{{ $escola->descricao }}</td>
                                        <td data-title="endereco">{{ $escola->endereco }}</td>
                                        <td data-title="telefone">{{ $escola->telefone }}</td>
                                        <td data-title="modalidade">{{ $escola->modalidade }}</td>
                                        <td data-title="inep">{{ $escola->inep }}</td>
                                    </tr>
                                </tbody>
                            </table>

                        <a href="/escola/editar/{{$escola->id}}" class="btn btn-info">Editar</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
