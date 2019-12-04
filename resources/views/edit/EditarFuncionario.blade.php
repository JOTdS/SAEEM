@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Atualizar Funcionario') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{URL('funcionario/atualizar/')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="nome" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{$user->name}}" placeholder="{{$user->name}}" required>

                                @if ($errors->has('nome'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$user->email}}" placeholder="{{$user->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="senha" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="senha" type="senha" class="form-control{{ $errors->has('senha') ? ' is-invalid' : '' }}" name="senha" value="{{$user->password}}" placeholder="{{$user->password}}" required>

                                @if ($errors->has('senha'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('senha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                            <div class="col-md-6">
                                  <input id="cpf" type="cpf" class="form-control" name="cpf" value="{{$pessoa->cpf}}" placeholder="{{$pessoa->cpf}}" required autofocus>

                                  @if ($errors->has('cpf'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('cpf') }}</strong>
                                      </span>
                                  @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>

                            <div class="col-md-6">
                                <input id="telefone" type="telefone" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" name="telefone" value="{{$pessoa->telefone}}" placeholder="{{$pessoa->telefone}}" required>

                                @if ($errors->has('telefone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="endereco" class="col-md-4 col-form-label text-md-right">{{ __('Endereço') }}</label>

                            <div class="col-md-6">
                                <input id="endereco" type="endereco" class="form-control{{ $errors->has('endereco') ? ' is-invalid' : '' }}" name="endereco" value="{{$pessoa->endereco}}" placeholder="{{$pessoa->endereco}}" required>

                                @if ($errors->has('endereco'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('endereco') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>

                            <div class="col-md-6">
                                <input id="sexo" type="sexo" class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }}" name="sexo" value="{{$pessoa->sexo}}" placeholder="{{$pessoa->sexo}}" required>

                                @if ($errors->has('sexo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sexo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>

                            <div class="col-md-6">
                                <input id="descricao" type="descricao" class="form-control{{ $errors->has('descricao') ? ' is-invalid' : '' }}" name="descricao" value="{{$pessoa->descricao}}" placeholder="{{$pessoa->descricao}}" required>

                                @if ($errors->has('descricao'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if ($funcionario->is_gestor == true)
                            <div class="form-group row">
                                <label for="formacaoGestor" class="col-md-4 col-form-label text-md-right">{{ __('Formação') }}</label>
                                <div class="col-md-6">
                                    <input id="formacaoGestor" type="formacaoGestor" class="form-control{{ $errors->has('formacaoGestor') ? ' is-invalid' : '' }}" name="formacaoGestor" value="{{$gestor->formacaoGestor}}" placeholder="{{$gestor->formacaoGestor}}" required>

                                    @if ($errors->has('formacaoGestor'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('formacaoGestor') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif
                        @if ($funcionario->is_tecnico == true)
                            <div class="form-group row">
                                <label for="cargoTecnico" class="col-md-4 col-form-label text-md-right">{{ __('Função') }}</label>

                                <div class="col-md-6">
                                    <input id="cargoTecnico" type="cargoTecnico" class="form-control{{ $errors->has('cargoTecnico') ? ' is-invalid' : '' }}" name="cargoTecnico" value="{{$tecnico->cargoTecnico}}" placeholder="{{$tecnico->cargoTecnico}}" required>

                                    @if ($errors->has('cargoTecnico'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cargoTecnico') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif
                        @if ($funcionario->is_professor == true)
                            <div class="form-group row">
                                <label for="formacaoProfessor" class="col-md-4 col-form-label text-md-right">{{ __('Formação') }}</label>

                                <div class="col-md-6">
                                    <input id="formacaoProfessor" type="formacaoProfessor" class="form-control{{ $errors->has('formacaoProfessor') ? ' is-invalid' : '' }}" name="formacaoProfessor" value="{{$professor->formacaoProfessor}}" placeholder="{{$professor->formacaoProfessor}}" required>

                                    @if ($errors->has('formacaoProfessor'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('formacaoProfessor') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif

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
