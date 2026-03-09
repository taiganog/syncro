<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->boolean('perecivel')->default(false);
            $table->boolean('equipamento')->default(true);
            $table->boolean('informar_falta')->default(false);
            $table->foreignId('estabelecimento_id')->constrained('estabelecimentos');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
