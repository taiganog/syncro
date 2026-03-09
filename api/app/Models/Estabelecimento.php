<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estabelecimento extends Model
{
    protected $fillable = [
        'nome',
        'cnpj',
        'descricao',
        'endereco_id',
    ];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }
}
