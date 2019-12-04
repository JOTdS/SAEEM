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
                <div class="card-header">{{ __('Cadastrar Turma_Serie') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('/turma_serie/gravar') }}">
                      {{ csrf_field() }}
                        @csrf
                        <div class="form-group row">
                            <label for="cargaHorario" class="col-md-4 col-form-label text-md-right">{{ __('Carga Horario ') }}</label>
                            <div class="col-md-6">
                              <input name="cargaHorario" id="cargaHorario" type="text" class="form-control" value= {{ old('cargaHorario')}}> {{ $errors->first('cargaHorario')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="turma_id" class="col-md-4 col-form-label text-md-right">{{ __('Turma') }}</label>
                            @if(count($turmas) != 0 and count($turmas) != 0)
                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('turma_id') ? ' is-invalid' : '' }}" id="turmas" name="turma_id">
                                                    <option value="">Selecione uma turma</option>
                                                    @foreach($turmas as $turma)
                                                        <option value="{{$turma->id}}" {{ old('turma_id') == $turma->id ? 'selected' : '' }}>{{$turma->nome}}</option>
                                                    @endforeach
                                </select>
                                @if ($errors->has('turma_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('turma_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @else
                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('turma_id') ? ' is-invalid' : '' }}" id="turmas" name="turma_id">
                                                    <option value="">Não há turmas cadastradas</option>
                                </select>
                                @if ($errors->has('turma_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('turma_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="serie_id" class="col-md-4 col-form-label text-md-right">{{ __('Serie') }}</label>
                            @if(count($series) != 0 and count($series) != 0)
                            <div class="col-md-6">
                              <select class="form-control{{ $errors->has('serie_id') ? ' is-invalid' : '' }}" id="series" name="serie_id">
      								              <option value="">Selecione uma Serie</option>
      								              @foreach($series as $serie)
      									            <option value="{{$serie->id}}" {{ old('serie_id') == $serie->id ? 'selected' : '' }}>{{$serie->descricao}}</option>
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
                                  Cadastrar
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
