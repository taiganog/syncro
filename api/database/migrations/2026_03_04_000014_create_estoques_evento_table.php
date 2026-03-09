<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estoques_evento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produto_id')->constrained('produtos');
            $table->foreignId('evento_id')->constrained('eventos');
            $table->unsignedInteger('quantidade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estoques_evento');
    }
};
