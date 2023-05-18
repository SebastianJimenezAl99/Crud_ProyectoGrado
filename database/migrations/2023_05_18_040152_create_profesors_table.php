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
        Schema::create('profesores', function (Blueprint $table) {
            $table->id();
            $table->String('nroIdentificacion',11)->unique();
            $table->String('tipoIdentificacion',100);
            $table->String('nombre',100);
            $table->String('apellido',100);
            $table->String('email',100)->unique()->nullable();
            $table->String('telefono',10)->unique()->nullable();
            $table->integer('semestre');
            $table->bigInteger('idCarrera');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesores');
    }
};
