<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina_Turma extends Model
{
  protected $fillable = [
      'ano',
      'turno',
      'turma_id'
  ];

  public static $rules = [
      'ano' => 'required|numeric',
      'turno' => 'required|string',
      'turma_id' =>'required'
  ];

  public static $messages = [
      'required' => 'O Campo :attribute é obrigatório',
      'string' => 'O campo :atribute deve ser um texto',
      'numeric' => 'O campo :atribute deve ser um numeral'
  ];
}
