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
                      @if(count($turmas) == 0 and count($turmas) == 0)
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
                                  <th>Modalidade</th>
                                  <th>Descrição</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($turmas as $turma)
                                <tr>
                                    <td data-title="Nº">{{ $turma->id }}</td>
                                    <td data-title="Nome">{{ $turma->nome }}</td>
                                    <td data-title="Modalidade">{{ $turma->modalidade }}</td>
                                    <td data-title="Descricao">{{ $turma->descricao }}</td>
                                    <td data-title="Acoes">
                                        <a href="/turma/editar/{{$turma->id}}" class="btn btn-info">Editar</a>
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
