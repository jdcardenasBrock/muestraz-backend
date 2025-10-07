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
        Schema::create('carousels', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // Título opcional
            $table->text('description')->nullable(); // Descripción opcional
            $table->string('image_path')->nullable(); // Ruta de la imagen
            $table->string('layout_type')->default('full');
            $table->string('image_left')->nullable();
            $table->string('image_right')->nullable();
            $table->string('link')->nullable(); // Enlace a redirigir
            $table->integer('order')->default(0); // Orden en el carrusel
            $table->boolean('active')->default(true); // Estado
            $table->enum('target', ['_self', '_blank'])->default('_self'); // Redirección interna o nueva pestaña
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carousels');
    }
};
