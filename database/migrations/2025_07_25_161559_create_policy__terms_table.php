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
        Schema::create('policy__terms', function (Blueprint $table) {
            $table->id();
            $table->string ('policy')->nullable(false);
            $table->string ('term')->nullable(false);
            $table->timestamps()->useCurrent();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policy__terms');
    }
};
