@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                  <div class="panel-body">
                        <div class="card-header">{{ __($user->name) }}</div>
                        <table width="100%" class="table table-hover" border=1 cellspacing=0 cellpadding=0 bordercolor="666633">
                                <thead>
                                <tr bgcolor="#B0E0E6" align="center">
                                    <th>Nº</th>
                                    <th>NOME</th>
                                    <th>E-MAIL</th>
                                    <th>SENHA</th>
                                    <th>CPF</th>
                                    <th>TELEFONE</th>
                                    <th>ENDEREÇO</th>
                                    <th>SEXO</th>
                                    <th>DESCRIÇÃO</th>
                                    @if($funcionario->is_gestor == 'true' or $funcionario->is_professor == 'true')
                                      <th>FORMAÇÃO</th>
                                    @else
                                      <th>FUNÇÃO</th>
                                    @endif

                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-title="Id">{{ $funcionario->id }}</td>
                                        <td data-title="Nome">{{ $user->name }}</td>
                                        <td data-title="Email">{{ $user->email }}</td>
                                        <td data-title="Senha">{{ $user->password }}</td>
                                        <td data-title="Cpf">{{ $pessoa->cpf }}</td>
                                        <td data-title="Telefone">{{ $pessoa->telefone }}</td>
                                        <td data-title="Endereco">{{ $pessoa->endereco }}</td>
                                        <td data-title="Sexo">{{ $pessoa->sexo }}</td>
                                        <td data-title="Descricao">{{ $pessoa->descricao }}</td>
                                        @if($funcionario->is_gestor == 'true')
                                          <td data-title="FormacaoGestor">{{ $gestor->formacaoGestor }}</td>
                                        @endif
                                        @if($funcionario->is_professor == 'true')
                                          <td data-title="FormacaoProfessor">{{ $professor->formacaoProfessor }}</td>
                                        @endif
                                        @if($funcionario->is_tecnico == 'true')
                                          <td data-title="CargoTecnico">{{ $tecnico->cargoTecnico }}</td>
                                        @endif

                                    </tr>
                                </tbody>
                            </table>
                        <a href="/funcionario/listar/" class="btn btn-primary">Voltar</a>
                        <a href="/funcionario/editar/{{$pessoa->usuario_id}}" class="btn btn-info" >Editar</a>
                        <!-- <a href="/funcionario/remover/{{$pessoa->usuario_id}}" class="btn btn-danger" style="text-align:right;">Remover</a> -->

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
                                <a href="/funcionario/remover/{{$pessoa->usuario_id}}" class="btn btn-danger">SIM</a>
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
