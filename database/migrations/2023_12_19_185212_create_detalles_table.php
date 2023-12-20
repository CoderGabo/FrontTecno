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
        Schema::create('detalles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cantidad');
            $table->float('promocion')->nullable();
            $table->float('precio')->nullable(); // Cambiado a float
            $table->float('total_pagar')->nullable();
            $table->date('fecha')->nullable();
            $table->boolean('pagado')->default(false);

            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_product');

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles');
    }
};
