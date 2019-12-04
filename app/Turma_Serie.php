<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turma_Serie extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at']; 
    protected $fillable = [
        'cargaHorario',
        'turma_id',
        'serie_id'
    ];

    public static $rules = [
        'cargaHorario' => 'required|max:500|min:3|string',
        'turma_id' => 'required',
        'serie_id' => 'required',
    ];

    public static $messages = [
        'required' => 'O Campo :attribute é obrigatório',
        'string' => 'O campo :atribute deve ser um texto'
    ];
}
