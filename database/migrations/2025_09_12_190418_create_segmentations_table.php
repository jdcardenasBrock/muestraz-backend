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
            $table->bolean('alluser');
            $table->date('bornafter');
            $table->date('bornbefore');
            $table->string('maritalstatus');
            $table->bolean('children');
            $table->bolean('pet');
            $table->bolean('vehicletype');
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
