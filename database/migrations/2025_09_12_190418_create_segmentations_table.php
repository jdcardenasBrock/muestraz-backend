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
            $table->integer('productid');
            $table->boolean('alluser');
            $table->date('bornafter');
            $table->date('bornbefore');
            $table->string('maritalstatus');
            $table->boolean('children');
            $table->boolean('pet');
            $table->boolean('vehicletype');
            $table->enum('gender',['male','female','other']);
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
