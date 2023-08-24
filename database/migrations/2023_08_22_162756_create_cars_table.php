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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();  
            $table->integer('carId');
            $table->string('name');
            $table->string('carType');
            $table->string('rating');
            $table->string('fuel');
            $table->string('image');
            $table->string('hourRate');
            $table->string('dayRate');
            $table->string('monthRate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
