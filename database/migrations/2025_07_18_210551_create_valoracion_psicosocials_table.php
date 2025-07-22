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
        Schema::create('valoracion_psicosocials', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_nna');
            $table->date('fecha_valoracion');

            // ✅ profesional_id bien definido
            $table->foreignId('profesional_id')
                  ->nullable()
                  ->constrained('talento_humanos')
                  ->onDelete('set null');

            // ✅ nna_id bien definido
            $table->foreignId('nna_id')
                  ->constrained('nnas')
                  ->onDelete('cascade');

            $table->text('observaciones')->nullable();
            $table->text('recomendaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valoracion_psicosocials');
    }
};
