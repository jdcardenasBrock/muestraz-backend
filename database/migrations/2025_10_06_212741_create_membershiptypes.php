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
        Schema::create('membershiptypes', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->float('value',10,2)->default(0);
            $table->integer('quantitysamples')->default(0);
            $table->integer('quantitymonths')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membershiptypes');
    }
};
