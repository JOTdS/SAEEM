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
                      @if(count($series) == 0 and count($series) == 0)
                      <div class="alert alert-danger">
                              Não há séries cadastrada no sistema.
                      </div>
                      @else
                      <br>
                        <div id="tabela" class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                  <th>Nº</th>
                                  <th>Modalidade</th>
                                  <th>Descricao</th>
                                  <th>Escola</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($series as $serie)
                                <tr>
                                    <td data-title="Nº">{{ $serie->id }}</td>
                                    <td data-title="Modalidade">{{ $serie->modalidade }}</td>
                                    <td data-title="Descricao">{{ $serie->descricao }}</td>
                                    <?php $escola = \App\Escola::find($serie->escola_id)?>
                                    <td data-title="Escola">{{ $escola->nome }}</td>
                                    <td class="right" data-title="Acoes">
                                        <a href="/serie/editar/{{$serie->id}}" class="btn btn-info">Editar</a>
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
                                                <a href="/serie/remover/{{$serie->id}}" class="btn btn-danger">SIM</a>
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
