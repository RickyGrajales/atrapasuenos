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
        Schema::table('nnas', function (Blueprint $table) {
            //
             $table->unsignedBigInteger('acudiente_id')->nullable()->after('id');

        $table->foreign('acudiente_id')
              ->references('id')->on('acudientes')
              ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nnas', function (Blueprint $table) {
            //
             $table->dropForeign(['acudiente_id']);
        $table->dropColumn('acudiente_id');
        });
    }
};
