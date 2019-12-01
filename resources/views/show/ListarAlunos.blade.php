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
                      @if(count($pessoas) == 0 and count($pessoas) == 0)
                      <div class="alert alert-danger">
                              Não há pessoa cadastrada no sistema.
                      </div>
                      @else
                      <br>
                        <div id="tabela" class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                  <th>Nº</th>
                                  <th>Nome</th>
                                  <th>cpf</th>
                                  <th>telefone</th>
                                  <th>endereco</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($pessoas as $pessoa)
                                <tr>
                                    <td data-title="Nº">{{ $pessoa->id }}</td>
                                    <td data-title="Nome">{{ $pessoa->nome }}</td>
                                    <td data-title="cpf">{{ $pessoa->cpf }}</td>
                                    <td data-title="telefone">{{ $pessoa->telefone }}</td>
                                    <td data-title="endereco">{{ $pessoa->endereco }}</td>
                                    <td data-title="Acoes">
                                        <a href="/aluno/editar/{{$pessoa->usuario_id}}" class="btn btn-info">Editar</a>
                                        <a href="/aluno/mostrar/{{$pessoa->id}}" class="btn btn-info">Visualizar</a>
                                    </td>
                                </tr>
                              @endforeach

                            </tbody>
                          </table>
                        </div>
                      @endif
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
