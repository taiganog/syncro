<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'documento',
        'telefone',
        'email',
        'endereco_id',
    ];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }
}
