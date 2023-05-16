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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->String('nroIdentificacion',11)->unique();
            $table->String('tipoIdentificacion',11);
            $table->String('nombre',50);
            $table->String('apellido',50);
            $table->String('correo',100)->unique()->nullable();
            $table->String('celular',10)->unique()->nullable();
            $table->integer('semestre');
            $table->integer('idCarrera');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
