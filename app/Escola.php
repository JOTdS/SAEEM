<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Escola extends Model
{
    protected $fillable = [
        'nome',
        'endereco',
        'telefone'
    ];

    public static $rules = [
        'nome' => 'required|max:200|min:3|string',
        'endereco' => 'required|max:200|min:3|string',
        'telefone' => 'required'
    ];

    public static $messages = [
        'required' => 'O Campo :attribute é obrigatório',
        'string' => 'O campo :atribute deve ser um texto'
    ];
}
