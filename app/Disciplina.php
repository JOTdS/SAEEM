<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
  protected $fillable = [
      'nome',
      'descricao'
  ];

  public static $rules = [
      'nome' => 'required|max:200|min:3|string',
      'descricao' => 'max:200|min:3|string'
  ];

  public static $messages = [
      'required' => 'O Campo :attribute é obrigatório',
      'string' => 'O campo :atribute deve ser um texto'
  ];
}
