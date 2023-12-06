<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones para crear la tabla 'students'.
     */
    public function up(): void
    {
        //Creamos una nueva tabla "students" en la base de datos.
        Schema::create('students', function (Blueprint $table) {
            // Definición de columnas para la tabla 'students'.
            $table->id();
            $table->string("control_number");
            $table->string("student_name", 200);
            $table->string("lastname", 200);
            $table->string("email", 200);
            $table->string("password");
            $table->string("telephone", 20);
            $table->date("birthdate");
            $table->enum("gender", ['Hombre', 'Mujer']);
            $table->string("street", 50)->nullable();
            $table->integer("exterior_number")->nullable();
            $table->integer("interior_number")->nullable();
            $table->string("suburb")->nullable();
            $table->char("status", 1);
            $table->integer("semester");
            $table->foreignId('town_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('role_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('career_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
