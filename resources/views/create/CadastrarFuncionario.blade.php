@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar Funcionário') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('/funcionario/gravar') }}">
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
                            <label for="senha" class="col-md-4 col-form-label text-md-right">{{ __('Senha ') }}</label>
                            <div class="col-md-6">
                              <input name="senha" id="senha" type="senha" class="form-control" required value= {{ old('senha')}}> {{ $errors->first('senha')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF ') }}</label>
                            <div class="col-md-6">
                              <input name="cpf" id="cpf" type="text" class="form-control" required value= {{ old('cpf')}}> {{ $errors->first('cpf')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone ') }}</label>
                            <div class="col-md-6">
                              <input name="telefone" id="telefone" type="text" class="form-control" required value= {{ old('cpf')}}> {{ $errors->first('telefone')}} <!--require deste campo foi removido para testes-->
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
                        <div class="form-group row">
                          <label for="cargo" class="col-md-4 col-form-label text-md-right">{{ __('Cargo ') }}</label>
                            <div class="col-md-6">
                              <select name="cargo" id="cargo" type="text"  onchange="optionCheck()" class="form-control selectpicker" required value= {{ old('cargo')}}> {{ $errors->first('cargo')}}
                                <option value=""> </option>
                                <option value="0">Gestor</option>
                                <option value="1">Técnico</option>
                                <option value="2">Professor</option>
                              </select>
                            </div>
                        </div>

                        <div class="form-group row" id="gestor" style="display:none;">
                            <label for="formacaoGestor" class="col-md-4 col-form-label text-md-right">{{ __('Formação ') }}</label>
                            <div class="col-md-6">
                              <input name="formacaoGestor" id="formacaoGestor" type="text" class="form-control"  value= {{ old('formacaoGestor')}}> {{ $errors->first('formacaoGestor')}}
                            </div>
                        </div>
                        <div class="form-group row" id="tecnico" style="display:none;">
                            <label for="cargoTecnico" class="col-md-4 col-form-label text-md-right">{{ __('Função ') }}</label>
                            <div class="col-md-6">
                              <input name="cargoTecnico" id="cargoTecnico" type="text" class="form-control"  value= {{ old('cargoTecnico')}}> {{ $errors->first('cargoTecnico')}}
                            </div>
                        </div>
                        <div class="form-group row" id="professor" style="display:none;">
                            <label for="formacaoProfessor" class="col-md-4 col-form-label text-md-right">{{ __('Formação ') }}</label>
                            <div class="col-md-6">
                              <input name="formacaoProfessor" id="formacaoProfessor" type="text" class="form-control"  value= {{ old('formacaoProfessor')}}> {{ $errors->first('formacaoProfessor')}}
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

<!-- o codigo abaixo, mostra apenas campos de cada funcionaio especifico -->
<script type="text/javascript">
  function optionCheck(){
      var option = document.getElementById("cargo").value;
      if(option == "0"){
          document.getElementById("gestor").style.display ="flex";
          document.getElementById("tecnico").style.display ="none";
          document.getElementById("professor").style.display ="none";
      }else if(option == "1"){
          document.getElementById("gestor").style.display ="none";
          document.getElementById("tecnico").style.display ="flex";
          document.getElementById("professor").style.display ="none";
      }else if(option == "2"){
          document.getElementById("gestor").style.display ="none";
          document.getElementById("tecnico").style.display ="none";
          document.getElementById("professor").style.display ="flex";
      }
  }
</script>

@endsection
