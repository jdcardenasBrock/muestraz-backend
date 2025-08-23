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
            $table->string('nombre');
            $table->string('correo')->nullable();
            $table->boolean('estado')->default(true);
            $table->boolean('tipo')->default(true);//0=servicio 1=producto
            $table->foreignid('category_id')->constrained()->onDelete('restrict');
            $table->integer('clasificacion')->nullable(); //1=muestra 2=venta 3=conozcanos
            $table->boolean('cupon')->default(false);
            $table->boolean('encusta')->default(false);
            $table->dateTime('fecharedencion')->nullable();
            $table->string('textodestacado')->nullable();
            $table->text('descripcionlarga')->nullable();
            $table->datetime('fechalimitepublicacion')->nullable();
            $table->boolean('destacado')->default(false);
            $table->integer('ordendestacado')->nullable();
            $table->string('imagenuno_path')->nullable();
            $table->string('imagendos_path')->nullable();
            $table->string('imagentres_path')->nullable();
            $table->enum('target', ['_self', '_blank'])->default('_self'); // Redirección interna o nueva pestaña
            $table->float('valor',10,2)->nullable();
            $table->float('valormembresia',10,2)->nullable();
            $table->float('descuento',10,2)->nullable();
            $table->float('cobroenvio',10,2)->nullable();
            $table->float('iva',10,2)->nullable();
            $table->integer('cantidadinventario');
            $table->string('linkmuestrasagotadas')->nullable();
            $table->text('condiciones')->nullable();
            $table->boolean('solomembresia')->default(false);
            $table->boolean('registrados')->default(true);
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
