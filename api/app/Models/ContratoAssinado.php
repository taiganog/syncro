<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContratoAssinado extends Model
{
    protected $fillable = [
        'contrato_id',
        'caminho',
    ];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }
}
