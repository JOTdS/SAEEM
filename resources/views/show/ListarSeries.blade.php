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
                      @if(count($series) == 0 and count($series) == 0)
                      <div class="alert alert-danger">
                              Não há series cadastrada no sistema.
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
                                    <td data-title="Acoes">
                                        <a href="/serie/editar/{{$serie->id}}" class="btn btn-info">Editar</a>
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
