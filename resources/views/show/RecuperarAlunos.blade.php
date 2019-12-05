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
                @if (\Session::has('alert-danger'))
                <br>
                    <div class="alert alert-danger">
                        {!! \Session::get('alert-danger') !!}
                    </div>
                @endif
                <div class="card-header">{{ __('Cadastrar Aluno') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('/aluno/showRecupera') }}">
                      {{ csrf_field() }}
                        @csrf
                        <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('Cpf ') }}</label>
                            <div class="col-md-6">
                              <input name="cpf" id="cpf" type="text" class="form-control" value= {{ old('cpf')}}> {{ $errors->first('cpf')}}
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Recuperar
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
