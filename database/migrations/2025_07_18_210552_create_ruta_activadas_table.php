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
        Schema::create('ruta_activadas', function (Blueprint $table) {
            $table->id();
            $table->string('actividad');
            $table->string('responsable');
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->string('estado'); // ejemplo: en proceso, finalizado
            $table->timestamps();

            $table->foreignId('responsabilidad_id')->constrained('responsabilidad_icbfs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruta_activadas');
    }
};
