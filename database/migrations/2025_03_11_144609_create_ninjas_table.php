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
        Schema::create('ninjas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('aldea', ['Hoja', 'Niebla']); // Solo permite "Hoja" o "Niebla"
            $table->integer('chakra'); // Por defecto es 1
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ninjas');
    }
};
