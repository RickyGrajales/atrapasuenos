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
        Schema::create('encuentros', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('tipo'); // ejemplo: sensibilización, capacitación
            $table->string('lugar');
            $table->text('descripcion');
            $table->unsignedBigInteger('institucion_id')->nullable(); 
            $table->timestamps();
                    
            // 2. Luego se define la clave foránea
    $table->foreign('institucion_id')->references('id')->on('institucion_aliadas')->onDelete('set null');
       
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuentros');
    }
};
