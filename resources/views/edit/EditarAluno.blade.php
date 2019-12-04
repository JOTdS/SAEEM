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
                <div class="card-header">{{ __('Cadastrar Aluno') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('/aluno/update') }}">
                      {{ csrf_field() }}
                        @csrf
                        <input type="hidden" name="id" value="{{$pessoa->id}}">

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome ') }}</label>
                            <div class="col-md-6">
                                <input name="nome" id="nome" type="text" class="form-control" value= {{ $pessoa->name }}> {{ $errors->first('nome')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="filiacao" class="col-md-4 col-form-label text-md-right">{{ __('Filiacao ') }}</label>
                            <div class="col-md-6">
                              <input name="filiacao" id="filiacao" type="text" class="form-control" value= {{ $aluno->filiacao }}> {{ $errors->first('filiacao')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nascimento" class="col-md-4 col-form-label text-md-right">{{ __('Nascimento ') }}</label>
                            <div class="col-md-6">
                              <input name="nascimento" id="nascimento" type="nascimento" class="form-control{{ $errors->has('nascimento') ? ' is-invalid' : '' }}" value={{ $aluno->nascimento }}>
                              @if ($errors->has('nascimento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nascimento') }}</strong>
                                    </span>
                              @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('Cpf ') }}</label>
                            <div class="col-md-6">
                              <input name="cpf" id="cpf" type="text" class="form-control" value= {{ $pessoa->cpf }}> {{ $errors->first('cpf')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone ') }}</label>
                            <div class="col-md-6">
                              <input name="telefone" id="telefone" type="text" class="form-control" value= {{ $pessoa->telefone }}> {{ $errors->first('telefone')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="endereco" class="col-md-4 col-form-label text-md-right">{{ __('Endereço ') }}</label>
                            <div class="col-md-6">
                              <input name="endereco" id="endereco" type="text" class="form-control" value= {{ $pessoa->endereco }}> {{ $errors->first('endereco')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição ') }}</label>
                            <div class="col-md-6">
                              <input name="descricao" id="descricao" type="text" class="form-control" value= {{ $pessoa->descricao }}> {{ $errors->first('descricao')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('Sexo ') }}</label>
                            <div class="col-md-6">
                              <input name="sexo" id="sexo" type="text" class="form-control" value= {{ $pessoa->sexo }}> {{ $errors->first('sexo')}}
                            </div>
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
