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
        Schema::create('administrativo', function (Blueprint $table) {
            $table->integer('Documento_Administrativo')->primary();

            $table->foreign('Documento_Administrativo')
            ->references('Documento')
            ->on('usuario')
            ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrativo');
    }
};
