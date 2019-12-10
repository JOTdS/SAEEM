@extends('layouts.app')

@section('content')
<script type="text/javascript">
    function pegarDataAtual(){
        data = new Date();
        document.getElementById('data').value = data.getDay()+'/'+data.getMonth()+'/'+data.getFullYear();
    }
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Turma') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('/turma/update') }}">
                      {{ csrf_field() }}
                        @csrf
                        <input type="hidden" name="id" value="{{$turma->id}}">
                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome ') }}</label>
                            <div class="col-md-6">
                              <input name="nome" id="nome" type="text" class="form-control" value= {{ $turma->nome }}> {{ $errors->first('nome')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="modalidade" class="col-md-4 col-form-label text-md-right">{{ __('Modalidade ') }}</label>
                            <div class="col-md-6">
                              <input name="modalidade" id="modalidade" type="text" class="form-control" value= {{ $turma->modalidade }}> {{ $errors->first('modalidade')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição ') }}</label>
                            <div class="col-md-6">
                              <input name="descricao" id="descricao" type="text" class="form-control" value= {{ $turma->descricao }}> {{ $errors->first('descricao')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="serie_id" class="col-md-4 col-form-label text-md-right">{{ __('Serie') }}</label>
                            @if(count($series) != 0 and count($series) != 0)
                            <?php $serie_nome = \App\Serie::find($turma->serie_id)?>
                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('serie_id') ? ' is-invalid' : '' }}" id="series" name="serie_id">
                                    <option value="{{$serie_nome->id}}">{{$serie_nome->nome}}</option>
                                    @foreach($series as $serie)
                                        <option value="{{$serie_nome->id}}" {{ old('serie_id') == $serie->nome ? 'selected' : '' }}>{{$serie->nome}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('serie_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('serie_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @else
                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('serie_id') ? ' is-invalid' : '' }}" id="series" name="serie_id">
                                                    <option value="">Não há series cadastradas</option>
                                </select>
                                @if ($errors->has('serie_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('serie_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @endif
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Editar
                              </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
