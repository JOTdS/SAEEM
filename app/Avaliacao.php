<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $fillable = [
        'nota',
        'data',
        'descricao'
    ];

    public static $rules = [
        'nota' => 'required|float',
        'data' => 'required|DateTime',
        'descricao' => 'max:200|min:3|string'
    ];

    public static $messages = [
        'required' => 'O Campo :attribute é obrigatório',
        'float' => 'O campo :atribute deve ser um valor fracional',
        'DateTime' => 'O campo :atribute deve estar no formato data e hora'
    ];
}
