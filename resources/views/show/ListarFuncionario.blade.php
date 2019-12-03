@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">{{ __('Listar Funcionários') }}</div>
                <div class="card-body">
                  @if (\Session::has('success'))
                  <br>
                      <div class="alert alert-success">
                          {!! \Session::get('success') !!}
                      </div>
                  @endif
                  <div class="panel-body">
                      @if(count($pessoas) == 0)
                          <div class="alert alert-danger">
                                  Não há funcionários cadastrados no sistema.
                          </div>
                      @else
                        <br>
                          <div id="tabela" class="table-responsive">
                            <h1> Lista de Funcionários </h1><br>
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>NOME</th>
                                    <th>CPF</th>
                                    <th>TELEFONE</th>
                                    <th>ENDEREÇO</th>
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
                                      <td>
                                        <a href="/funcionario/visualizar/{{$pessoa->usuario_id}}" class="btn btn-primary">Ver</a>
                              					<a href="/funcionario/editar/{{$pessoa->usuario_id}}" class="btn btn-info">Editar</a>
                              					<!-- <a href="/funcionario/remover/{{$pessoa->usuario_id}}" class="btn btn-danger">Remover</a> -->
                                        <!-- Botão para acionar modal -->

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
                                                          <a href="/funcionario/remover/{{$pessoa->usuario_id}}" class="btn btn-danger">SIM</a>
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
                      <a href="/funcionario/cadastrar" class="btn btn-primary"> Adicionar Funcionário </a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
