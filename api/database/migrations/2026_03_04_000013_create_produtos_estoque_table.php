<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produtos_estoque', function (Blueprint $table) {
            $table->id();
            $table->date('data_vencimento')->nullable();
            $table->unsignedInteger('quantidade');
            $table->foreignId('produto_id')->constrained('produtos');
            $table->foreignId('estoque_id')->constrained('estoques');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos_estoque');
    }
};
