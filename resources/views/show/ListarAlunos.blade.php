@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                  @if (\Session::has('alert-success'))
                  <br>
                      <div class="alert alert-success">
                          {!! \Session::get('alert-success') !!}
                      </div>
                  @endif
                  <form method="POST" action="{{ route('/aluno/relatorio') }}">
                    {{ csrf_field() }}
                    @csrf
                    <div class="row">
                      <select name="tipo" placeholder="Digite o que quer pesquisar aqui." id="tipo" type="text"  class="form-control selectpicker" required value= {{ old('tipo')}}> {{ $errors->first('tipo')}}
                        <option value="">Tipo</option>
                        <option value="nome">Nome</option>
                        <option value="cpf">CPF</option>
                      </select>
                      <input name="pesquisar" id= "pesquisar" type="text" class="form-control" placeholder="Digite" required value= {{ old('pesquisar')}}> {{ $errors->first('pesquisar')}}
                      <button type="submit" class="btn btn-primary">
                          Buscar
                      </button>
                    </div>
                  </form>
                  <div class="panel-body">
                      @if(count($alunos) == 0 and count($alunos) == 0)
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
                                  <th>cpf</th>
                                  <th>telefone</th>
                                  <th>endereco</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($alunos as $aluno)
                                <?php $pessoa = \App\Pessoa::find($aluno->id)?>
                                <tr>
                                    <td data-title="Nº">{{ $pessoa->id }}</td>
                                    <td data-title="Nome">{{ $pessoa->nome }}</td>
                                    <td data-title="cpf">{{ $pessoa->cpf }}</td>
                                    <td data-title="telefone">{{ $pessoa->telefone }}</td>
                                    <td data-title="endereco">{{ $pessoa->endereco }}</td>
                                    <td class="right" data-title="Acoes">
                                        <a href="/aluno/editar/{{$pessoa->id}}" class="btn btn-info">Editar</a>
                                        <a href="/aluno/mostrar/{{$pessoa->id}}" class="btn btn-info">Visualizar</a>
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
                                                <a href="/aluno/remover/{{$aluno->id}}" class="btn btn-danger">SIM</a>
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
