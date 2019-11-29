@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar Gestor') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('/gestor/gravar') }}">
                      {{ csrf_field() }}
                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome ') }}</label>
                            <div class="col-md-6">
                              <input name="nome" id="nome" type="text" class="form-control" required value= {{ old('nome')}}> {{ $errors->first('nome')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail ') }}</label>
                            <div class="col-md-6">
                              <input name="email" id="email" type="email" class="form-control" required value= {{ old('email')}}> {{ $errors->first('email')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="filiacao" class="col-md-4 col-form-label text-md-right">{{ __('Formação ') }}</label>
                            <div class="col-md-6">
                              <input name="formacao" id="formacao" type="text" class="form-control" required value= {{ old('formação')}}> {{ $errors->first('formacao')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('Cpf ') }}</label>
                            <div class="col-md-6">
                              <input name="cpf" id="cpf" type="text" class="form-control" required value= {{ old('cpf')}}> {{ $errors->first('cpf')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone ') }}</label>
                            <div class="col-md-6">
                              <input name="telefone" id="telefone" type="text" class="form-control" > {{ $errors->first('telefone')}} <!--require deste campo foi removido para testes-->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="endereco" class="col-md-4 col-form-label text-md-right">{{ __('Endereço ') }}</label>
                            <div class="col-md-6">
                              <input name="endereco" id="endereco" type="text" class="form-control" required value= {{ old('endereco')}}> {{ $errors->first('endereco')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('Sexo ') }}</label>
                            <div class="col-md-6">
                              <input name="sexo" id="sexo" type="text" class="form-control" required value= {{ old('sexo')}}> {{ $errors->first('sexo')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição ') }}</label>
                            <div class="col-md-6">
                              <input name="descricao" id="descricao" type="text" class="form-control" required value= {{ old('descricao')}}> {{ $errors->first('descricao')}}
                            </div>
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
