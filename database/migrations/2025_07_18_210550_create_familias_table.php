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
        Schema::create('familias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nna_id'); // FK hacia NNA
            $table->string('nombre_acudiente');
            $table->string('parentesco');
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();

            $table->foreign('nna_id')->references('id')->on('nnas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familias');
    }
};
