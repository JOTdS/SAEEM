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
                      @if(count($usuarios) == 0)
                        <div class="alert alert-danger">
                                Não há Usuários cadastrados no sistema.
                        </div>
                        @else
                        <br>
                          <div id="tabela" class="table-responsive">
                            <h1> Lista de Funcionários </h1><br>
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>Nome</th>
                                    <th>email</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($usuarios as $usuario)
                                  <tr>
                                      <td data-title="Nº">{{ $usuario->id }}</td>
                                      <td data-title="Nome">{{ $usuario->name }}</td>
                                      <td data-title="cpf">{{ $usuario->email }}</td>
                                      <td>
                              					<a href="/funcionario/editar/{{$usuario->id}}" class="btn btn-info">Editar</a>
                              					<a href="/funcionario/remover/{{$usuario->id}}" class="btn btn-danger">Remover</a>
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
