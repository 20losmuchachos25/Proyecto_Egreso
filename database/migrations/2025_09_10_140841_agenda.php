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
        Schema::create('agenda', function (Blueprint $table){
            $table->id();
            $table->integer('Doc_Cliente'); // suficiente para documentos de 8-10 dígitos
            $table->date('Fecha');
            $table->time('Hora');
            $table->integer('Duracion');
            $table->string('Estado_Cita');


            $table->foreign('Doc_Cliente')
            ->references('Documento_Cliente')
            ->on('cliente')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda');
    }
};
