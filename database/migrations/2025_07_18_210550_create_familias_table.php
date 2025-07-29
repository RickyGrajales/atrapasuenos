<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('familias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nna_id'); // FK a nnas
            $table->string('nombre_madre')->nullable();
            $table->string('nombre_padre')->nullable();
            $table->string('otros_miembros')->nullable();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();

            $table->foreign('nna_id')->references('id')->on('nnas')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('familias');
    }
};
