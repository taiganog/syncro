<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'codigo_externo_transacao',
        'linha_digitavel',
        'codigo_pix',
        'situacao',
        'valor',
        'desconto',
        'data_vencimento',
        'data_pagamento',
        'evento_id',
    ];

    protected function casts(): array
    {
        return [
            'data_vencimento' => 'datetime',
            'data_pagamento' => 'datetime',
            'valor' => 'double',
            'desconto' => 'double',
        ];
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}
