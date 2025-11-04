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
         Schema::create('data_users', function (Blueprint $table) {
            $table->id();
            $table->string('mobile_phone')->nullable;
            $table->string('address')->nullable;
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->enum('gender',['male','female','other'])->nullable;
            $table->date('born_date')->nullable();
            $table->enum('type_document',['CC','CE','PAS','NIT'])->nullable;
            $table->string('document_id')->nullable;
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('marital_status',['casado(a)', 'soltero(a)', 'viudo(a)', 'otro']);
            $table->boolean('pet')->default(false); 
            $table->boolean('children')->default(false);
            $table->enum('vehicletype',['publico','privado']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('data_users');
    }
};
