@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Série') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('/turma_serie/update') }}">
                      {{ csrf_field() }}
                        @csrf
                        <input type="hidden" name="id" value="{{ $turma_serie->id }}">
                        <div class="form-group row">
                            <label for="cargaHorario" class="col-md-4 col-form-label text-md-right">{{ __('Carga Horário ') }}</label>
                            <div class="col-md-6">
                              <input name="cargaHorario" id="cargaHorario" type="text" class="form-control" value= {{ $turma_serie->cargaHorario }}> {{ $errors->first('cargaHorario')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="turma_id" class="col-md-4 col-form-label text-md-right">{{ __('Turmas') }}</label>
                            @if(count($turmas) != 0 and count($turmas) != 0)
                            @php
                                $turma_nome = \App\turma::find($turma_serie->turma_id);
                            @endphp
                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('turma_id') ? ' is-invalid' : '' }}" id="turmas" name="turma_id">
                                                    <option value="{{$turma_serie->turma_id}}">{{$turma_nome->nome}}</option>

                                                    @foreach($turmas as $turma)
                                                        <option value="{{$turma->id}}">{{$turma->nome}}</option>
                                                    @endforeach
                                </select>
                                @if ($errors->has('fturma_id'))
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
                                @if ($errors->has('fturma_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('turma_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="serie_id" class="col-md-4 col-form-label text-md-right">{{ __('series') }}</label>
                            @if(count($series) != 0 and count($series) != 0)
                            @php
                                $serie_nome = \App\serie::find($turma_serie->serie_id);
                            @endphp
                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('serie_id') ? ' is-invalid' : '' }}" id="series" name="serie_id">
                                                    <option value="{{$turma_serie->serie_id}}">{{$serie_nome->descricao}}</option>
                                                    @foreach($series as $serie)
                                                        <option value="{{$serie->id}}">{{$serie->descricao}}</option>
                                                    @endforeach
                                </select>
                                @if ($errors->has('fserie_id'))
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
                                @if ($errors->has('fserie_id'))
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
