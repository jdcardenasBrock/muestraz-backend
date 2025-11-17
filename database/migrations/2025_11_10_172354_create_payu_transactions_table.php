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
        Schema::create('payu_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Relación con orders
            $table->string('transaction_id')->nullable();
            $table->string('state')->nullable(); // Código numérico del estado (4, 6, 7, etc.)
            $table->string('status_text')->nullable(); // Estado mapeado (approved, declined, etc.)
            $table->decimal('value', 15, 2)->nullable();
            $table->string('currency', 10)->nullable();
            $table->string('response_message')->nullable(); // Mensaje de PayU
            $table->string('payment_method')->nullable();
            $table->json('raw_data')->nullable(); // Guarda todo el JSON recibido de PayU
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payu_transactions');
    }
};
