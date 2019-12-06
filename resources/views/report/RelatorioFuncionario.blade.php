@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">{{ __('Relatórios Funcionários') }}</div>
                <div class="card-body">
                  @if (\Session::has('success'))
                  <br>
                      <div class="alert alert-success">
                          {!! \Session::get('success') !!}
                      </div>
                  @endif

                  <div class="shadow p-4 mb-4 bg-white rounded container-fluid" style="overflow-x: auto; border">
                    <form method="POST" action="{{ route('/funcionario/relatorioCargo') }}">
                      {{ csrf_field() }}
                      @csrf
                      <div class="form-group row">
                          <label for="cargo" class="col-md-4 col-form-label text-md-right">{{ __('Listar por cargo') }}</label>
                          <div class="form-group row">

                              <div class="col-md-6">
                                <select name="cargo" id="cargo" type="text"  class="form-control selectpicker" required value= {{ old('cargo')}}> {{ $errors->first('cargo')}}
                                  <option value=""> </option>
                                  <option value="0">Gestor</option>
                                  <option value="1">Técnico</option>
                                  <option value="2">Professor</option>
                                </select>
                              </div>
                              <button type="submit" class="btn btn-primary">
                                  Buscar
                              </button>
                          </div>
                      </div>
                    </form>

                      <form method="POST" action="{{ route('/funcionario/relatorioNome') }}">
                      {{ csrf_field() }}
                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Listar por nome ') }}</label>
                            <div class="col-md-3">
                              <input name="nome" id= "nome" type="text" class="form-control" placeholder="Digite o nome" required value= {{ old('nome')}}> {{ $errors->first('nome')}}

                            </div>
                            <button type="submit" class="btn btn-primary">
                                Buscar
                            </button>
                        </div>
                      </form>
                    </div>

                  <div class="panel-body">
                      @if(count($pessoas) == 0)
                          <div class="alert alert-danger">
                                  Nenhum resultado para o termo pesquisado, tente pesquisar um termo diferente.
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
                              					<!-- <a href="/funcionario/editar/{{$pessoa->usuario_id}}" class="btn btn-info">Editar</a>
                              					<a href="/funcionario/remover/{{$pessoa->usuario_id}}" class="btn btn-danger">Remover</a> -->

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
                      <!-- <a href="/funcionario/cadastrar" class="btn btn-primary"> Adicionar Funcionário </a> -->
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
