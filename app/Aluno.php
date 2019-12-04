<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];    
    protected $fillable = [
        'filiacao'
    ];

    public static $rules = [
        'filiacao' => 'required|max:200|min:3|string'
    ];

    public static $messages = [
        'required' => 'O Campo :attribute é obrigatório',
        'string' => 'O campo :atribute deve ser um texto'
    ];
}
