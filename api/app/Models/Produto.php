<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'perecivel',
        'equipamento',
        'informar_falta',
        'estabelecimento_id',
    ];

    protected function casts(): array
    {
        return [
            'perecivel' => 'boolean',
            'equipamento' => 'boolean',
            'informar_falta' => 'boolean',
        ];
    }

    public function estabelecimento()
    {
        return $this->belongsTo(Estabelecimento::class);
    }
}
