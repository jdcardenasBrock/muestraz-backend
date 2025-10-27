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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // Relación con usuario (nullable por si el pedido es de invitado)
            $table->foreignId('user_id')->nullable()
                ->constrained()->onDelete('set null');

            // Información del cliente
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();

            // Dirección de envío
            $table->string('shipping_address')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('shipping_postal_code')->nullable();

            // Totales y desglose
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('iva', 12, 2)->default(0);
            $table->decimal('shipping_cost', 12, 2)->default(0);
            $table->decimal('discount', 12, 2)->default(0);
            $table->decimal('total', 12, 2)->default(0);

            // Datos de PayU y estado del pago
            $table->string('payu_reference')->unique()->nullable();
            $table->string('payment_method')->nullable(); // Tarjeta, PSE, efectivo, etc.
            $table->string('transaction_id')->nullable(); // ID devuelto por PayU
            $table->string('status')->default('pending'); // pending, paid, declined, cancelled, refunded
            $table->string('payment_status_detail')->nullable(); // texto detallado desde PayU (ej: "Transacción Aprobada")

            // Campos útiles para auditoría y trazabilidad
            $table->timestamp('paid_at')->nullable(); // cuándo se aprobó el pago
            $table->timestamp('cancelled_at')->nullable();
            $table->text('notes')->nullable(); // observaciones, errores, etc.

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
