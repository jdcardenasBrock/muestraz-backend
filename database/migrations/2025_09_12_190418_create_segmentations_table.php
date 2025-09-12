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
<<<<<<< HEAD
            $table->integer('productid');
=======
>>>>>>> 222c8e0b4944368171260c5975348c9fadc13acd
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
