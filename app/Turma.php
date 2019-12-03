<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = [
        'nome',
        'modalidade',
        'descricao'
    ];

    public static $rules = [
        'nome' => 'required|max:50|min:3|string',
        'modalidade' => 'max:200',
        'nome' => 'required|max:500|min:3|string'
    ];

    public static $messages = [
        'required' => 'O Campo :attribute é obrigatório',
        'string' => 'O campo :atribute deve ser um texto'
    ];
}
