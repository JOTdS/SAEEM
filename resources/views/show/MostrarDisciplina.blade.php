@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">{{ __('Informações da Disciplina') }}</div>
                <div class="card-body">
                  <div class="panel-body">
                        <div class="card-header">{{ __($disciplina->nome) }}</div>
                        <table width="100%" class="table table-hover" border=1 cellspacing=0 cellpadding=0 bordercolor="666633">
                                <thead>
                                <tr bgcolor="#B0E0E6" align="center">
                                    <th>Nº</th>
                                    <th>NOME</th>
                                    <th>DESCRIÇÃO</th>
                                    <th>TURMA</th>
                                    <th>ANO</th>
                                    <th>TURNO</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-title="Id">{{ $disciplina->id }}</td>
                                        <td data-title="Nome">{{ $disciplina->nome }}</td>
                                        <td data-title="Descricao">{{ $disciplina->descricao }}</td>
                                        @foreach ($disciplina_turmas as $index => $disciplina_turma)
                                          <td data-title="Turma"> {{ $turmasResultado[$index]->nome }}</td>
                                          <td data-title="Ano">{{ $disciplina_turma->ano }}</td>
                                          <td data-title="Turno">{{ $disciplina_turma->turno }}</td>
                                        </tr>

                                        @endforeach
                                </tbody>
                            </table>
                        <a href="/disciplina/relatorios/" class="btn btn-primary">Voltar</a>
                        <a href="/disciplina/editar/{{$disciplina->id}}" class="btn btn-info">Editar</a>
                        <!-- <a href="/funcionario/remover/{{$disciplina->id}}" class="btn btn-danger" style="text-align:right;">Remover</a> -->

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ExemploModalCentralizado">
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
                                <a href="/disciplina/remover/{{$disciplina->id}}" class="btn btn-danger">SIM</a>
                              </div>
                            </div>
                          </div>
                        </div>


                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
