<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipe', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained('eventos');
            $table->foreignId('usuario_id')->constrained('users');
            $table->foreignId('funcao_id')->constrained('funcoes');
            $table->double('valor', 8, 2);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipe');
    }
};
