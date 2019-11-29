<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
  protected $fillable = [
      'cargo'
  ];

  public static $rules = [
      'cargo' => 'required|string'
  ];

  public static $messages = [
      'required' => 'O Campo :attribute é obrigatório',
      'string' => 'O campo :atribute deve ser um texto'
  ];

}
