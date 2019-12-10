<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serie extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at']; 
    protected $fillable = [
        'nome',
        'modalidade',
        'descricao',
        'escola_id'
    ];

    public static $rules = [
        'nome' => 'required|max:500|min:3|string',
        'descricao' => 'required|max:500|min:3|string',
        'modalidade' => 'max:200',
        'escola_id' => 'required'
    ];

    public static $messages = [
        'required' => 'O Campo :attribute é obrigatório',
        'string' => 'O campo :atribute deve ser um texto'
    ];
}
