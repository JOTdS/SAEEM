<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gestor extends Model
{
  protected $fillable = [
      'formacao'
  ];

  public static $rules = [
      'formacao' => 'required|max:200|min:5|string'
  ];

  public static $messages = [
      'required' => 'O Campo :attribute é obrigatório',
      'string' => 'O campo :atribute deve ser um texto'
  ];
}
