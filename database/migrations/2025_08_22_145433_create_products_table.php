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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('correo')->nullable();
            $table->boolean('estado')->default(true);
            $table->enum('tipo',['producto','servicio']);
            $table->foreignid('category_id')->constrained()->onDelete('restrict');
            $table->enum('clasificacion',['muestra','venta'])->nullable();
            $table->boolean('cupon')->default(false)->nullable();
            $table->boolean('encuesta')->default(false)->nullable();
            $table->dateTime('fecharedencion')->nullable();
            $table->text('textodestacado')->nullable();
            $table->text('descripcionlarga')->nullable();
            $table->datetime('fechalimitepublicacion')->nullable();
            $table->boolean('destacado')->default(false)->nullable();
            $table->integer('ordendestacado')->nullable();
            $table->string('imagenuno_path')->nullable();
            $table->string('imagendos_path')->nullable();
            $table->string('imagentres_path')->nullable();
            $table->float('valor',10,2)->nullable();
            $table->float('valormembresia',10,2)->nullable();
            $table->float('descuento',10,2)->nullable();
            $table->float('cobroenvio',10,2)->nullable();
            $table->float('iva',10,2)->nullable();
            $table->integer('cantidadinventario')->nullable();
            $table->string('linkmuestrasagotadas')->nullable();
            $table->text('condiciones')->nullable();
            $table->boolean('solomembresia')->default(false)->nullable();
            $table->boolean('registrados')->default(false)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
