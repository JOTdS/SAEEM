<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = [
        'modalidade',
        'descricao'
    ];

    public static $rules = [
        'descricao' => 'required|max:500|min:3|string',
        'modalidade' => 'max:200'
    ];

    public static $messages = [
        'required' => 'O Campo :attribute é obrigatório',
        'string' => 'O campo :atribute deve ser um texto'
    ];
}
