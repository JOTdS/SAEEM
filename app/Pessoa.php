<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
        'nome',
        'cpf',
        'endereco',
        'sexo'
    ];

    public static $rules = [
        'nome' => 'required|max:100|string',
        'cpf' => 'required|unique:pessoas|max:11|min:11',
        'telefone' => 'required',
        'endereco' => 'max:255|string',
        'descricao' => 'max:255|string',
        'sexo' => 'required|max:1|string'
    ];

    public static $messages = [
        'required' => 'O Campo :attribute é obrigatório',
        'string' => 'O campo :atribute deve ser um texto',
        'nome.max' => 'O nome é muito grande (max 100 caracteres)',        
        'sexo.max' => 'O sexo deve ser definido com a inicial do gênero',
        'endereco.max' => 'O endereço é muito grande (max 255 caracteres)',
        'cpf.max' => 'O cpf deve ser definido com 11 caracteres',
        'cpf.unique' => 'O cpf já foi cadastrado'
    ];
}
