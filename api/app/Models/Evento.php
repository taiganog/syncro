<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'tipo',
        'descricao',
        'data',
        'estabelecimento_id',
        'endereco_id',
        'cliente_id',
        'contrato_id',
        'valor',
    ];

    protected function casts(): array
    {
        return [
            'data' => 'datetime',
            'valor' => 'double',
        ];
    }

    public function estabelecimento()
    {
        return $this->belongsTo(Estabelecimento::class);
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }
}
