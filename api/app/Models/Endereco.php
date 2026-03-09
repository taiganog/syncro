<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'uf',
        'cep',
        'cidade',
        'bairro',
        'logradouro',
        'complemento',
        'numero',
    ];
}
