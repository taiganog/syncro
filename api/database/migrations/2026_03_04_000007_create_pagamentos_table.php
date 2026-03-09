<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_externo_transacao', 255);
            $table->string('linha_digitavel')->nullable(); // Código do boleto
            $table->string('codigo_pix')->nullable();     // Código do pix
            $table->string('situacao', 3);
            $table->double('valor', 8, 2);
            $table->double('desconto', 8, 2)->nullable();
            $table->timestamp('data_vencimento');
            $table->timestamp('data_pagamento')->nullable();
            $table->foreignId('evento_id')->constrained('eventos');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
