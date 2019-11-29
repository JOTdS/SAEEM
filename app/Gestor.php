<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gestor extends Model
{
  protected $fillable = [
      'formacaoGestor'
  ];

  public static $rules = [
      'formacaoGestor' => 'required|string'
  ];

  public static $messages = [
      'required' => 'O Campo :attribute é obrigatório',
      'string' => 'O campo :atribute deve ser um texto'
  ];
}
