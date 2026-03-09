<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutoEstoque extends Model
{
    protected $fillable = [
        'data_vencimento',
        'quantidade',
        'produto_id',
        'estoque_id',
    ];

    protected function casts(): array
    {
        return [
            'data_vencimento' => 'date',
        ];
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function estoque()
    {
        return $this->belongsTo(Estoque::class);
    }
}
