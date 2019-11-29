<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
  protected $fillable = [
      'formacaoProfessor'
  ];

  public static $rules = [
      'formacaoProfessor' => 'required|string'
  ];

  public static $messages = [
      'required' => 'O Campo :attribute é obrigatório',
      'string' => 'O campo :atribute deve ser um texto'
  ];
}
