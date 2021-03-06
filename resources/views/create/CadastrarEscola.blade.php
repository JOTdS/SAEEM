@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar Escola') }}</div>
                <div class="card-body">

                    <form method="POST" action="{{ route('/escola/gravar') }}">
                      {{ csrf_field() }}
                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome ') }}</label>
                            <div class="col-md-6">
                              <input name="nome" id="nome" type="text" class="form-control" required value= {{ old('nome')}}> {{ $errors->first('nome')}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição ') }}</label>
                            <div class="col-md-6">
                              <input name="descricao" id="descricao" type="text" class="form-control" required value= {{ old('descricao')}}> {{ $errors->first('descricao')}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="endereco" class="col-md-4 col-form-label text-md-right">{{ __('Endereço ') }}</label>
                            <div class="col-md-6">
                              <input name="endereco" id="endereco" type="text" class="form-control" required value= {{ old('endereco')}}> {{ $errors->first('endereco')}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone ') }}</label>
                            <div class="col-md-6">
                              <input name="telefone" id="telefone" type="text" class="form-control" required value= {{ old('telefone')}}> {{ $errors->first('telefone')}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="modalidade" class="col-md-4 col-form-label text-md-right">{{ __('Modalidade ') }}</label>
                            <div class="col-md-6">
                              <input name="modalidade" id="modalidade" type="text" class="form-control" required value= {{ old('modalidade')}} > {{ $errors->first('modalidade')}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inep" class="col-md-4 col-form-label text-md-right">{{ __('Inep ') }}</label>
                            <div class="col-md-6">
                              <input name="inep" id="inep" type="text" class="form-control" required value= {{ old('inep')}}> {{ $errors->first('inep')}}
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
