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
                  @if (\Session::has('alert-danger'))
                  <br>
                      <div class="alert alert-danger">
                          {!! \Session::get('alert-danger') !!}
                      </div>
                  @endif
                  <div class="panel-body">
                      @if(count($turmas) == 0 and count($turmas) == 0)
                      <div class="alert alert-danger">
                              Não há turmas cadastrada no sistema.
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
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ExemploModalCentralizado" >
                                          Remover
                                        </button>
                                        <!-- Modal remover -->
                                        <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="TituloModalCentralizado">Tem certeza que deseja remover?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">NÃO</button>
                                                <a href="/turma/remover/{{$turma->id}}" class="btn btn-danger">SIM</a>
                                              </div>
                                            </div>
                                          </div>
                                        </div>  
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
