@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Atualizar Disciplina') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{URL('disciplina/atualizar/')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$disciplina->id}}">

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="nome" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{$disciplina->nome}}" placeholder="{{$disciplina->nome}}" required>

                                @if ($errors->has('nome'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>

                            <div class="col-md-6">
                                <input id="descricao" type="descricao" class="form-control{{ $errors->has('descricao') ? ' is-invalid' : '' }}" name="descricao" value="{{$disciplina->descricao}}" placeholder="{{$disciplina->descricao}}" required>

                                @if ($errors->has('descricao'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ano" class="col-md-4 col-form-label text-md-right">{{ __('Ano') }}</label>

                            <div class="col-md-6">
                                <input id="ano" type="ano" class="form-control{{ $errors->has('ano') ? ' is-invalid' : '' }}" name="ano" value="{{$disciplina_turma->ano}}" placeholder="{{$disciplina_turma->ano}}" required>

                                @if ($errors->has('ano'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ano') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="turno" class="col-md-4 col-form-label text-md-right">{{ __('Turno') }}</label>

                            <div class="col-md-6">
                              <select name="turno" id="turno" type="turno"  onchange="optionCheck()" class="form-control{{ $errors->has('turno') ? ' is-invalid' : '' }} selectpicker" required>
                                <option value="{{$disciplina_turma->turno}}">{{$disciplina_turma->turno}}</option>
                                <option value="Matutino">Matutino</option>
                                <option value="Vespertino">Vespertino</option>
                                <option value="Noturno">Noturno</option>
                              </select>

                                @if ($errors->has('turno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('turno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="turma" class="col-md-4 col-form-label text-md-right">{{ __('Turma') }}</label>
                            @if(count($turmaResultado) != 0)
                            <div class="col-md-6">
                              @foreach($turmaResultado as $turma)
                              <select class="form-control{{ $errors->has('turma') ? ' is-invalid' : '' }}" id="turma" name="turma" required >
                                    <option type="turma">{{$turma->nome}}</option>

                                    <option value="{{$turma->id}}" {{ old('turma') == $turma->id ? 'selected' : '' }}>{{$turma->nome}}</option>
                                    @endforeach
                              </select>
                              @if ($errors->has('turma'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('turma') }}</strong>
                                    </span>
                              @endif
                            </div>
                            @else
                            <div class="col-md-6">
                              <select class="form-control{{ $errors->has('turma') ? ' is-invalid' : '' }}" id="turma" name="turma">
                                    <option value="">Não há turmas cadastradas</option>
                              </select>
                              @if ($errors->has('turma'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('turma') }}</strong>
                                    </span>
                              @endif
                            </div>
                            @endif
                         </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Atualizar') }}
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
