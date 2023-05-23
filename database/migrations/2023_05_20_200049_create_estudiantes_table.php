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
            $table->string('nroIdentificacion', 11)->unique();
            $table->string('tipoIdentificacion', 50);
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('email', 100)->unique()->nullable();
            $table->string('telefono', 10)->unique()->nullable();
            $table->bigInteger('idCarrera')->unsigned();
            $table->integer('semestre');
            $table->timestamps();
            
            $table->foreign('idCarrera')->references('id')->on('carreras');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->dropForeign(['idCarrera']);
        });

        Schema::dropIfExists('estudiantes');
    }
};
