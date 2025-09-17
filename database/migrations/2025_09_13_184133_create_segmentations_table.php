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
        Schema::create('segmentations', function (Blueprint $table) {
            $table->id();
             $table->foreignid('product_id')->constrained()->onDelete('restrict')->nullable();
            $table->boolean('alluser')->nullable();
            $table->integer('age')->nullable();
            $table->enum('agesymbol',['>=', '=<'])->nullable();
            $table->enum('maritalstatus',['casado(a)','soltero(a)','viudo(a)','otro'])->nullable();
            $table->boolean('children')->nullable();
            $table->boolean('pet')->nullable();
            $table->enum('vehicletype',['publico','privado'])->nullable();
            $table->enum('gender',['male','female','other'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('segmentations');
    }
};
