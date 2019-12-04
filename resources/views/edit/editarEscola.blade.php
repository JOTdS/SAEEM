@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Atualizar Escola') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{URL('escola/atualizar/')}}">

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                  <input id="nome" type="text" class="form-control" name="nome" value="{{$escola->nome}}" placeholder="{{$escola->nome}}" required autofocus>

                                  @if ($errors->has('nome'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('nome') }}</strong>
                                      </span>
                                  @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>

                            <div class="col-md-6">
                                <input id="descricao" type="descricao" class="form-control{{ $errors->has('descricao') ? ' is-invalid' : '' }}" name="descricao" value="{{$escola->descricao}}" placeholder="{{$escola->descricao}}" required>

                                @if ($errors->has('descricao'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="endereco" class="col-md-4 col-form-label text-md-right">{{ __('Endereço') }}</label>

                            <div class="col-md-6">
                                <input id="endereco" type="endereco" class="form-control{{ $errors->has('endereco') ? ' is-invalid' : '' }}" name="endereco" value="{{$escola->endereco}}" placeholder="{{$escola->endereco}}" required>

                                @if ($errors->has('endereco'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('endereco') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>

                            <div class="col-md-6">
                                <input id="telefone" type="telefone" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" name="telefone" value="{{$escola->telefone}}" placeholder="{{$escola->telefone}}" required>

                                @if ($errors->has('telefone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="modalidade" class="col-md-4 col-form-label text-md-right">{{ __('Modalidade') }}</label>

                            <div class="col-md-6">
                                <input id="modalidade" type="modalidade" class="form-control{{ $errors->has('modalidade') ? ' is-invalid' : '' }}" name="modalidade" value="{{$escola->modalidade}}" placeholder="{{$escola->modalidade}}" required>

                                @if ($errors->has('modalidade'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('modalidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inep" class="col-md-4 col-form-label text-md-right">{{ __('Inep') }}</label>

                            <div class="col-md-6">
                                <input id="inep" type="inep" class="form-control{{ $errors->has('inep') ? ' is-invalid' : '' }}" name="inep" value="{{$escola->inep}}" placeholder="{{$escola->inep}}" required>

                                @if ($errors->has('inep'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('inep') }}</strong>
                                    </span>
                                @endif
                            </div>
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
