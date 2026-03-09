<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstoqueEvento extends Model
{
    protected $table = 'estoques_evento';

    protected $fillable = [
        'produto_id',
        'evento_id',
        'quantidade',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}
