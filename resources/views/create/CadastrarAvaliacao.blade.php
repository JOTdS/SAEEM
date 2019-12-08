@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar Avaliação') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('/disciplina/gravar') }}">
                      {{ csrf_field() }}
                        @csrf

                        <div class="form-group row">
                            <label for="disciplina_id" class="col-md-4 col-form-label text-md-right">{{ __('Disciplina') }}</label>
                            @if(count($disciplinas) != 0)
                            <div class="col-md-6">
                              <select class="form-control{{ $errors->has('disciplina_id') ? ' is-invalid' : '' }}" id="escolas" name="disciplina_id">
      								              <option value="">Selecione uma Disciplina</option>
      								              @foreach($disciplinas as $disciplina)
      									            <option value="{{$disciplina->id}}" {{ old('disciplina_id') == $disciplina->id ? 'selected' : '' }}>{{$disciplina->nome}}</option>
      								              @endforeach
                              </select>
                              @if ($errors->has('disciplina_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('disciplina_id') }}</strong>
                                    </span>
                              @endif
                            </div>
                            @else
                            <div class="col-md-6">
                              <select class="form-control{{ $errors->has('disciplina_id') ? ' is-invalid' : '' }}" id="disciplinas" name="disciplina_id">
      								              <option value="">Não há disciplinas cadastradas</option>
                              </select>
                              @if ($errors->has('disciplina_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('disciplina_id') }}</strong>
                                    </span>
                              @endif
                            </div>
                            @endif
                         </div>

                         <div class="form-group row">
                           <label for="aluno_id" class="col-md-4 col-form-label text-md-right">{{ __('Aluno') }}</label>
                           @if(count($alunos) != 0)
                           <div class="col-md-6">
                             <select class="form-control{{ $errors->has('aluno_id') ? ' is-invalid' : '' }}" id="alunos" name="aluno_id">
     								              <option value="">Selecione um Aluno</option>
     								              @foreach($alunos as $aluno)
     									            <option value="{{$aluno->id}}" {{ old('aluno_id') == $aluno->id ? 'selected' : '' }}>{{$aluno->nome}}</option>
     								              @endforeach
                             </select>
                             @if ($errors->has('aluno_id'))
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $errors->first('aluno_id') }}</strong>
                                   </span>
                             @endif
                           </div>
                           @else
                           <div class="col-md-6">
                             <select class="form-control{{ $errors->has('aluno_id') ? ' is-invalid' : '' }}" id="alunos" name="aluno_id">
     								              <option value="">Não há alunos cadastrados</option>
                             </select>
                             @if ($errors->has('aluno_id'))
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $errors->first('aluno_id') }}</strong>
                                   </span>
                             @endif
                           </div>
                           @endif
                        </div>

                        <div class="form-group row">
                            <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Data ') }}</label>
                            <div class="col-md-6">
                              <input name="data" id="data" type="date" class="form-control" required value= {{ old('data')}}> {{ $errors->first('data')}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nota" class="col-md-4 col-form-label text-md-right">{{ __('Nota ') }}</label>
                            <div class="col-md-6">
                              <input name="nota" id="nota" type="number" class="form-control" required value= {{ old('nota')}}> {{ $errors->first('nota')}}
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
