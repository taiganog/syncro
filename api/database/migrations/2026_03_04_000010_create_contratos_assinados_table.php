<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contratos_assinados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contrato_id')->constrained('contratos');
            $table->string('caminho', 300);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contratos_assinados');
    }
};
