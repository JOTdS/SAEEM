@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                  @if (\Session::has('success'))
                  <br>
                      <div class="alert alert-damege">
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
                            <tr>
                                <td data-title="Nº">{{ $pessoa->id }}</td>
                                <td data-title="Nome">{{ $pessoa->nome }}</td>
                                <td data-title="cpf">{{ $pessoa->cpf }}</td>
                                <td data-title="telefone">{{ $pessoa->telefone }}</td>
                                <td data-title="endereco">{{ $pessoa->endereco }}</td>
                                <td class="right" data-title="Acoes">
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ExemploModalCentralizado" >
                                        Recuperar
                                    </button>
                                    <!-- Modal remover -->
                                    <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="TituloModalCentralizado">Tem certeza que deseja recuperar?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>

                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">NÃO</button>
                                            <a href="/aluno/recuperar/{{$pessoa->cpf}}" class="btn btn-danger">SIM</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
