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
        Schema::create('Cliente', function (Blueprint $table) {
            $table->id();
            $table->string(tipo_documento);
            $table->string(numero_documento);
            $table->string(nombres);
            $table->string(apellidos);
            $table->string(telefono);
            $table->string(especialidad);
            $table->datetime(fecha_hora);
            $table->string(estado);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
