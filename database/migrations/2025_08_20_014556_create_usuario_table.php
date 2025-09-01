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
        Schema::create('usuario', function (Blueprint $table) {
            $table->integer('Documento')->primary();
            $table->string('Tipo_Documento', 15);
            $table->string('Primer_Nombre', 30);
            $table->string('Segundo_Nombre', 30)->nullable();
            $table->string('Primer_Apellido', 30);
            $table->string('Segundo_Apellido', 30)->nullable();
            $table->tinyInteger('Edad');
            $table->date('Fecha_Nacimiento');
            $table->string('Sexo', 30);
            $table->string('Celular', 12)->nullable();
            $table->string('Mutualista', 30);
            $table->string('Estado', 10);
            $table->string('Email', 50);
            $table->string('Password', 150);
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
