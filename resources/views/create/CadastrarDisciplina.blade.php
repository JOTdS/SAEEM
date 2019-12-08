@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar Disciplina') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('/disciplina/gravar') }}">
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
                            <label for="ano" class="col-md-4 col-form-label text-md-right">{{ __('Ano ') }}</label>
                            <div class="col-md-6">
                              <input name="ano" id="ano" type="number" class="form-control" required value= {{ old('ano')}}> {{ $errors->first('ano')}}
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="turno" class="col-md-4 col-form-label text-md-right">{{ __('Turno ') }}</label>
                            <div class="col-md-6">
                              <select name="turno" id="turno" type="text"  onchange="optionCheck()" class="form-control selectpicker" required value= {{ old('turno')}}> {{ $errors->first('turno')}}
                                <option value=""> </option>
                                <option value="Matutino">Matutino</option>
                                <option value="Vespertino">Vespertino</option>
                                <option value="Noturno">Noturno</option>
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="turma_id" class="col-md-4 col-form-label text-md-right">{{ __('Turma') }}</label>
                            @if(count($turmas) != 0)
                            <div class="col-md-6">
                              <select class="form-control{{ $errors->has('turma_id') ? ' is-invalid' : '' }}" id="turmas" name="turma_id" >
                                    <option value="">Selecione uma Turma</option>
                                    @foreach($turmas as $turma)
                                    <option value="{{$turma->id}}" {{ old('turma_id') == $turma->id ? 'selected' : '' }}>{{$turma->nome}}</option>
                                    @endforeach
                              </select>
                              @if ($errors->has('turma_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('turma_id') }}</strong>
                                    </span>
                              @endif
                            </div>
                            @else
                            <div class="col-md-6">
                              <select class="form-control{{ $errors->has('turma_id') ? ' is-invalid' : '' }}" id="turmas" name="turma_id">
                                    <option value="">Não há turmas cadastradas</option>
                              </select>
                              @if ($errors->has('turma_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('turma_id') }}</strong>
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
