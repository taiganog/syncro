<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'evento_id',
        'usuario_id',
        'funcao_id',
        'valor',
    ];

    protected function casts(): array
    {
        return [
            'valor' => 'double',
        ];
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function funcao()
    {
        return $this->belongsTo(Funcao::class);
    }
}
