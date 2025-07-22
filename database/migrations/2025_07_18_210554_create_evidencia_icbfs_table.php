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
        Schema::create('evidencia_icbfs', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('archivo'); // ruta del archivo
            $table->date('fecha');
            $table->timestamps();

            $table->foreignId('responsabilidad_id')->constrained('responsabilidad_icbfs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evidencia_icbfs');
    }
};
