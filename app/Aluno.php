<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    protected $fillable = [
        'filiacao'
    ];

    public static $rules = [
        'filiacao' => 'required|max:200|min:5|string'
    ];

    public static $messages = [
        'required' => 'O Campo :attribute é obrigatório',
        'string' => 'O campo :atribute deve ser um texto',
        'filiacao.max' => 'A filiação é muito grande (max 200 caracteres)'
    ];
}
