<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('uf', 2);
            $table->string('cep', 8);
            $table->string('cidade', 255);
            $table->string('bairro', 255);
            $table->string('logradouro', 255);
            $table->string('complemento', 255)->nullable();
            $table->string('numero', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enderecos');
    }
};
