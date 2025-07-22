<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('responsabilidad_icbfs', function (Blueprint $table) {
            $table->id();
            $table->string('actividad');
            $table->text('detalle');
            $table->date('fecha_compromiso');
            $table->string('estado'); // ejemplo: cumplido, pendiente
            $table->timestamps();

            // 🔗 Relaciones
            $table->foreignId('institucion_id')
                  ->constrained('institucion_aliadas')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('responsable_id')->nullable();
            $table->foreign('responsable_id')
                  ->references('id')
                  ->on('talento_humanos')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('responsabilidad_icbfs');
    }
};
