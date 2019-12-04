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
                <div class="card-header">{{ __('Cadastrar Série') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('/turma/gravar') }}">
                      {{ csrf_field() }}
                        @csrf
                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome ') }}</label>
                            <div class="col-md-6">
                              <input name="nome" id="nome" type="text" class="form-control" value= {{ old('nome')}}> {{ $errors->first('nome')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="modalidade" class="col-md-4 col-form-label text-md-right">{{ __('Modalidade ') }}</label>
                            <div class="col-md-6">
                              <input name="modalidade" id="modalidade" type="text" class="form-control" value= {{ old('modalidade')}}> {{ $errors->first('modalidade')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição ') }}</label>
                            <div class="col-md-6">
                              <input name="descricao" id="descricao" type="text" class="form-control" value= {{ old('descricao')}}> {{ $errors->first('descricao')}}
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
