@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                  @if (\Session::has('success'))
                  <br>
                      <div class="alert alert-success">
                          {!! \Session::get('success') !!}
                      </div>
                  @endif

                  <div class="panel-body">
                      @if(count($escolas) == 0 and count($escolas) == 0)
                      <div class="alert alert-danger">
                              Não há escolas cadastradas no sistema.
                      </div>
                      @else
                      <br>
                        <div id="tabela" class="table-responsive">
                          <h1> Lista de Escolas </h1><br>
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                  <th>Nº</th>
                                  <th>Nome</th>
                                  <th>descrição</th>
                                  <th>endereco</th>
                                  <th>telefone</th>
                                  <th>modalidade</th>
                                  <th>inep</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($escolas as $escola)
                                <tr>
                                    <td data-title="Nº">{{ $escola->id }}</td>
                                    <td data-title="Nome">{{ $escola->nome }}</td>
                                    <td data-title="descricao">{{ $escola->descricao }}</td>
                                    <td data-title="endereco">{{ $escola->endereco }}</td>
                                    <td data-title="telefone">{{ $escola->telefone }}</td>
                                    <td data-title="modalidade">{{ $escola->modalidade }}</td>
                                    <td data-title="inep">{{ $escola->inep }}</td>
                                    <td>
                            					<a href="/escola/editar/{{$escola->id}}">Editar</a> -
                            					<a href="/escola/mostrar/{{$escola->id}}" class="btn btn-info">Visualizar</a>
                            				</td>
                                </tr>
                              @endforeach

                            </tbody>
                          </table>

                        </div>
                      @endif
                      <a href="/escola/cadastrar"> Adicionar uma Escola</a>
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
