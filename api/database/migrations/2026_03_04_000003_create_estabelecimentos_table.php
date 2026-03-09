<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estabelecimentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->string('cnpj', 14);
            $table->string('descricao', 255)->nullable();
            $table->foreignId('endereco_id')->constrained('enderecos');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estabelecimentos');
    }
};
