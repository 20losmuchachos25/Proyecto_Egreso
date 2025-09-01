<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('funcionario', function (Blueprint $table) {
            $table->integer('Documento_Funcionario')->primary();

            $table->foreign('Documento_Funcionario')
            ->references('Documento')
            ->on('usuario')
            ->onDelete('cascade');

            // En esta migraci{on esta faltando agregar la primary de la clinica en la que trabaja el funcionario
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionario');
    }
};
