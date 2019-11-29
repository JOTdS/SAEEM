<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
  protected $fillable = [
      'cargoTecnico'
  ];

  public static $rules = [
      'cargoTecnico' => 'required|string'
  ];

  public static $messages = [
      'required' => 'O Campo :attribute é obrigatório',
      'string' => 'O campo :atribute deve ser um texto'
  ];
}
