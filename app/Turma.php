<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turma extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at']; 
    protected $fillable = [
        'nome',
        'modalidade',
        'serie_id',
        'descricao'
    ];

    public static $rules = [
        'nome' => 'required|max:50|min:3|string',
        'modalidade' => 'max:200',
        'descricao' => 'required|max:500|min:3|string',
        'serie_id' => 'required'
    ];

    public static $messages = [
        'required' => 'O Campo :attribute é obrigatório',
        'string' => 'O campo :atribute deve ser um texto'
    ];
}
