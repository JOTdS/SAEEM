@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">{{ __('Listar Disciplinas') }}</div>
                <div class="card-body">
                  @if (\Session::has('success'))
                  <br>
                      <div class="alert alert-success">
                          {!! \Session::get('success') !!}
                      </div>
                  @endif
                  <div class="panel-body">
                      @if(count($disciplinas) == 0 or count($disciplina_turmasResultado)==0)
                          <div class="alert alert-danger">
                                  Não há Disciplina cadastrada no sistema.
                          </div>
                      @else
                        <br>
                          <div id="tabela" class="table-responsive">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>NOME</th>
                                    <th>DESCRIÇÃO</th>
                                    <th>TURMA</th>
                                    <th>ANO</th>
                                    <th>TURNO</th>
                                </tr>
                              </thead>
                              <tbody>

                                  @foreach ($disciplinas as $index => $disciplina)
                                  <tr>
                                      <td data-title="Nº">{{ $disciplina->id }}</td>
                                      <td data-title="Nome">{{ $disciplina->nome }}</td>
                                      <td data-title="Descrição">{{ $disciplina->descricao }}</td>
                                      <td data-title="Turma">{{ $turmasResultado[$index]->nome}}</td>
                                      <!-- <td data-title="Turma">
                                      @foreach ($turmasResultado as $turma)
                                      @if($disciplina_turmasResultado[$index]->turma_id == $turma->id)
                                        {{ $turma->nome.' ' }}
                                        @endif
                                      @endforeach
                                      </td> -->
                                      <td data-title="Ano">{{ $disciplina_turmasResultado[$index]->ano }}</td>
                                      <td data-title="Turno">{{ $disciplina_turmasResultado[$index]->turno }}</td>

                                      <td>
                                        <a href="/disciplina/visualizar/{{$disciplina->id}}" class="btn btn-primary">Ver</a>
                              					<a href="/disciplina/editar/{{$disciplina->id}}" class="btn btn-info">Editar</a>

                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ExemploModalCentralizado">
                                          Remover
                                        </button>
                                        <!-- Modal/popup remover -->
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
                                                <a href="/disciplina/remover/{{$disciplina->id}}" class="btn btn-danger">SIM</a>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- Fim do modal -->
                              				</td>
                                  </tr>
                              @endforeach

                              </tbody>
                            </table>
                          </div>
                        @endif
                      <!-- <a href="/disciplina/cadastrar" class="btn btn-primary"> Adicionar Disciplina </a> -->
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
