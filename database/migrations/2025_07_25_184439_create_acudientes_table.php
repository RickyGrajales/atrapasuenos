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
       Schema::create('acudientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nna_id'); // relación con tabla nnas
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('documento_identidad')->unique();
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('parentesco');
            $table->timestamps();   

    $table->foreign('nna_id')->references('id')->on('nnas')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acudientes');
    }
};
