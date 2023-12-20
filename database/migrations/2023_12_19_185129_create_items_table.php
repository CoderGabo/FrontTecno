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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->bigInteger('monto');
            // $table->boolean('generar_detalle');
            $table->boolean('pagar')->default(false);
            $table->date('fecha_paga')->nullable();

            $table->unsignedBigInteger('id_cuenta')->nullable();

            $table->foreign('id_cuenta')->references('id')->on('accounts');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
