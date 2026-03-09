<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 25); // SERVICO|LOCACAO|VENDA
            $table->text('descricao')->nullable();
            $table->timestamp('data');
            $table->foreignId('estabelecimento_id')->constrained('estabelecimentos');
            $table->foreignId('endereco_id')->nullable()->constrained('enderecos')->nullOnDelete();
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->foreignId('contrato_id')->nullable()->constrained('contratos')->nullOnDelete();
            $table->double('valor', 8, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
