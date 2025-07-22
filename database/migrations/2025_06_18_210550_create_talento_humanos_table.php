<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('talento_humanos', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('cargo');
            $table->string('email')->unique();
            $table->timestamps();

            //  Clave foránea bien definida
            $table->unsignedBigInteger('institucion_id');
            $table->foreign('institucion_id')
                  ->references('id')
                  ->on('institucion_aliadas')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('talento_humanos');
    }
};
