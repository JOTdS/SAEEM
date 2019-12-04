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
                      @if(count($turma_series) == 0 and count($turma_series) == 0)
                      <div class="alert alert-danger">
                              Não há turma_series cadastrada no sistema.
                      </div>
                      @else
                      <br>
                        <div id="tabela" class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                  <th>Nº</th>
                                  <th>Nome</th>
                                  <th>Nº Turma</th>
                                  <th>Modalidade Turma</th>
                                  <th>Descrição Turma</th>
                                  <th>Nº Série</th>
                                  <th>Modalidade Série</th>
                                  <th>Descrição Série</th>
                                  <th>Escola</th>
                                  <th>Horário</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($turma_series as $turma_serie)
                                <tr>
                                    <?php $turma = \App\Turma::find($turma_serie->turma_id)?>
                                    <?php $serie = \App\Serie::find($turma_serie->serie_id)?>
                                    <?php $escola = \App\Escola::find($serie->escola_id)?>
                                    <td data-title="Nº">{{ $turma_serie->id }}</td>
                                    <td data-title="Nome">{{ $turma->nome }}</td>
                                    <td data-title="Nº">{{ $turma->id }}</td>
                                    <td data-title="Modalidade_Turma">{{ $turma->modalidade }}</td>
                                    <td data-title="Descricao_Turma">{{ $turma->descricao }}</td>
                                    <td data-title="Nº">{{ $serie->id }}</td>
                                    <td data-title="Modalidade_Turma">{{ $serie->modalidade }}</td>
                                    <td data-title="Descricao_Turma">{{ $serie->descricao }}</td>
                                    <td data-title="Escola">{{ $escola->nome }}</td>
                                    <td data-title="Horario">{{ $turma_serie->cargaHorario }}</td>
                                    <td data-title="Acoes">
                                        <a href="/turma_serie/editar/{{$turma->id}}" class="btn btn-info">Editar</a>
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
