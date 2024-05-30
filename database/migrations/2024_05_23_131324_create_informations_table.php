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
        Schema::create('informations', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('imagen');
            $table->foreignId('genero_id')->constrained()->onDelete('cascade');
            $table->date('fecha_nacimiento');
            $table->integer('peso');
            $table->integer('estatura');
            $table->string('alergias');
            $table->string('antecedentes_familiares');
            $table->string('enfermedades_cronicas');
            $table->string('procedimientos_quirurgicos');
            $table->string('condiciones_pasadas');
            $table->string('doctor');
            $table->string('clinica');
            $table->string('observaciones');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informations');
    }
};
