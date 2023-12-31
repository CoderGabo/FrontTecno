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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('nro_cuenta')->unique();
            $table->string('nombre');
            $table->string('servicio');
            $table->string('moneda');
            $table->string('eliminar')->default(false);

            $table->unsignedBigInteger('id_empresa');

            $table->foreign('id_empresa')->references('id')->on('empresas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
