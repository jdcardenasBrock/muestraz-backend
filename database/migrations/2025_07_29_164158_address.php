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
        Schema::create('departamentos', function (Blueprint $table) {
            $table->string('codigo_dane')->primary();
            $table->string('nombre');
        });

        // Municipios table
        Schema::create('municipios', function (Blueprint $table) {
            $table->string('codigo_dane')->primary();
            $table->string('nombre');
            $table->string('departamento_codigo');
            $table->foreign('departamento_codigo')->references('codigo_dane')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('municipios', function (Blueprint $table) {
            $table->dropForeign(['departamento_codigo']); // 👈 quitar la FK primero
        });

        Schema::dropIfExists('municipios');
        Schema::dropIfExists('departamentos');
    }
};
