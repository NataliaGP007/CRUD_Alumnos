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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string("career_name", 100);
            $table->char("reticule", 2)->nullable();
            $table->string("level", 40)->nullable();
            $table->string("official_key", 20)->nullable();
            $table->string("shortened_name", 10)->nullable();
            $table->integer("maximum_load")->nullable();
            $table->integer("total_credits")->nullable();
            $table->string("modality", 30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
