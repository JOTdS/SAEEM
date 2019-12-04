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
                <div class="card-header">{{ __('Cadastrar Turma') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('/serie/gravar') }}">
                      {{ csrf_field() }}
                        @csrf
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
                        <div class="form-group row">
                            <label for="escola_id" class="col-md-4 col-form-label text-md-right">{{ __('Escola') }}</label>
                            @if(count($escolas) != 0 and count($escolas) != 0)
                            <div class="col-md-6">
                              <select class="form-control{{ $errors->has('escola_id') ? ' is-invalid' : '' }}" id="escolas" name="escola_id">
      								              <option value="">Selecione uma Escola</option>
      								              @foreach($escolas as $escola)
      									            <option value="{{$escola->id}}" {{ old('escola_id') == $escola->id ? 'selected' : '' }}>{{$escola->nome}}</option>
      								              @endforeach
                              </select>
                              @if ($errors->has('escola_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('escola_id') }}</strong>
                                    </span>
                              @endif
                            </div>
                            @else
                            <div class="col-md-6">
                              <select class="form-control{{ $errors->has('escola_id') ? ' is-invalid' : '' }}" id="escolas" name="escola_id">
      								              <option value="">Não há escolas cadastradas</option>
                              </select>
                              @if ($errors->has('escola_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('escola_id') }}</strong>
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
